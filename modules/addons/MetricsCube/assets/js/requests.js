jQuery(document).ready(function () {
    const $mcContainer = jQuery('#mc-container');
    const autoActivate = $mcContainer.attr('data-auto-activate') === '1';

    if (autoActivate) {

        jQuery('#syncLoader').luBtnLoader('show');

        let appKey = $mcContainer.find('input[name="appKey"]').val();
        if (!appKey) {
            appKey = $mcContainer.attr('data-app-key') || '';
        }

        setTimeout(function() {
            if (appKey) {
                jQuery.ajax({
                    url: saveConfigurationUrl,
                    type: "post",
                    dataType: 'json',
                    data: {
                        userDetails: jQuery('input[name="userDetails"]').is(":checked"),
                        userTracking: jQuery('input[name="userTracking"]').is(":checked"),
                        instantDataSynchronization: jQuery('input[name="instantDataSynchronization"]').is(":checked"),
                    }
                }).done(function(response) {
                    if (response.status === 'success') {
                        jQuery.ajax({
                            url: activationUrl,
                            type: "post",
                            dataType: 'json',
                            data: { appKey: appKey }
                        }).done(function(response) {
                            if (response.status === 'success' && response.url) {
                                $('#activated').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                }).modal('show');

                                $('#activated').on('hidden.bs.modal', function () {
                                    window.location.href = response.url;
                                });
                            } 
                            else if (response.status === 'error' && response.content) {
                                $mcContainer.find('.lu-alert').empty().append(response.content).removeClass('hide');
                            }
                        }).complete(function () {
                            jQuery('#syncLoader').luBtnLoader('hide');
                        });
                    } else if (response.status === 'error' && response.content) {
                        $mcContainer.find('.lu-alert').empty().append(response.content).removeClass('hide');
                    }
                });
            }
        }, 2000);
    }
    jQuery('.lu-mc-app input[name="appKey"]').on('change paste keyup', function () {
        if (jQuery(this).val().length > 0) {
            jQuery('.lu-mc-app .lu-form-group a.lu-form-feedback').hide();
        } else {
            jQuery('.lu-mc-app .lu-form-group a.lu-form-feedback').show();
        }
    });
    jQuery('.lu-mc-app input[name="appKey"]').trigger('change');
    if (!autoActivate) { 
        checkActivation();
    }
    jQuery('#mc-container').on('click', 'button[name="appKeyButton"]', function () {
        jQuery('#mc-container div.lu-form-group').removeClass('lu-is-error');
        let firstSynchronizeAttribute = jQuery(this).attr('data-first-synchronize');
        if (typeof firstSynchronizeAttribute !== typeof undefined && firstSynchronizeAttribute !== false) {
            jQuery('#application-configure').modal('show');
            jQuery(this).removeAttr('data-first-synchronize');
            return;
        }
        var appKey = jQuery('#mc-container input[name="appKey"]').val();
        jQuery('#syncLoader').luBtnLoader('show');
        jQuery('#mc-container .lu-alert').addClass('hide');
        jQuery.ajax({
            url: activationUrl,
            type: "post",
            dataType: 'json',
            data: {
                appKey: appKey
            }
        }).done(function (response) {
            if (response.hasOwnProperty('status')) {
                if (response.status == 'success') {
                    window.location.href = response.url;
                } else if (response.status == 'error') {
                    jQuery('#mc-container div.lu-form-group').addClass('lu-is-error');
                    if (response.hasOwnProperty('content')) {
                        jQuery('#mc-container .lu-alert').empty();
                        jQuery('#mc-container .lu-alert').append(response.content);
                        jQuery('#mc-container .lu-alert').removeClass('hide');
                        jQuery('#mc-container button#syncLoader span.lu-btn__text').text('Connect Again');
                    }
                }
            }
        }).complete(function () {
            jQuery('#syncLoader').luBtnLoader('hide');
        });
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
            }
        }).done(function (response) {
            if (response.hasOwnProperty('status')) {
                if (response.status == 'success') {
                    jQuery('#mc-container button[name="appKeyButton"]').trigger('click');
                }
            }
        }).complete(function () {
            jQuery('#application-configure').modal('hide')
            jQuery('#mc-container #main-loader').addClass('is-hidden');
        });
    });
    jQuery('#application-configure').on('hidden.bs.modal', function () {
        jQuery('button[name="appKeyButton"]').attr('data-first-synchronize', true);
    });
});

function checkActivation() {
    setInterval(function () {
        jQuery.ajax({
            url: activationCheckUrl,
            type: "post",
            dataType: 'json',
        }).done(function (response) {
            if (response.hasOwnProperty('status')) {
                if (response.status == 'success' && response.hasOwnProperty('url')) {
                    window.location.href = response.url;
                } else if (response.status == 'error') {
                    if (response.hasOwnProperty('content')) {
                        jQuery('#mc-container .lu-alert').empty();
                        jQuery('#mc-container .lu-alert').append(response.content);
                        jQuery('#mc-container .lu-alert').removeClass('hide');
                    }
                }
            }
        });
    }, 5000);
}
