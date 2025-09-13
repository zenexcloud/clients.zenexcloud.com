<?php
if (!defined('WHMCS')) {
    die('You cannot access this file directly');
}

use WHMCS\Database\Capsule;
use WHMCS\User\Admin;

// Include core validation system
require_once __DIR__ . '/core_validation.php';

// Define module version
define('TICKET_BOT_VERSION', '1.0');

/**
 * Define module related meta data.
 *
 * Values returned here are used to determine module related abilities and
 * settings.
 *
 * @return array
 */
function ticket_bot_config() {
    $moduleData = getValidatedModuleData('all');
    
    return [
        'name' => 'Ticket BOT',
        'description' => 'AI-powered ticket reply assistant using OpenAI to help admin staff respond to customer tickets more effectively. Developed by ' . $moduleData['name'] . '.',
        'version' => $moduleData['version'],
        'author' => $moduleData['author'],
        'fields' => [
            'openai_api_key' => [
                'FriendlyName' => 'OpenAI API Key',
                'Type' => 'text',
                'Size' => '100',
                'Description' => 'Enter your OpenAI API key (starts with sk-)',
                'Default' => '',
            ],
            'openai_model' => [
                'FriendlyName' => 'OpenAI Model',
                'Type' => 'dropdown',
                'Options' => 'gpt-4o-mini, o4-mini,o3,gpt-4o',
                'Description' => 'Select the OpenAI model to use for generating responses',
                'Default' => 'gpt-4',
            ],
            'max_tokens' => [
                'FriendlyName' => 'Max Tokens',
                'Type' => 'text',
                'Size' => '10',
                'Description' => 'Maximum number of tokens for AI response (default: 1000)',
                'Default' => '1000',
            ],
            'temperature' => [
                'FriendlyName' => 'Temperature',
                'Type' => 'text',
                'Size' => '10',
                'Description' => 'AI response creativity (0.0 = focused, 1.0 = creative, default: 0.7)',
                'Default' => '0.7',
            ],
            'system_prompt' => [
                'FriendlyName' => 'System Prompt',
                'Type' => 'textarea',
                'Rows' => '8',
                'Cols' => '80',
                'Description' => 'Custom system prompt to guide AI responses (optional)',
                'Default' => 'You are a helpful customer support assistant for a web hosting company. Provide clear, professional, and helpful responses to customer inquiries. Be concise but thorough.',
            ],
        ]
    ];
}

/**
 * Activate the module.
 *
 * @return array
 */
function ticket_bot_activate() {
    try {
        // Create settings table if it doesn't exist
        if (!Capsule::schema()->hasTable('mod_openai_ticket_assistant_settings')) {
            Capsule::schema()->create('mod_openai_ticket_assistant_settings', function ($table) {
                $table->increments('id');
                $table->string('setting_key');
                $table->text('setting_value');
                $table->timestamps();
            });
        }

        // Create usage tracking table
        if (!Capsule::schema()->hasTable('mod_openai_ticket_assistant_usage')) {
            Capsule::schema()->create('mod_openai_ticket_assistant_usage', function ($table) {
                $table->increments('id');
                $table->integer('ticket_id');
                $table->integer('admin_id');
                $table->text('original_message');
                $table->text('ai_response');
                $table->integer('tokens_used');
                $table->decimal('cost', 10, 6);
                $table->timestamp('created_at');
            });
        }

        // Store current version
        saveOpenAIModuleSetting('version', TICKET_BOT_VERSION);

        return ['status' => 'success', 'description' => 'Ticket BOT activated successfully!'];
    } catch (\Exception $e) {
        return ['status' => 'error', 'description' => 'Could not create database tables: ' . $e->getMessage()];
    }
}

/**
 * Deactivate the module.
 *
 * @return array
 */
function ticket_bot_deactivate() {
    return ['status' => 'success', 'description' => 'Ticket BOT deactivated successfully!'];
}

/**
 * Upgrade the module.
 *
 * @param array $vars
 * @return array
 */
function ticket_bot_upgrade($vars) {
    $currentVersion = getOpenAIModuleSetting('version', '1.0');
    
    try {
        // Update version number
        saveOpenAIModuleSetting('version', TICKET_BOT_VERSION);

        return ['status' => 'success', 'description' => 'Ticket BOT upgraded successfully!'];
    } catch (\Exception $e) {
        return ['status' => 'error', 'description' => 'Upgrade failed: ' . $e->getMessage()];
    }
}

/**
 * Get admin username by ID.
 *
 * @param int $adminId
 * @return string
 */
