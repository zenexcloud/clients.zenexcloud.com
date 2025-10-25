{include file="orderforms/{$carttpl}/common.tpl"}

<style>
.server-info {
    display: none !important;
}
</style>

<script>
var _localLang = {
    'addToCart': '{$LANG.orderForm.addToCart|escape}',
    'addedToCartRemove': '{$LANG.orderForm.addedToCartRemove|escape}'
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const hostname = document.querySelector('input[name="hostname"]');
    const rootpw = document.querySelector('input[name="rootpw"]');
    const ns1prefix = document.querySelector('input[name="ns1prefix"]');
    const ns2prefix = document.querySelector('input[name="ns2prefix"]');

    if (hostname) hostname.value = "server" + Math.floor(Math.random() * 10000) + ".zenexcloud.com";
    if (rootpw) rootpw.value = Math.random().toString(36).slice(-12);
    if (ns1prefix) ns1prefix.value = "ns1";
    if (ns2prefix) ns2prefix.value = "ns2";
});
</script>

<script>
var _localLang = {
    'addToCart': '{$LANG.orderForm.addToCart|escape}',
    'addedToCartRemove': '{$LANG.orderForm.addedToCartRemove|escape}'
}
</script>


{* যদি billingcycle variable empty থাকে তাহলে biennially default ধরা হবে *}
{assign var="billingcycle" value="biennially"}


