jQuery(document).ready(function () {
jQuery('.selectBillingCycleCloudCart li').click(function () {
	jQuery('.selectBillingCycleCloudCart').find('.active').each(function () {
		jQuery(this).removeClass('active');
	});
	jQuery(this).addClass('active');
	jQuery(this).find('input').prop('checked', true);
	if (jQuery(this).find('input').attr('actionCall') == 'callCloudCartSummary'){
		recalctotals();
	}else{
		updateConfigurableOptions(jQuery(this).find('input').attr('actionCall'), jQuery(this).find('input').val());
	}
});
});