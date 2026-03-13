<link href="{$SCRIPT_NAME}/../../modules/addons/MetricsCube/assets/css/user-widget.css" rel="stylesheet" type="text/css"/>
{include file="adminarea/header.tpl"}
<link href="{$helper->style('acl-tree.css')}" rel="stylesheet" type="text/css"/>
<div id="mc-container">
    <div class="lu-mc-app">
        <div class="lu-mc-app__body">
            <div class="lu-mc-app__content">
                <a class="lu-mc-app__logo lu-logo" href="https://www.metricscube.io/" target="_blank">
                    <img src="{$helper->img('logo.svg')}" alt="metrics cube">
                </a>
                {if $smarty.get.isFirst}
                    <div class="lu-alert lu-alert--faded lu-alert--border-left lu-alert--info lu-has-icon lu-alert--conected">
                        <div class="lu-alert__body">
                            <h3 class="lu-alert__title">
                                Huzzah!
                            </h3>
                            <p>You have successfully connected your WHMCS with MetricsCube and you are almost good to
                                go.<br> <strong>The first synchronization process between the systems may take up to a
                                    few minutes.</strong><br> Feel free to kick back and relax in the meantime. Your
                                reports will be ready in a jiffy.</p>
                        </div>
                    </div>
                {/if}
                <div class="lu-alert lu-alert--faded lu-alert--danger lu-alert--border-left lu-alert--sections lu-m-b-0x {if $errors===false}hide{/if}">
                    {if $errors!==false}
                        {$errors}
                    {/if}
                </div>
                <div class="lu-section lu-section--border lu-section--status">
                    <h2 class="lu-section__title lu-h4">
                        Status: <strong class="lu-status-contected">Connected</strong>
                    </h2>
                    <div class="lu-rail lu-rail--space-between">
                        <p>Last synchronization: <strong>{$lastSyncTime}</strong> {if $warning}
                                <span class="lu-section__info" data-target="#old-synchronization-modal"
                                      data-toggle="lu-modal"><i class="lu-zmdi lu-zmdi-help-outline"></i> Why has my data not been synchronized ever since?</span>
                            {/if}</p>
                        <div class="lu-section__status lu-mc-status lu-mc-status--connected">
                            <i class="lu-zmdi lu-zmdi-check"></i>
                        </div>

                    </div>
                    <div class="lu-section__actions">
                        <a href="https://dashboard.metricscube.io/sign-in" target="_blank"
                           class="lu-btn lu-btn--primary"><span
                                    class="lu-btn__text">Access MetricsCube</span></a>
                        {if $logs}
                            <a target="__blank" href="{$helper->url('Main@logs')}"
                               class="lu-btn lu-btn--secondary lu-btn--faded"><span class="lu-btn__text">See Logs</span></a>
                        {else}
                            <button class="lu-btn lu-btn--secondary lu-btn--faded" data-toggle="lu-modal"
                                    data-target="#application-logs"><span class="lu-btn__text">See Logs</span></button>
                        {/if}
                        <button href="#reconnect-modal" data-toggle="lu-modal"
                                class="lu-btn lu-btn--secondary lu-btn--faded"><span class="lu-btn__text">Connect New Account</span>
                        </button>
                    </div>
                </div>
                <div class="lu-section lu-section--border lu-section--sync">
                    <h2 class="lu-section__title lu-h4">
                        Data Synchronization
                    </h2>
                    <div class="lu-rail lu-rail--1x lu-align-content-center">
                        <p class="">Data actively synchronized with your MetricsCube:</p>
                        <div class="lu-mc-label lu-mc-label--success">General Data</div>
                        {if $userDetails}
                            <div class="lu-mc-label lu-mc-label--success">Detailed User Data</div>
                        {/if}
                        {if $userTracking}
                            <div class="lu-mc-label lu-mc-label--success">User Tracking</div>
                        {/if}
                        {if $instantDataSynchronization}
                            <div class="lu-mc-label lu-mc-label--success">Live Data Synchronization</div>
                        {/if}
                    </div>
                    {if !$userDetails || !$userTracking || !$instantDataSynchronization}
                        <div class="lu-rail rail--1x  lu-align-content-center">
                            <p class="lu-text-nowrap ">Disabled data synchronization:</p>
                            {if !$userDetails}
                                <div class="lu-mc-label lu-mc-label--danger">Detailed User Data</div>
                            {/if}
                            {if !$userTracking}
                                <div class="lu-mc-label lu-mc-label--danger">User Tracking</div>
                            {/if}
                            {if !$instantDataSynchronization}
                                <div class="lu-mc-label lu-mc-label--danger">Live Data Synchronization</div>
                            {/if}
                            <p class="lu-section__info lu-section__info--danger">
                                <i class="lu-zmdi lu-zmdi-info-outline"></i>
                                Note that some MetricsCube features will be inactive.
                            </p>
                        </div>
                    {/if}
                    <div class="lu-section__actions">
                        <button class="lu-btn lu-btn--secondary lu-btn--faded" data-toggle="lu-modal"
                                data-target="#application-configure"><span class="btn__text">Configure</span></button>
                    </div>
                </div>
                <div class="lu-section lu-section--border">
                    <h2 class="lu-section__title lu-h4">
                        Enhanced WHMCS Experience
                    </h2>
                    <div class="lu-rail lu-rail--1x lu-align-content-center">
                        <p class="">MetricsCube elevates your admin area experience by presenting invaluable insights
                            and swiftly furnishing key information regarding your business performance, clients, and
                            services.
                        </p>
                    </div>
                    <div class="lu-rail lu-rail--1x lu-align-content-center">
                        <p class="">Addon settings:</p>
                        {if $connectorUserWidgetPopup}
                            <div class="lu-mc-label lu-mc-label--success">User Data Widget Popup</div>
                        {/if}
                        {if $connectorUserTags}
                            <div class="lu-mc-label lu-mc-label--success">User Tags in Clients List</div>
                        {/if}
                        {if $connectorStatisticsWidget}
                            <div class="lu-mc-label lu-mc-label--success">Quick Statistics Widget</div>
                        {/if}
                        {if $connectorUserWidgetProfile}
                            <div class="lu-mc-label lu-mc-label--success">User Data Widget in Client Profile</div>
                        {/if}
                        {if $connectorUserWidgetServiceDetails}
                            <div class="lu-mc-label lu-mc-label--success">User Data Widget in Service Details</div>
                        {/if}
                        {if $connectorMainMenuLink}
                            <div class="lu-mc-label lu-mc-label--success">MetricsCube Link in Main Menu</div>
                        {/if}
                    </div>
                    {if !$connectorUserWidgetPopup || !$connectorUserTags || !$connectorStatisticsWidget || !$connectorUserWidgetProfile || !$connectorUserWidgetServiceDetails || !$connectorMainMenuLink}
                        <div class="lu-rail rail--1x  lu-align-content-center">
                            {if !$connectorUserWidgetPopup}
                                <div class="lu-mc-label lu-mc-label--danger">User Data Widget Popup</div>
                            {/if}
                            {if !$connectorUserTags}
                                <div class="lu-mc-label lu-mc-label--danger">User Tags in Clients List</div>
                            {/if}
                            {if !$connectorStatisticsWidget}
                                <div class="lu-mc-label lu-mc-label--danger">Quick Statistics Widget</div>
                            {/if}
                            {if !$connectorUserWidgetProfile}
                                <div class="lu-mc-label lu-mc-label--danger">User Data Widget in Client Profile</div>
                            {/if}
                            {if !$connectorUserWidgetServiceDetails}
                                <div class="lu-mc-label lu-mc-label--danger">User Data Widget in Service Details</div>
                            {/if}
                            {if !$connectorMainMenuLink}
                                <div class="lu-mc-label lu-mc-label--danger">MetricsCube Link in Main Menu</div>
                            {/if}
                        </div>
                    {/if}
                    <div class="lu-section__actions">
                        <button class="lu-btn lu-btn--secondary lu-btn--faded" data-toggle="lu-modal"
                                data-target="#connector-configure"><span class="btn__text">Configure</span></button>
                    </div>
                </div>
                <div class="lu-section lu-section--border">
                    <h2 class="lu-section__title lu-h4">
                        Admin Roles Permissions
                    </h2>
                    <div class="lu-rail lu-rail--1x lu-align-content-center">
                        <p class="">Configure settings for each administrator role individually, allowing precise
                            customization of displayed widgets and content to align with the specific role and
                            requirements of the administrator.
                        </p>
                    </div>
                    <div class="lu-section__actions">
                        <button class="lu-btn lu-btn--secondary lu-btn--faded" data-toggle="lu-modal"
                                data-target="#access-control"><span class="btn__text">Configure</span></button>
                    </div>
                </div>
            </div>
        </div>
        {include file="adminarea/banner.tpl" mode="connected"}
    </div>
    {include file="adminarea/modals/logs.tpl"}
    {include file="adminarea/modals/configuration.tpl"}
    {include file="adminarea/modals/reconnect.tpl"}
    {include file="adminarea/modals/synchronization.tpl"}
    {include file="adminarea/modals/access-control.tpl"}

    <div id="main-loader" class="lu-preloader-container is-hidden">
        <div class="lu-preloader lu-preloader--lg"></div>
    </div>
