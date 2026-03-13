<link href="{$SCRIPT_NAME}/../../modules/addons/MetricsCube/assets/css/user-widget.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
window.customScriptLoad = true
window.isWidgetStatic = true;
window.MCPermissions = {$MetricsCubePermissions|json_encode}
	// let isWidgetRendered = false

	//main.js
	var mainJS = document.createElement( "script" );
	mainJS.src = '../modules/addons/MetricsCube/assets/js/main.js';
	mainJS.type = "text/javascript";
	mainJS.setAttribute("defer", "");


	//vendor.js
	var vendorJS = document.createElement( "script" );
	vendorJS.src = '../modules/addons/MetricsCube/assets/js/vendor.js';
	vendorJS.type = "text/javascript";
	vendorJS.setAttribute("defer", "");

	function renderWidget(response) {
		let res = $.parseJSON(response);
		window.MCPermissions = res.permissions
		if($('[data-popover-wrapper]').length) {
			$('[data-popover-wrapper]').replaceWith(res.content);
		}
		else if($('#summary-login-as-owner').length) {
			$('#summary-login-as-owner').closest('.clientssummarybox').after(res.content)
		}
		else if($('#summary-login-as-client').length) {
			$('#summary-login-as-client').closest('.clientssummarybox').after(res.content)
		}

		if(window.MCPermissions['customer_details.view_profile']) {
			$('#summary-login-as-owner').closest('.clientssummarybox').hide()
			$('#summary-login-as-client').closest('.clientssummarybox').hide()

			$('[data-popover-client-customer]').removeClass('is-hidden')
		}
	}

	function appendScriptsCustom() {
		setTimeout(() => {
			$('head').append(vendorJS)
		}, 0)
		setTimeout(() => {
			$('head').append(mainJS)
		}, 0)
	}
	// $(document).ready(function () {
		window.userWidgetRendered = true;
		
		if(window.MCPermissions['metricscube_url']) {
			$('[data-mc-link]').show()
		}
		if(window.MCPermissions['customer_details.view_profile']) {
			$.post('addonmodules.php?module=MetricsCube', {
				module: "MetricsCube",
				ajax: 1,
				clientID: {$userID},
				dataType: "json",
				async: true,
				moduleAction: "getAdminClientSummaryTab",
				dataSource: 'local'
			}).success(resLocal => {
				renderWidget(resLocal);	
				$.post('addonmodules.php?module=MetricsCube', {
					module: "MetricsCube",
					ajax: 1,
					clientID: {$userID},
					dataType: "json",
					async: true,
					moduleAction: "getAdminClientSummaryTab"
				}).success(response => {
					renderWidget(response)
					appendScriptsCustom()
				}).fail(() => {
					appendScriptsCustom()
				});

			}).fail(() => {

			});
		}

	// });  

</script>
