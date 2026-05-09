{if $service->user_limited}
    <div class="alert alert-danger text-center">
        {$service->lang['The service is limited.']}
        <br>
        {$service->lang['Contact technical support.']}
    </div>
{/if}

{if $service->package_option_link_to_instruction ne ''}
    <div class="mb-4 text-center">
        <a href="{$service->package_option_link_to_instruction}" target="_blank"
           class="btn btn-outline-primary btn-lg">
            <i class="fa fa-book"></i> {$service->lang['User manual']}
        </a>
    </div>
{/if}

<style>
    .info-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }

    .info-row {
        display: flex;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #555;
        display: flex;
        align-items: center;
        min-width: 200px;
    }

    .info-label i {
        margin-right: 10px;
        color: #dc3545;
        width: 20px;
        text-align: center;
    }

    .info-value {
        flex: 1;
    }

    .web-link {
        color: #007bff;
        text-decoration: none;
        font-size: 1.1em;
        font-weight: 500;
        transition: color 0.2s;
    }

    .web-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    .credential-box {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .credential-value {
        font-weight: 600;
        color: #333;
        flex: 1;
    }

    .copy-btn {
        background: #fff;
        border: 2px solid #dc3545;
        color: #dc3545;
        border-radius: 8px;
        padding: 8px 16px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .copy-btn:hover {
        background: #dc3545;
        color: #fff;
    }

    .password-input-group {
        display: flex;
        gap: 10px;
        flex: 1;
    }

    .password-field {
        flex: 1;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 8px 12px;
        font-weight: 600;
    }

    .show-password-btn {
        background: #fff;
        border: 2px solid #6c757d;
        color: #6c757d;
        border-radius: 8px;
        padding: 8px 16px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .show-password-btn:hover {
        background: #6c757d;
        color: #fff;
    }

    .stats-container {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }

    .chart-section {
        flex: 1;
        min-width: 300px;
    }

    .stats-table {
        flex: 1;
        min-width: 300px;
    }

    .stats-table table {
        width: 100%;
    }

    .stats-table td {
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .stats-table td:first-child {
        color: #555;
        font-weight: 600;
    }

    .stats-table td:last-child {
        text-align: right;
        color: #333;
        font-weight: 500;
    }

    .stats-table i {
        margin-right: 8px;
        color: #dc3545;
        width: 20px;
        text-align: center;
    }

    /* Bucket table styles */
    .buckets-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .buckets-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }

    .buckets-title {
        font-size: 1.3em;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #dc3545;
    }

    .buckets-table {
        width: 100%;
        border-collapse: collapse;
    }

    .buckets-table thead tr {
        text-align: left;
        background: #f8f9fa;
    }

    .buckets-table thead th {
        text-align: left;
        font-weight: 600;
        color: #333;
        font-size: 0.95em;
    }

    .buckets-table tbody tr {
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
        transition: background 0.2s;
    }

    .buckets-table tbody tr:hover {
        background: #f8f9fa;
    }

    .buckets-table tbody td {
        text-align: left;
        padding: 15px 12px;
        color: #555;
    }

    .buckets-table tbody td i {
        margin-right: 8px;
        color: #dc3545;
    }

    .buckets-table tbody tr:last-child {
        border-bottom: none;
    }

    @media (max-width: 768px) {
        .info-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .info-label {
            min-width: 100%;
            margin-bottom: 10px;
        }

        .stats-container {
            flex-direction: column;
        }

        .chart-section,
        .stats-table {
            min-width: 100%;
        }

        .buckets-table {
            font-size: 0.9em;
        }

        .buckets-table thead th,
        .buckets-table tbody td {
            padding: 10px 8px;
        }
    }
</style>

<!-- Main Information Card -->
<div class="info-card">
    <div class="info-row">
        <div class="info-label">
            <i class="fa fa-server"></i>
            {$service->lang['Web interface address']}:
        </div>
        <div class="info-value">
            {if $service->server_httpprefix == 'https'}
                {if $service->server_port == '443'}
                    <a href="{$service->server_httpprefix}://{$service->server_hostname}/"
                       target="_blank" class="web-link">
                        {$service->server_httpprefix}://{$service->server_hostname}/
                    </a>
                {else}
                    <a href="{$service->server_httpprefix}://{$service->server_hostname}:{$service->server_port}/"
                       target="_blank" class="web-link">
                        {$service->server_httpprefix}://{$service->server_hostname}:{$service->server_port}/
                    </a>
                {/if}
            {else}
                {if $service->server_port == '80'}
                    <a href="{$service->server_httpprefix}://{$service->server_hostname}/"
                       target="_blank" class="web-link">
                        {$service->server_httpprefix}://{$service->server_hostname}/
                    </a>
                {else}
                    <a href="{$service->server_httpprefix}://{$service->server_hostname}:{$service->server_port}/"
                       target="_blank" class="web-link">
                        {$service->server_httpprefix}://{$service->server_hostname}:{$service->server_port}/
                    </a>
                {/if}
            {/if}
        </div>
    </div>

    <div class="info-row">
        <div class="info-label">
            <i class="fa fa-user"></i>
            {$service->lang['Username']}:
        </div>
        <div class="info-value">
            <div class="credential-box">
                <div class="credential-value">{$service->service_username}</div>
                <input type="hidden" name="username" id="username" value="{$service->service_username}">
                <button onclick="copyUsername()" id="copyUsernameButton" class="copy-btn" type="button">
                    <i class="fa fa-copy"></i>
                </button>
            </div>
        </div>
    </div>

    {if $service->package_option_show_password != 'no'}
        <div class="info-row">
            <div class="info-label">
                <i class="fa fa-lock"></i>
                {$service->lang['Password']}:
            </div>
            <div class="info-value">
                <div class="credential-box">
                    {if $service->package_option_show_password == 'show_button'}
                        <div class="password-input-group">
                            <input type="password" id="password" name="password" class="password-field"
                                   value="{$service->service_password}" disabled>
                            <button id="showPasswordButton" class="show-password-btn" type="button">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    {else}
                        <input type="text" id="password" name="password" class="password-field"
                               value="{$service->service_password}" disabled>
                    {/if}
                    <button onclick="copyPassword()" id="copyPasswordButton" class="copy-btn" type="button">
                        <i class="fa fa-copy"></i>
                    </button>
                </div>
            </div>
        </div>
    {/if}
</div>

<!-- Storage Statistics Card -->
<div class="info-card">
    <div class="stats-container">
        <div class="chart-section">
            <div id="used_space" style="width: 100%; height: 300px;"></div>
        </div>

        <div class="stats-table">
            <table>
                <tr>
                    <td><i class="fa fa-battery-full"></i>{$service->lang['Disk limit']}:</td>
                    <td>{$service->package_option_disk_space_size} {$service->package_option_unit}</td>
                </tr>
                <tr>
                    <td><i class="fa fa-database"></i>{$service->lang['Disk used']}:</td>
                    <td>{$service->disk_used_unit} {$service->package_option_unit}</td>
                </tr>
                <tr>
                    <td><i class="fa fa-recycle"></i>{$service->lang['Disk free']}:</td>
                    <td>{$service->disk_free_unit} {$service->package_option_unit}</td>
                </tr>
                <tr>
                    <td><i class="fa fa-percentage"></i>{$service->lang['Disk used percentage']}:</td>
                    <td>{$service->disk_used_percentage}%</td>
                </tr>
                <tr>
                    <td><i class="fa fa-percentage"></i>{$service->lang['Disk free percentage']}:</td>
                    <td>{$service->disk_free_percentage}%</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- Buckets Card -->
<div class="buckets-card">
    <div class="buckets-title">
        <i class="fa fa-archive"></i> {$service->lang['Buckets name']}
    </div>
    <table class="buckets-table">
        <thead>
        <tr>
            <th><i class="fa fa-archive"></i> {$service->lang['Buckets name']}</th>
            <th><i class="fa fa-object-ungroup"></i> {$service->lang['Objects']}</th>
            <th><i class="fa fa-file"></i> {$service->lang['Size']}</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$service->disk_service_buckets key=key item=bucket}
            <tr>
                <td><i class="fa fa-archive"></i>{$bucket['name']}</td>
                <td><i class="fa fa-object-ungroup"></i>{$bucket['objects']}</td>
                <td>
                    <i class="fa fa-file"></i>{round($bucket['size']*$service->unit_coefficient, 4)} {$service->package_option_unit}
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>

{literal}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(used_space);

    function used_space() {
        var data = google.visualization.arrayToDataTable([
            ['', ''],
            {/literal}
            ['{$service->lang['Used']}', {$service->disk_used_bytes*$service->unit_coefficient}],
            ['{$service->lang['Free']}', {$service->disk_free_bytes*$service->unit_coefficient}],
            {literal}
        ]);

        var options = {
            title: '{/literal}{$service->lang['Used space']} ({$service->package_option_unit}){literal}',
            legend: 'bottom',
            pieSliceText: 'value',
            chartArea: {
                height: '75%',
                width: '90%',
            },
            height: 300,
            'backgroundColor': 'transparent',
            slices: {
                0: {color: '#dc3545'},
                1: {color: '#28a745'}
            },
            fontSize: 13,
            fontName: 'Arial'
        };

        var chart = new google.visualization.PieChart(document.getElementById('used_space'));
        chart.draw(data, options);
    }

    var passwordField = document.getElementById('password');
    var showPasswordButton = document.getElementById('showPasswordButton');

    if (showPasswordButton) {
        function startShowPassword() {
            passwordField.type = 'text';
        }

        function endShowPassword() {
            passwordField.type = 'password';
        }

        showPasswordButton.addEventListener('mousedown', startShowPassword);
        showPasswordButton.addEventListener('mouseup', endShowPassword);
        showPasswordButton.addEventListener('mouseleave', endShowPassword);

        showPasswordButton.addEventListener('touchstart', startShowPassword);
        showPasswordButton.addEventListener('touchend', endShowPassword);
        showPasswordButton.addEventListener('touchcancel', endShowPassword);
    }

    function copyPassword() {
        const input = document.getElementById('password');
        navigator.clipboard.writeText(input.value).then(() => {
            alert('Copied to clipboard: ' + input.value);
        }).catch(err => {
            console.error('Copy error: ', err);
        });
    }

    function copyUsername() {
        const input = document.getElementById('username');
        navigator.clipboard.writeText(input.value).then(() => {
            alert('Copied to clipboard: ' + input.value);
        }).catch(err => {
            console.error('Copy error: ', err);
        });
    }
</script>
{/literal}