function openaiGetAdminName($adminId)
{
    if ($adminId == 0) {
        return 'System';
    }
    try {
        $admin = Admin::find($adminId);
        return $admin ? $admin->username : 'Unknown';
    } catch (\Exception $e) {
        logActivity('Ticket BOT Error: Could not get admin name - ' . $e->getMessage());
        return 'Unknown';
    }
}

/**
 * Admin area output.
 *
 * @param array $vars
 * @return string
 */
function ticket_bot_output($vars) {
    $modulelink = $vars['modulelink'];
    $version = $vars['version'];
    $LANG = $vars['_lang'];
    
    // Handle form submission
    $saveMessage = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
        try {
            $fields = ['openai_api_key', 'openai_model', 'max_tokens', 'temperature', 'system_prompt'];
            
            foreach ($fields as $field) {
                if (isset($_POST[$field])) {
                    saveOpenAIModuleSetting($field, $_POST[$field]);
                }
            }
            
            $saveMessage = '<div class="alert alert-success">Settings saved successfully!</div>';
        } catch (\Exception $e) {
            $saveMessage = '<div class="alert alert-danger">Error saving settings: ' . $e->getMessage() . '</div>';
        }
    }

    // Get current settings
    $settings = [];
    try {
        $settings = Capsule::table('mod_openai_ticket_assistant_settings')
            ->pluck('setting_value', 'setting_key')
            ->toArray();
    } catch (\Exception $e) {
        echo '<div class="alert alert-danger">Error loading settings: ' . $e->getMessage() . '</div>';
    }

    // Get usage statistics
    $usageStats = [];
    try {
        $usageStats = [
            'total_requests' => Capsule::table('mod_openai_ticket_assistant_usage')->count(),
            'total_tokens' => Capsule::table('mod_openai_ticket_assistant_usage')->sum('tokens_used'),
            'total_cost' => Capsule::table('mod_openai_ticket_assistant_usage')->sum('cost'),
            'recent_usage' => Capsule::table('mod_openai_ticket_assistant_usage')
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get()
        ];
    } catch (\Exception $e) {
        // Ignore errors for usage stats
    }

    // Prepare variables for the view
    $apiKey = htmlspecialchars($settings['openai_api_key'] ?? '');
    $currentModel = $settings['openai_model'] ?? 'gpt-4';
    $maxTokens = htmlspecialchars($settings['max_tokens'] ?? '1000');
    $temperature = htmlspecialchars($settings['temperature'] ?? '0.7');
    $systemPrompt = htmlspecialchars($settings['system_prompt'] ?? 'You are a helpful customer support assistant for a web hosting company. Provide clear, professional, and helpful responses to customer inquiries. Be concise but thorough.');
    
    $config = ticket_bot_config();
    $models_from_config = explode(',', $config['fields']['openai_model']['Options']);
    $models = array_map('trim', $models_from_config);
    
    // Build model options HTML
    $modelOptions = '';
    foreach ($models as $model) {
        $selected = ($model === $currentModel) ? 'selected' : '';
        $modelOptions .= '<option value="' . htmlspecialchars($model) . '" ' . $selected . '>' . htmlspecialchars($model) . '</option>';
    }

    // Build recent usage table HTML
    $recentUsageHtml = '';
    if (!empty($usageStats['recent_usage']) && count($usageStats['recent_usage']) > 0) {
        $recentUsageHtml .= '<div class="table-responsive"><table class="table table-striped">';
        $recentUsageHtml .= '<thead><tr><th>Ticket ID</th><th>Admin</th><th>Timestamp</th></tr></thead>';
        $recentUsageHtml .= '<tbody>';
        foreach ($usageStats['recent_usage'] as $usage) {
            $adminName = openaiGetAdminName($usage->admin_id);
            $recentUsageHtml .= '<tr>';
            $recentUsageHtml .= '<td><a href="supporttickets.php?action=view&id=' . $usage->ticket_id . '">' . $usage->ticket_id . '</a></td>';
            $recentUsageHtml .= '<td>' . htmlspecialchars($adminName) . '</td>';
            $recentUsageHtml .= '<td>' . fromMySQLDate($usage->created_at, true) . '</td>';
            $recentUsageHtml .= '</tr>';
        }
        $recentUsageHtml .= '</tbody></table></div>';
    } else {
        $recentUsageHtml = '<p>No usage data available yet.</p>';
    }

    $formattedTotalRequests = number_format($usageStats['total_requests'] ?? 0);
    $formattedTotalTokens = number_format($usageStats['total_tokens'] ?? 0);
    $formattedTotalCost = '$' . number_format($usageStats['total_cost'] ?? 0, 4);

    // Generate validated module HTML
    $validatedHeader = function_exists('generateValidatedHTML') ? generateValidatedHTML('header') : '<div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px;"><h3>Ticket BOT</h3><p>Powered by OpenAI</p></div>';
    $validatedFooter = function_exists('generateValidatedHTML') ? generateValidatedHTML('footer') : '<div style="background-color: #f8f9fa; border-top: 1px solid #dee2e6; padding: 15px; margin-top: 30px; text-align: center; font-size: 12px; color: #6c757d;"><p><strong>Ticket BOT</strong> v' . $version . ' | Open Source</p></div>';

    // Main Output
    echo <<<HTML
    <style>
        #openai_ticket_assistant .stat-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }
        #openai_ticket_assistant .stat-box h4 {
            margin: 0 0 10px 0;
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }
        #openai_ticket_assistant .stat-box p {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            color: #337ab7;
        }
        #openai_ticket_assistant .panel-title strong {
            font-weight: 600;
        }
        #openai_ticket_assistant .panel-heading .fa {
            margin-right: 10px;
        }
        #openai_ticket_assistant .btn .fa {
            margin-right: 5px;
        }
    </style>

    {$saveMessage}

    <div id="openai_ticket_assistant">
        {$validatedHeader}

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><i class="fas fa-cogs"></i> Configuration Settings</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>Configure your OpenAI API settings for AI-powered ticket responses. Version: {$version}</p>
                        <hr>
                        <form method="post" action="{$modulelink}">
                            <div class="form-group">
                                <label for="openai_api_key">OpenAI API Key</label>
                                <input type="password" name="openai_api_key" id="openai_api_key" class="form-control" value="{$apiKey}" placeholder="sk-...">
                                <small class="form-text text-muted">Your OpenAI API key (starts with sk-). The key is saved but not displayed for security.</small>
                            </div>

                            <div class="form-group">
                                <label for="openai_model">OpenAI Model</label>
                                <select name="openai_model" id="openai_model" class="form-control">
                                    {$modelOptions}
                                </select>
                                <small class="form-text text-muted">Select the OpenAI model for generating responses.</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_tokens">Max Tokens</label>
                                        <input type="number" name="max_tokens" id="max_tokens" class="form-control" value="{$maxTokens}" min="100" max="8000">
                                        <small class="form-text text-muted">Max tokens for AI response.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="temperature">Temperature</label>
                                        <input type="number" name="temperature" id="temperature" class="form-control" value="{$temperature}" min="0" max="2" step="0.1">
                                        <small class="form-text text-muted">AI response creativity.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="system_prompt">System Prompt</label>
                                <textarea name="system_prompt" id="system_prompt" class="form-control" rows="6">{$systemPrompt}</textarea>
                                <small class="form-text text-muted">Custom system prompt to guide AI responses.</small>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="save" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Save Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><i class="fas fa-chart-bar"></i> Usage Statistics</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="stat-box">
                                    <h4>Total Requests</h4>
                                    <p>{$formattedTotalRequests}</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="stat-box">
                                    <h4>Total Tokens Used</h4>
                                    <p>{$formattedTotalTokens}</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="stat-box">
                                    <h4>Estimated Cost</h4>
                                    <p>{$formattedTotalCost}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4><i class="fas fa-history"></i> Recent Usage</h4>
                        {$recentUsageHtml}
                    </div>
                </div>
            </div>
        </div>

        {$validatedFooter}
    </div>
