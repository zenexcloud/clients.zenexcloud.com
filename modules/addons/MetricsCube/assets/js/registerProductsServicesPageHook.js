var MCClientsList = [];
$('div#contentarea table tr').each(function () {
	let clientURL = $(this).find('td:eq(4) a').attr('href');
	if (typeof clientURL == 'string') {
		let offset = clientURL.indexOf("?userid=");
		if (offset > 0) {
			let clientID = clientURL.substring(offset + 8)
			if (clientID > 0) {
				$(this).find('td:eq(4)').attr('data-user-id', clientID);
				$(this).attr('data-user-id', clientID);
				MCClientsList.push(clientID);
			}
		}
	}
});
$.post('addonmodules.php?module=MetricsCube', {
	module: "MetricsCube", ajax: 1, dataType: "json", moduleAction: "getClientsTagsAndComments", clients: MCClientsList
}).success(res => {
	res = $.parseJSON(res);
	$.each(res, function (clientID, details) {
		let HTML = '';
		if (typeof details.tags == 'object') {
			$.each(details.tags, function (tagKey, tag) {
				HTML = HTML + 'T: ' + tag.name + ', ';
			});
		}
		if (typeof details.comments == 'object') {
			$.each(details.comments, function (commentKey, comment) {
				HTML = HTML + 'C: ' + comment.comment + ', ';
			});
		}
		$('div#contentarea table tr td[data-user-id="' + clientID + '"]').closest('tr').find('td:eq(4)').append(' ' + HTML);
	});
}).fail(() => {

});
var timer;
var delay = 1000;
$('div#contentarea table tr').each(function () {
	$(this).find('td:eq(4)').hover(function () {
		timer = setTimeout(() => {
			let clientID = $(this).closest('tr').attr('data-user-id');
			$.post('addonmodules.php?module=MetricsCube', {
				module: "MetricsCube", ajax: 1, dataType: "json", moduleAction: "getClientDetails", clientID: clientID
			}).success(res => {
				res = $.parseJSON(res);
			}).fail(() => {

			});
		}, delay);
	}, function () {
		clearTimeout(timer);
	});
});

