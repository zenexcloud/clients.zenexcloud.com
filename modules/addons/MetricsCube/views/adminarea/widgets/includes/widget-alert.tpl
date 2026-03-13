<span class="hidden" data-error-type="{$errorType}"></span>
{if !$smarty.cookies.METRICSCUBE_free_trial_alert}
<div class="widget-alert widget-alert--{$errorStyle} {if $alertCustomClass}{$alertCustomClass}{/if}" data-widget-alert>
    <div class="widget-alert__icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 18.3334C14.6024 18.3334 18.3334 14.6024 18.3334 10C18.3334 5.39765 14.6024 1.66669 10 1.66669C5.39765 1.66669 1.66669 5.39765 1.66669 10C1.66669 14.6024 5.39765 18.3334 10 18.3334Z" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 13.3333V10" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 6.66669H10.0088" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <span class="widget-alert__text">
        {if $errorType=="appKeyEmpty" || $errorType=="invalidKey"}
            {if empty($alertText)}
                Need more detailed data about your business? Start a <b>Free Trial</b> at MetricsCube today and explore all the features <b>- no pre-payment or credit card required.</b>
            {else}
                {$alertText}
            {/if}
        {elseif $errorType=="synchronizationInProgress"}
            {$alertText}
        {else}
            {$alertText}
        {/if}
    </span>
    {if $btnText}
        <a
            {if $btnUrl}
                href="{$btnUrl}"
            {else}
                {if $btnAction}
                    data-{$btnAction}
                    data-auto-open
                {/if}
            {/if}
            class="btn btn--{$errorStyle} btn--sm"
        >
            {$btnText}
        </a>
    {/if}
    {if $errorType == "appKeyEmpty" || $errorType == "invalidKey"}
        <a class="widget-alert__close" data-trial-close>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4L4 12" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 4L12 12" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    {/if}
</div>
{/if}
<script>
$(document).ready(function () {
    $('a[data-registrationmodal]').on('click', async function (e) {
        e.preventDefault();
        try {
            const response = await axios.post('addonmodules.php?module=MetricsCube', MCAjaxParams({
                module: "MetricsCube",
                ajax: 1,
                dataType: "json",
                async: true,
                moduleAction: "getRegistrationModal",
            }));
            
            if ($('#connect-account').length === 0) {
                $('body').append(response.data.content);
            } else {
                
            }
        } catch (error) {
            
        }
    });
    $('[data-trial-close]').on('click', function(e){
        e.preventDefault();

        $(this).closest('.widget-alert').remove();

        var d = new Date();
        d.setTime(d.getTime() + (30*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "METRICSCUBE_free_trial_alert=1;" + expires + ";path=/";
    });

    const hiddenError = document.querySelector('[data-error-type]');
    if (!hiddenError) return;

    const errorType = hiddenError.dataset.errorType;
    if (errorType !== 'synchronizationInProgress') return;

    const cookieExists = document.cookie.includes('METRICSCUBE_free_trial_alert=');
    if (!cookieExists) return;

    document.cookie = "METRICSCUBE_free_trial_alert=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

    if (!document.querySelector('[data-widget-alert]')) {
        const alertHTML = `
            <div class="widget-alert widget-alert--warning" data-widget-alert>
                <div class="widget-alert__icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 18.3334C14.6024 18.3334 18.3334 14.6024 18.3334 10C18.3334 5.39765 14.6024 1.66669 10 1.66669C5.39765 1.66669 1.66669 5.39765 1.66669 10C1.66669 14.6024 5.39765 18.3334 10 18.3334Z" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 13.3333V10" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 6.66669H10.0088" stroke="#ED7812" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="widget-alert__text">
                    MetricsCube is synchronizing your data, please allow a little time for the process to finish.
                </span>
            </div>
        `;

        hiddenError.insertAdjacentHTML('afterend', alertHTML);
    }
});
</script>