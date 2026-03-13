var MCClientsList = [];
$('div#contentarea table tr').each(function () {
	let clientID = $(this).find('td:eq(1) a').attr('data-id');
	if (clientID > 0) {
		MCClientsList.push(clientID);
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
		$('div#contentarea table tr td a[data-id="' + clientID + '"]').closest('tr').find('td:eq(2)').append(' ' + HTML);
	});
}).fail(() => {

});
var timer;
var delay = 1000;
$('div#contentarea table tr').each(function () {
	$(this).find('td:eq(0), td:eq(1), td:eq(2)').hover(function () {
		timer = setTimeout(() => {
			let clientID = $(this).closest('tr').find('td:eq(1) a').attr('data-id');
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

