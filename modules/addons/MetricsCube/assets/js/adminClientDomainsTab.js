window.customScriptLoad = true
//styles
var link = document.createElement("link");
link.href = (window.whmcsBaseUrl != null ? window.whmcsBaseUrl : '..') + '/modules/addons/MetricsCube/assets/css/services-widget.css';
link.type = "text/css";
link.rel = "stylesheet";
link.media = "screen,print";

$('body').append(link)

//services-widget.js
var servicesJS = document.createElement("script");
servicesJS.src = (window.whmcsBaseUrl != null ? window.whmcsBaseUrl : '..') + '/modules/addons/MetricsCube/assets/js/services-widget.js';
servicesJS.type = "text/javascript";
servicesJS.setAttribute("defer", "");

//main.js
// var mainJS = document.createElement("script");
// mainJS.src = (window.whmcsBaseUrl != null ? window.whmcsBaseUrl : '..') + '/modules/addons/MetricsCube/assets/js/main.js';
// mainJS.type = "text/javascript";
// mainJS.setAttribute("defer", "");

//vendor.js
var vendorJS = document.createElement("script");
vendorJS.src = (window.whmcsBaseUrl != null ? window.whmcsBaseUrl : '..') + '/modules/addons/MetricsCube/assets/js/vendor.js';
vendorJS.type = "text/javascript";
vendorJS.setAttribute("defer", "");

function appendScriptsCustom() {
	$('head').append(vendorJS)
	$('head').append(servicesJS)
	// $('head').append(mainJS)
}

$.post('addonmodules.php?module=MetricsCube', {
	module: "MetricsCube",
	ajax: 1,
	clientID: {clientID},
	domainID: {domainID},
	dataType: "json",
	async: true,
	moduleAction: "getAdminClientDomainsTab",
	dataSource: 'local'
}).success(response => {
	let res = $.parseJSON(response);
	$('#profileContent div:first').after(res.content);
	if(window.MCPermissions['domain_details.view_widget']) {
		$('[data-domains-widget]').removeClass('is-hidden')
	}
	if(window.MCPermissions['metricscube_url']) {
		$('[data-mc-link]').show()
	}

	$.post('addonmodules.php?module=MetricsCube', {
		module: "MetricsCube",
		ajax: 1,
		clientID: {clientID},
		domainID: {domainID},
		dataType: "json",
		async: true,
		moduleAction: "getAdminClientDomainsTab",
	}).success(response => {
		let res = $.parseJSON(response);
		$('[data-domains-widget-wrapper]').replaceWith(res.content)

		// $('#profileContent div:first').after(res.content);
		if(window.MCPermissions['domain_details.view_widget']) {
			$('[data-domains-widget]').removeClass('is-hidden')
		}
		if(window.MCPermissions['metricscube_url']) {
			$('[data-mc-link]').show()
		}
		$('[data-domains-widget-wrapper]').find('[data-domain-mrr-loader]').addClass('is-hidden')
		$('[data-domains-widget-wrapper]').find('[data-domain-mrr]').removeClass('is-hidden')
		appendScriptsCustom()
	}).fail(() => {
		$('[data-domains-widget-wrapper]').find('[data-domain-mrr-loader]').addClass('is-hidden')
		$('[data-domains-widget-wrapper]').find('[data-domain-mrr]').removeClass('is-hidden')
		appendScriptsCustom()
	});

}).fail(() => {

});