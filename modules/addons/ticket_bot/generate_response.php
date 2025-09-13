<?php
// Include WHMCS bootstrap
require_once '../../../init.php';

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

use WHMCS\Database\Capsule;

// Branding protection constants
define('API_BRANDING_NAME', 'U2hlcmF6IEhvd2xhZGVy');
define('API_BRANDING_URL', 'aHR0cHM6Ly9zaGVyYXpkZXYuY29tLmJkLw==');

// Branding validation function
function validateAPIBranding() {
    return defined('API_BRANDING_NAME') && defined('API_BRANDING_URL');
}

// Get protected branding
function getAPIBranding() {
    if (!validateAPIBranding()) {
        return [
            'name' => 'Ticket BOT',
            'url' => 'https://github.com',
            'powered_by' => 'OpenAI'
        ];
    }
    
    return [
        'name' => base64_decode(API_BRANDING_NAME),
        'url' => base64_decode(API_BRANDING_URL),
        'powered_by' => 'OpenAI'
    ];
}

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('X-Powered-By: ' . getAPIBranding()['name']);

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed', 'branding' => getAPIBranding()['name']]);
    exit;
}

// Check if user is logged in as admin
if (!isset($_SESSION['adminid'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized - Admin access required', 'branding' => getAPIBranding()['name']]);
    exit;
}

// Get input data
$input = json_decode(file_get_contents('php://input'), true);
$action = isset($input['action']) ? trim($input['action']) : 'generate_response';
$ticketId = isset($input['ticket_id']) ? (int)$input['ticket_id'] : 0;
$customerMessage = isset($input['customer_message']) ? trim($input['customer_message']) : '';
$ticketSubject = isset($input['ticket_subject']) ? trim($input['ticket_subject']) : '';
$responseType = isset($input['response_type']) ? trim($input['response_type']) : 'general';

// For reply improvement
$currentReply = isset($input['current_reply']) ? trim($input['current_reply']) : '';
$improvementType = isset($input['improvement_type']) ? trim($input['improvement_type']) : 'enhance';

// Validate required parameters based on action
if (!$ticketId) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required parameter: ticket_id', 'branding' => getAPIBranding()['name']]);
    exit;
}

if ($action === 'generate_response' && !$customerMessage) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required parameter: customer_message', 'branding' => getAPIBranding()['name']]);
    exit;
}

if ($action === 'improve_reply' && !$currentReply) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required parameter: current_reply', 'branding' => getAPIBranding()['name']]);
    exit;
}

// Get module settings
$settings = [];
try {
    $settings = Capsule::table('mod_openai_ticket_assistant_settings')
        ->pluck('setting_value', 'setting_key')
        ->toArray();
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to load module settings', 'branding' => getAPIBranding()['name']]);
    exit;
}

$apiKey = $settings['openai_api_key'] ?? '';
$model = $settings['openai_model'] ?? 'gpt-4';
$maxTokens = (int)($settings['max_tokens'] ?? 1000);
$temperature = (float)($settings['temperature'] ?? 0.7);
$systemPrompt = $settings['system_prompt'] ?? 'You are a helpful customer support assistant for a web hosting company. Provide clear, professional, and helpful responses to customer inquiries. Be concise but thorough.';

if (!$apiKey) {
    http_response_code(400);
    echo json_encode(['error' => 'OpenAI API key not configured', 'branding' => getAPIBranding()['name']]);
    exit;
}

// Get ticket details from database
try {
    $ticket = Capsule::table('tbltickets')
        ->where('id', $ticketId)
        ->first();
    
    if (!$ticket) {
        http_response_code(404);
        echo json_encode(['error' => 'Ticket not found', 'branding' => getAPIBranding()['name']]);
        exit;
    }
    
    // Get client information
    $client = Capsule::table('tblclients')
        ->where('id', $ticket->userid)
        ->first();
    
    // Get ticket replies
    $replies = Capsule::table('tblticketreplies')
        ->where('tid', $ticketId)
        ->orderBy('date', 'asc')
        ->get();
    
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to retrieve ticket information', 'branding' => getAPIBranding()['name']]);
    exit;
}

// Build context for AI
$context = "Ticket Information:\n";
$context .= "Subject: " . $ticket->title . "\n";
$context .= "Status: " . $ticket->status . "\n";
$context .= "Priority: " . $ticket->urgency . "\n";
$context .= "Department: " . $ticket->did . "\n";

if ($client) {
    $context .= "Client: " . $client->firstname . " " . $client->lastname . " (" . $client->email . ")\n";
}

$context .= "\nTicket History:\n";
foreach ($replies as $reply) {
    $context .= "[" . date('Y-m-d H:i:s', strtotime($reply->date)) . "] ";
    $context .= ($reply->admin ? "Staff" : "Customer") . ": ";
    $context .= substr(strip_tags($reply->message), 0, 200) . "\n";
}

// Prepare system prompt and user message based on action
$customSystemPrompt = $systemPrompt;
$userMessage = '';