<div id="order-standard_cart" class="cloudx_cart_body">
    <div class="row">
        <div class="cart-sidebar">
            {include file="orderforms/{$carttpl}/sidebar-categories.tpl"}
        </div>
        <div class="cart-body">
            <div class="header-lined">
                <h1 class="font-size-36">{$LANG.orderconfigure}</h1>
				<p>{$LANG.orderForm.configureDesiredOptions}</p>
            </div>
            {include file="orderforms/{$carttpl}/sidebar-categories-collapsed.tpl"}

            <form id="frmConfigureProduct">
                <input type="hidden" name="configure" value="true" />
                <input type="hidden" name="i" value="{$i}" />
                <div class="row">
                    <div class="secondary-cart-body">
                        <div class="product-info">
                            <p class="product-title">{$productinfo.name}</p>
                            <p>{$productinfo.description}</p>
                        </div>

                        <div class="alert alert-danger w-hidden" role="alert" id="containerProductValidationErrors">
                            <p>{$LANG.orderForm.correctErrors}:</p>
                            <ul id="containerProductValidationErrorsList"></ul>
                        </div>
                        {if $pricing.type eq "recurring"}
                            <div class="field-container billing-cycle-styled">
                                <div class="select-billing-cycle">
                                    <h3>{$LANG.cartchoosecycle}</h3>
                                    <ul class="selectBillingCycleCloudCart">
                                        {if $pricing.monthly}
                                            <li {if $billingcycle eq 'monthly'} class="active"{/if}>
                                                <input type="radio" name="billingcycle" class="no-icheck w-hidden" value="monthly" {if $billingcycle eq "monthly"} checked{/if} actionCall ="{if $configurableoptions}{$i}{else}callCloudCartSummary{/if}" />
                                                <strong>{$LANG.orderpaymenttermmonthly}</strong>
                                                <span>{$pricing.minprice.price->format('{PREFIX}')}{$pricing.rawpricing.monthly}{$pricing.minprice.price->format('{SUFFIX}')}</span>
                                            </li>
                                        {/if}
                                        {if $pricing.quarterly}
                                            <li {if $billingcycle eq 'quarterly'} class="active"{/if}>
                                                <input type="radio" name="billingcycle" class="no-icheck w-hidden"  value="quarterly" {if $billingcycle eq "quarterly"} checked{/if} actionCall ="{if $configurableoptions}{$i}{else}callCloudCartSummary{/if}" />
                                                <strong>{$LANG.orderpaymenttermquarterly}</strong>
                                                <span>{$pricing.minprice.price->format('{PREFIX}')}{$pricing.rawpricing.quarterly}{$pricing.minprice.price->format('{SUFFIX}')}</span>
                                            </li>
                                        {/if}
                                        {if $pricing.semiannually}
                                            <li {if $billingcycle eq 'semiannually'} class="active"{/if}>
                                                <input type="radio" name="billingcycle" class="no-icheck w-hidden"  value="semiannually" {if $billingcycle eq "semiannually"} checked{/if} actionCall ="{if $configurableoptions}{$i}{else}callCloudCartSummary{/if}" />
                                                <strong>{$LANG.orderpaymenttermsemiannually}</strong>
                                                <span>{$pricing.minprice.price->format('{PREFIX}')}{$pricing.rawpricing.semiannually}{$pricing.minprice.price->format('{SUFFIX}')}</span>
                                            </li>
                                        {/if}
                                        {if $pricing.annually}
                                            <li {if $billingcycle eq 'annually'} class="active"{/if}>
                                                <input type="radio" name="billingcycle" class="no-icheck w-hidden" value="annually" {if $billingcycle eq "annually"} checked{/if} actionCall ="{if $configurableoptions}{$i}{else}callCloudCartSummary{/if}" />
                                                <strong>{$LANG.orderpaymenttermannually}</strong>
                                                <span>{$pricing.minprice.price->format('{PREFIX}')}{$pricing.rawpricing.annually}{$pricing.minprice.price->format('{SUFFIX}')}</span>
                                            </li>
                                        {/if}
                                        {if $pricing.biennially}
                                            <li {if $billingcycle eq 'biennially'} class="active"{/if}>
                                                <input type="radio" name="billingcycle" class="no-icheck w-hidden"  value="biennially" {if $billingcycle eq "biennially"} checked{/if} actionCall ="{if $configurableoptions}{$i}{else}callCloudCartSummary{/if}" />
                                                <strong>{$LANG.orderpaymenttermbiennially}</strong>
                                                <span>{$pricing.minprice.price->format('{PREFIX}')}{$pricing.rawpricing.biennially}{$pricing.minprice.price->format('{SUFFIX}')}</span>
                                            </li>
                                        {/if}
                                        {if $pricing.triennially}
                                            <li {if $billingcycle eq 'triennially'} class="active"{/if}>
                                                <input type="radio" name="billingcycle" class="no-icheck w-hidden" value="triennially" {if $billingcycle eq "triennially"} checked{/if} actionCall ="{if $configurableoptions}{$i}{else}callCloudCartSummary{/if}" />
                                                <strong>{$LANG.orderpaymenttermtriennially}</strong>
                                                <span>{$pricing.minprice.price->format('{PREFIX}')}{$pricing.rawpricing.triennially}{$pricing.minprice.price->format('{SUFFIX}')}</span>
                                            </li>
                                        {/if}                                       
                                    </ul>
                                </div>								
                            </div>
                        {/if}

                        {if count($metrics) > 0}
                            <div class="sub-heading">
                                <span class="primary-bg-color">{$LANG.metrics.title}</span>
                            </div>

                            <p>{$LANG.metrics.explanation}</p>

                            <ul>
                                {foreach $metrics as $metric}
                                    <li>
                                        {$metric.displayName}
                                        -
                                        {if count($metric.pricing) > 1}
                                            {$LANG.metrics.startingFrom} {$metric.lowestPrice} / {if $metric.unitName}{$metric.unitName}{else}{$LANG.metrics.unit}{/if}
                                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalMetricPricing-{$metric.systemName}">
                                                {$LANG.metrics.viewPricing}
                                            </button>
                                        {elseif count($metric.pricing) == 1}
                                            {$metric.lowestPrice} / {if $metric.unitName}{$metric.unitName}{else}{$LANG.metrics.unit}{/if}
                                            {if $metric.includedQuantity > 0} ({$metric.includedQuantity} {$LANG.metrics.includedNotCounted}){/if}
                                        {/if}
                                        {include file="$template/usagebillingpricing.tpl"}
                                    </li>
                                {/foreach}
                            </ul>

                            <br>
                        {/if}

                        {if $productinfo.type eq "server"}
                            <div class="sub-heading server-info">
                                <span class="primary-bg-color">{$LANG.cartconfigserver}</span>
                            </div>

                            <div class="field-container server-info">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputHostname">{$LANG.serverhostname}</label>
                                            <input type="text" name="hostname" class="form-control" id="inputHostname" value="{$server.hostname}" placeholder="servername.example.com">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputRootpw">{$LANG.serverrootpw}</label>
                                            <input type="password" name="rootpw" class="form-control" id="inputRootpw" value="{$server.rootpw}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputNs1prefix">{$LANG.serverns1prefix}</label>
                                            <input type="text" name="ns1prefix" class="form-control" id="inputNs1prefix" value="{$server.ns1prefix}" placeholder="ns1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputNs2prefix">{$LANG.serverns2prefix}</label>
                                            <input type="text" name="ns2prefix" class="form-control" id="inputNs2prefix" value="{$server.ns2prefix}" placeholder="ns2">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        {/if}

                        {if $configurableoptions}
                            <div class="sub-heading">
                                <span class="primary-bg-color">{$LANG.orderconfigpackage}</span>
                            </div>
                            <div class="product-configurable-options" id="productConfigurableOptions">
                                <div class="row">
                                    {foreach $configurableoptions as $num => $configoption}
                                    {if $configoption.optiontype eq 1}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputConfigOption{$configoption.id}" class="config-option-label">{$configoption.optionname}</label>
                                                <select name="configoption[{$configoption.id}]" id="inputConfigOption{$configoption.id}" class="form-control">
                                                    {foreach key=num2 item=options from=$configoption.options}
                                                        <option value="{$options.id}"{if $configoption.selectedvalue eq $options.id} selected="selected"{/if}>
                                                            {$options.name}
                                                        </option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    {elseif $configoption.optiontype eq 2}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputConfigOption{$configoption.id}" class="config-option-label">{$configoption.optionname}</label>
                                                {foreach key=num2 item=options from=$configoption.options}
                                                    <br />
                                                    <label>
                                                        <input type="radio" name="configoption[{$configoption.id}]" value="{$options.id}"{if $configoption.selectedvalue eq $options.id} checked="checked"{/if} />
                                                        {if $options.name}
                                                            {$options.name}
                                                        {else}
                                                            {$LANG.enable}
                                                        {/if}
                                                    </label>
                                                {/foreach}
                                            </div>
                                        </div>
                                    {elseif $configoption.optiontype eq 3}
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="inputConfigOption{$configoption.id}" class="config-option-label">{$configoption.optionname}</label>
                                                <br />
                                                <label>
                                                    <input type="checkbox" name="configoption[{$configoption.id}]" id="inputConfigOption{$configoption.id}" value="1"{if $configoption.selectedqty} checked{/if} />
                                                    {if $configoption.options.0.name}
                                                        {$configoption.options.0.name}
                                                    {else}
                                                        {$LANG.enable}
                                                    {/if}
                                                </label>
                                            </div>
                                        </div>
                                    {elseif $configoption.optiontype eq 4}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="inputConfigOption{$configoption.id}" class="config-option-label">{$configoption.optionname}</label>
                                                {if $configoption.qtymaximum}
                                                {if !$rangesliderincluded}
                                                    <script type="text/javascript" src="{$BASE_PATH_JS}/ion.rangeSlider.min.js"></script>
                                                <link href="{$BASE_PATH_CSS}/ion.rangeSlider.css" rel="stylesheet">
                                                <link href="{$BASE_PATH_CSS}/ion.rangeSlider.skinModern.css" rel="stylesheet">
                                                    {assign var='rangesliderincluded' value=true}
                                                {/if}
                                                    <input type="text" name="configoption[{$configoption.id}]" value="{if $configoption.selectedqty}{$configoption.selectedqty}{else}{$configoption.qtyminimum}{/if}" id="inputConfigOption{$configoption.id}" class="form-control" />
                                                    <script>
                                                        var sliderTimeoutId = null;
                                                        var sliderRangeDifference = {$configoption.qtymaximum} - {$configoption.qtyminimum};
                                                        // The largest size that looks nice on most screens.
                                                        var sliderStepThreshold = 25;
                                                        // Check if there are too many to display individually.
                                                        var setLargerMarkers = sliderRangeDifference > sliderStepThreshold;

                                                        jQuery("#inputConfigOption{$configoption.id}").ionRangeSlider({
                                                            min: {$configoption.qtyminimum},
                                                            max: {$configoption.qtymaximum},
                                                            grid: true,
                                                            grid_snap: setLargerMarkers ? false : true,
                                                            onChange: function() {
                                                                if (sliderTimeoutId) {
                                                                    clearTimeout(sliderTimeoutId);
                                                                }

                                                                sliderTimeoutId = setTimeout(function() {
                                                                    sliderTimeoutId = null;
                                                                    recalctotals();
                                                                }, 250);
                                                            }
                                                        });
                                                    </script>
                                                {else}
                                                    <div>
                                                        <input type="number" name="configoption[{$configoption.id}]" value="{if $configoption.selectedqty}{$configoption.selectedqty}{else}{$configoption.qtyminimum}{/if}" id="inputConfigOption{$configoption.id}" min="{$configoption.qtyminimum}" onchange="recalctotals()" onkeyup="recalctotals()" class="form-control form-control-qty" />
                                                        <span class="form-control-static form-control-static-inline">
                                                                x {$configoption.options.0.name}
                                                            </span>
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                    {/if}
                                    {if $num % 2 != 0}
                                </div>
                                <div class="row">
                                    {/if}
                                    {/foreach}
                                </div>
                            </div>

                        {/if}

                        {if $customfields}

                            <div class="sub-heading pb-1">
                                <span class="primary-bg-color">{$LANG.orderadditionalrequiredinfo}<br><i><small>{lang key='orderForm.requiredField'}</small></i></span>
                            </div>

                            <div class="field-container">
                                {foreach $customfields as $customfield}
                                    <div class="form-group">
                                        <label for="customfield{$customfield.id}">{$customfield.name} {$customfield.required}</label>
                                        {$customfield.input}
                                        {if $customfield.description}
                                            <span class="field-help-text">
                                                {$customfield.description}
                                            </span>
                                        {/if}
                                    </div>
                                {/foreach}
                            </div>

                        {/if}

                        {if $addons || count($addonsPromoOutput) > 0}

                            <div id="productAddonsContainer">
                                <div class="sub-heading">
                                    <span class="primary-bg-color">{$LANG.cartavailableaddons}</span>
                                </div>

                                {foreach $addonsPromoOutput as $output}
                                    <div>
                                        {$output}
                                    </div>
                                {/foreach}

                                <div class="row addon-products">
                                    {foreach $addons as $addon}
                                        <div class="col-sm-{if count($addons) > 1}6{else}12{/if}">
                                            <div class="panel card panel-default panel-addon{if $addon.status} panel-addon-selected{/if}">
                                                <div class="panel-body card-body">
                                                    <label>
                                                        <input type="checkbox" name="addons[{$addon.id}]"{if $addon.status} checked{/if} />
                                                        {$addon.name}
                                                    </label><br />
                                                    {$addon.description}
                                                </div>
                                                <div class="panel-price">
                                                    {$addon.pricing}
                                                </div>
                                                <div class="panel-add">
                                                    <i class="fas fa-plus"></i>
                                                    {$LANG.addtocart}
                                                </div>
                                            </div>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        {/if}

                        <div class="alert alert-warning info-text-sm">
                            <i class="fas fa-question-circle"></i>
                            {$LANG.orderForm.haveQuestionsContact} <a href="{$WEB_ROOT}/contact.php" target="_blank" class="alert-link">{$LANG.orderForm.haveQuestionsClickHere}</a>
                        </div>

                    </div>
                    <div class="secondary-cart-sidebar" id="scrollingPanelContainer">

                        <div id="orderSummary">
                            <div class="order-summary">
                                <div class="loader" id="orderSummaryLoader">
                                    <i class="fas fa-fw fa-sync fa-spin"></i>
                                </div>
                                <h2 class="font-size-30">{$LANG.ordersummary}</h2>
                                <div class="summary-container" id="producttotal"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="btnCompleteProductConfig" class="btn btn-primary btn-lg">
                                    {$LANG.continue}
                                    <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<script>recalctotals();</script>

{include file="orderforms/{$carttpl}/recommendations-modal.tpl"}