</div>
<script async src="{$SCRIPT_NAME}/../../modules/addons/MetricsCube/assets/js/vendor.js"></script>

<script src="{$SCRIPT_NAME}/../../modules/addons/MetricsCube/assets/js/acl-tree.js?{$unique_id}"></script>
<script>
	window.MCPermissions = {$MetricsCubePermissions|json_encode}
</script>
<script type="text/javascript">
    if(window.MCPermissions && window.MCPermissions['metricscube_url']) {
        $('[data-mc-link]').show()
    }
	$(document).on('click', '.lu-dropdown__item[data-value]', function (e) {
		e.preventDefault();
		var value = $(this).data('value');
		$('[data-method]').addClass('is-hidden');
		$('[data-method=' + value + ']').removeClass('is-hidden');
	});
	jQuery('#mc-container button[name="saveConfiguration"]').on('click', function () {
		jQuery('#mc-container #main-loader').removeClass('is-hidden');
		jQuery.ajax({
			url: saveConfigurationUrl,
			type: "post",
			dataType: 'json',
			data: {
				userDetails: jQuery('input[name="userDetails"]').is(":checked"),
				userTracking: jQuery('input[name="userTracking"]').is(":checked"),
				instantDataSynchronization: jQuery('input[name="instantDataSynchronization"]').is(":checked"),
				connectorUserWidgetPopup: jQuery('input[name="connectorUserWidgetPopup"]').is(":checked"),
				connectorUserTags: jQuery('input[name="connectorUserTags"]').is(":checked"),
				connectorStatisticsWidget: jQuery('input[name="connectorStatisticsWidget"]').is(":checked"),
				connectorUserWidgetProfile: jQuery('input[name="connectorUserWidgetProfile"]').is(":checked"),
				connectorUserWidgetServiceDetails: jQuery('input[name="connectorUserWidgetServiceDetails"]').is(":checked"),
				connectorMainMenuLink: jQuery('input[name="connectorMainMenuLink"]').is(":checked"),
			}
		}).done(function (response) {
			if (response.hasOwnProperty('status')) {
				if (response.status == 'success') {
					window.location.reload();
				}
			}
		}).complete(function () {
			$('#application-configure').modal('hide')
			jQuery('#mc-container #main-loader').addClass('is-hidden');
		});
	});
    //prevent btn focus 
    $(document).ready(function () {
        $('.lu-modal').on('hidden.bs.modal', function () {
            $(".lu-section.lu-section--border.lu-section--sync").trigger();
        });
    });
</script>
{include file="adminarea/footer.tpl"}