if ($action === 'generate_response') {
    $context .= "\nLatest Customer Message:\n" . $customerMessage . "\n";
    
    // Customize system prompt based on response type
    switch ($responseType) {
        case 'technical':
            $customSystemPrompt .= " Focus on technical details and provide step-by-step solutions.";
            break;
        case 'friendly':
            $customSystemPrompt .= " Be warm, empathetic, and reassuring in your response.";
            break;
        case 'brief':
            $customSystemPrompt .= " Keep your response concise and to the point.";
            break;
        case 'detailed':
            $customSystemPrompt .= " Provide a comprehensive response with detailed explanations.";
            break;
    }
    
    $userMessage = "Please help me write a professional response to this customer ticket. Here's the context:\n\n" . $context . "\n\nPlease provide a helpful, professional response that addresses the customer's concern.";
    
} elseif ($action === 'improve_reply') {
    // For reply improvement, we focus on the current reply text, not the ticket context
    $context = "Current Staff Reply to Improve:\n" . $currentReply . "\n";
    
    // Add minimal context about the improvement type
    $context .= "\nImprovement Request: " . ucfirst(str_replace(['rephrase', 'fixGrammar', 'improveWriting', 'enhance', 'polish', 'professional', 'friendly', 'concise', 'technical'], [
        'rephrase for clarity',
        'fix grammar and spelling',
        'improve writing style',
        'enhance and expand',
        'polish and refine',
        'make more professional',
        'make more friendly',
        'make more concise',
        'add technical details'
    ], $improvementType)) . "\n";
    
    // Customize system prompt based on improvement type
    switch ($improvementType) {
        case 'rephrase':
            $customSystemPrompt = "You are a professional writing assistant. Your task is to rephrase the provided text for better clarity and readability while maintaining the exact same meaning and intent. Focus only on improving the language and structure of the given text.";
            break;
        case 'fixGrammar':
            $customSystemPrompt = "You are a professional editor. Your task is to fix grammar, spelling, and punctuation errors in the provided text while maintaining the exact same content, structure, and meaning. Only correct language errors, do not change the message.";
            break;
        case 'improveWriting':
            $customSystemPrompt = "You are a professional writing coach. Your task is to improve the writing style, tone, and flow of the provided text while maintaining the same message and intent. Make the text more engaging and professional.";
            break;
        case 'enhance':
            $customSystemPrompt = "You are a professional content enhancer. Your task is to enhance and expand the provided text to be more comprehensive and helpful while maintaining the original tone and intent. Add relevant details and explanations.";
            break;
        case 'polish':
            $customSystemPrompt = "You are a professional editor. Your task is to polish and refine the provided text to improve grammar, clarity, and professionalism while keeping the same content and structure. Make it more polished and professional.";
            break;
        case 'professional':
            $customSystemPrompt = "You are a professional business writer. Your task is to make the provided text more professional and formal while maintaining the helpful tone and addressing all points. Use business-appropriate language.";
            break;
        case 'friendly':
            $customSystemPrompt = "You are a professional customer service writer. Your task is to make the provided text more friendly, warm, and approachable while maintaining professionalism and addressing all points. Use a warm, empathetic tone.";
            break;
        case 'concise':
            $customSystemPrompt = "You are a professional editor. Your task is to make the provided text more concise and to-the-point while ensuring all important information is retained. Remove unnecessary words and streamline the message.";
            break;
        case 'technical':
            $customSystemPrompt = "You are a technical writing specialist. Your task is to add technical details and step-by-step instructions to the provided text while maintaining clarity and helpfulness. Enhance it with technical expertise.";
            break;
    }
    
    $userMessage = "Please improve the following text according to the specified improvement type. Provide only the improved version without any explanations or additional context:\n\n" . $currentReply;
}

// Prepare OpenAI API request
$openaiData = [
    'model' => $model,
    'messages' => [
        [
            'role' => 'system',
            'content' => $customSystemPrompt
        ],
        [
            'role' => 'user',
            'content' => $userMessage
        ]
    ],
    'max_tokens' => $maxTokens,
    'temperature' => $temperature
];

// Make API call to OpenAI
$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($openaiData));
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    http_response_code(500);
    echo json_encode(['error' => 'OpenAI API request failed', 'details' => $response, 'branding' => getAPIBranding()['name']]);
    exit;
}

$openaiResponse = json_decode($response, true);

if (!isset($openaiResponse['choices'][0]['message']['content'])) {
    http_response_code(500);
    echo json_encode(['error' => 'Invalid response from OpenAI API', 'branding' => getAPIBranding()['name']]);
    exit;
}

$aiResponse = $openaiResponse['choices'][0]['message']['content'];
$tokensUsed = $openaiResponse['usage']['total_tokens'] ?? 0;

// Calculate cost (approximate based on OpenAI pricing)
$cost = 0;
if (strpos($model, 'gpt-4') === 0) {
    $cost = ($tokensUsed / 1000) * 0.03; // $0.03 per 1K tokens for GPT-4
} elseif (strpos($model, 'gpt-3.5-turbo') === 0) {
    $cost = ($tokensUsed / 1000) * 0.002; // $0.002 per 1K tokens for GPT-3.5
}

// Log usage
try {
    $originalMessage = ($action === 'improve_reply') ? $currentReply : $customerMessage;
    Capsule::table('mod_openai_ticket_assistant_usage')->insert([
        'ticket_id' => $ticketId,
        'admin_id' => $_SESSION['adminid'],
        'original_message' => $originalMessage,
        'ai_response' => $aiResponse,
        'tokens_used' => $tokensUsed,
        'cost' => $cost,
        'created_at' => date('Y-m-d H:i:s')
    ]);
} catch (\Exception $e) {
    // Log error but don't fail the request
    logActivity('Ticket BOT: Failed to log usage - ' . $e->getMessage());
}

// Return the AI response
echo json_encode([
    'success' => true,
    'response' => $aiResponse,
    'tokens_used' => $tokensUsed,
    'cost' => $cost,
    'model' => $model,
    'action' => $action,
    'branding' => getAPIBranding()['name'],
    'powered_by' => 'OpenAI'
]); 