HTML;
}

/**
 * Client area output.
 *
 * @param array $vars
 * @return string
 */
function ticket_bot_clientarea($vars) {
    // This function is not used for this addon, but is required
    return null;
}

/**
 * Save a module setting.
 *
 * @param string $key
 * @param string $value
 * @return void
 */
function saveOpenAIModuleSetting($key, $value) {
    try {
        $setting = Capsule::table('mod_openai_ticket_assistant_settings')
            ->where('setting_key', $key)
            ->first();

        if ($setting) {
            Capsule::table('mod_openai_ticket_assistant_settings')
                ->where('setting_key', $key)
                ->update([
                    'setting_value' => $value,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
        } else {
            Capsule::table('mod_openai_ticket_assistant_settings')->insert([
                'setting_key' => $key,
                'setting_value' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    } catch (\Exception $e) {
        logActivity('Ticket BOT Error: ' . $e->getMessage());
    }
}

/**
 * Get a module setting.
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function getOpenAIModuleSetting($key, $default = null) {
    try {
        $setting = Capsule::table('mod_openai_ticket_assistant_settings')
            ->where('setting_key', $key)
            ->first();

        return $setting ? $setting->setting_value : $default;
    } catch (\Exception $e) {
        logActivity('Ticket BOT Error: ' . $e->getMessage());
        return $default;
    }
} 