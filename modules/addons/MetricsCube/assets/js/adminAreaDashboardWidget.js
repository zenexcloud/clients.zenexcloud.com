let now = new Date();
window.isScriptLoaded = true
// window.customScriptLoad = true;

//main.js
var mainJS = document.createElement( "script" );
mainJS.src = `${window.MCWhmcsUrl}modules/addons/MetricsCube/assets/js/main.js`;
mainJS.type = "text/javascript";
mainJS.setAttribute("defer", "");


//vendor.js
var vendorJS = document.createElement( "script" );
vendorJS.src = `${window.MCWhmcsUrl}/modules/addons/MetricsCube/assets/js/vendor.js`;
vendorJS.type = "text/javascript";
vendorJS.setAttribute("defer", "");


var csrfInput = document.createElement('input')
csrfInput.type = 'hidden'
csrfInput.name = 'token'
csrfInput.value = window.csrfToken

var loginForm = document.createElement('form')
loginForm.method = 'post'
loginForm.id = 'frmLoginAsOwner'
loginForm.append(csrfInput)

function getDashboardWidget() {
	$.post(`${window.MCWhmcsAdminUrl}addonmodules.php?module=MetricsCube`, {
		clientTime: {
			dateTime: now.getFullYear() + "-" + ('0' + (now.getMonth() + 1)).slice(-2) + "-" + ('0' + now.getDate()).slice(-2) + " " + ('0' + now.getHours()).slice(-2) + ":" + ('0' + now.getMinutes()).slice(-2) + ":" + ('0' + now.getSeconds()).slice(-2),
			UTCDateTime: now.getUTCFullYear() + "-" + ('0' + (now.getUTCMonth() + 1)).slice(-2) + "-" + ('0' + now.getUTCDate()).slice(-2) + " " + ('0' + now.getUTCHours()).slice(-2) + ":" + ('0' + now.getUTCMinutes()).slice(-2) + ":" + ('0' + now.getUTCSeconds()).slice(-2),
			timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
			timeZoneOffset: now.getTimezoneOffset(),
		},
		
		module: "MetricsCube",
		ajax: 1,
		dataType: "json",
		async: true,
		moduleAction: "getDashboardWidget",
		timeRange: window.localStorage.getItem('dashboardWidgetRange') ? window.localStorage.getItem('dashboardWidgetRange') : 'today',
		dataSource: 'local'
		
	}).success(response => {
		let res = $.parseJSON(response);
		window.MCPermissions = res.permissions
		window.MCSettings = res.settings
		$('#MCAdminDashboardWidget').html(res.content);

		if(window.packery) {
			window.packery.layout()
		}
	

		if(window.MCPermissions && window.MCPermissions['metricscube_url']) {
			$('[data-mc-link]').show()
		}
		
		$.post(`${window.MCWhmcsAdminUrl}addonmodules.php?module=MetricsCube`, {
			clientTime: {
				dateTime: now.getFullYear() + "-" + ('0' + (now.getMonth() + 1)).slice(-2) + "-" + ('0' + now.getDate()).slice(-2) + " " + ('0' + now.getHours()).slice(-2) + ":" + ('0' + now.getMinutes()).slice(-2) + ":" + ('0' + now.getSeconds()).slice(-2),
				UTCDateTime: now.getUTCFullYear() + "-" + ('0' + (now.getUTCMonth() + 1)).slice(-2) + "-" + ('0' + now.getUTCDate()).slice(-2) + " " + ('0' + now.getUTCHours()).slice(-2) + ":" + ('0' + now.getUTCMinutes()).slice(-2) + ":" + ('0' + now.getUTCSeconds()).slice(-2),
				timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
				timeZoneOffset: now.getTimezoneOffset(),
			},
		
			module: "MetricsCube",
			ajax: 1,
			dataType: "json",
			async: true,
			moduleAction: "getDashboardWidget",
			timeRange: window.localStorage.getItem('dashboardWidgetRange') ? window.localStorage.getItem('dashboardWidgetRange') : 'today'
		
		}).success(response => {
			let res = $.parseJSON(response);
			window.MCPermissions = res.permissions
			window.MCSettings = res.settings
			$('#MCAdminDashboardWidget').html(res.content);

			if(window.packery) {
				window.packery.layout()
			}

			if( window.MCPermissions &&window.MCPermissions['metricscube_url']) {
				$('[data-mc-link]').show()
			}

			if($('[data-last-update-timer]').length) {
				window.lastRefreshTime = new Date();
		
				window.displayTimeSinceLastAction = function () {
					const currentTime = new Date();
					const minutesSinceLastAction = Math.floor((currentTime - window.lastRefreshTime) / (1000 * 60));
					
					//refresh after 10 minutes
					if(minutesSinceLastAction >= 10) {
						clearInterval(window.refreshInterval)
						getDashboardWidget()
					}
					$('[data-last-update-timer]').text(minutesSinceLastAction)
				}
		
				window.refreshInterval = setInterval(window.displayTimeSinceLastAction, 60000);
			}
			setTimeout(() => {
				$('head').append(vendorJS)
			}, 0)
			setTimeout(() => {
				$('head').append(mainJS)
			}, 0)
			setTimeout(() => {
				if(window.csrfToken) {
					$('body').append(loginForm)
				}
			}, 0)
		})

	}).fail(() => {
	
	});
}

getDashboardWidget()