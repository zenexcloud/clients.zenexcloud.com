<h2>{$service->lang['Used space statistics']}</h2>

<div id="last_30_days" style="width:100%; height:300px;"></div>
<hr>
<div id="avg_month" style="width:100%; height:300px;"></div>

{literal}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(last_30_days);

    function last_30_days() {
        var data = google.visualization.arrayToDataTable([
            ['', '{/literal}{$service->package_option_unit} {literal}'],
            {/literal}
            {foreach from=$disk_history_30 key=h_key item=h_data}
            ['{$h_key}', {round($h_data['disk']*$service->unit_coefficient, 3)}],
            {/foreach}
            {literal}
        ]);
        var options = {
            title: '{/literal}{$service->lang['Last 30 days']}{literal}',
            legend: 'none',
            pieSliceText: 'label',
            chartArea: {
                height: '60%',
                width: '85%',
            },
            height: '90%',
            width: '90%',
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('last_30_days'));
        chart.draw(data, options);
    }
</script>
<script>
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(avg_month);

    function avg_month() {
        var data = google.visualization.arrayToDataTable([
            ['', '{/literal}{$service->package_option_unit} {literal}'],
            ['', 0],
            {/literal}
            {foreach from=$disk_history key=h_key item=h_data}
            ['{$h_key}', {round($h_data['disk']*$service->unit_coefficient, 3)}],
            {/foreach}
            {literal}
        ]);
        var options = {
            title: '{/literal}{$service->lang['Avg per month']}{literal}',
            legend: 'none',
            pieSliceText: 'label',
            chartArea: {
                height: '60%',
                width: '85%',
            },
            height: '90%',
            width: '90%',
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('avg_month'));
        chart.draw(data, options);
    }
</script>
{/literal}
