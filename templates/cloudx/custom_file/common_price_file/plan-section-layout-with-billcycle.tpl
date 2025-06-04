{if $cloudx_product_data}
<section class="hosting-plans-wrp pricing-section-layout-1">
   <div class="container">
    {if $cloudx_product_data['status'] eq 'success'}
        {if $cloudx_product_data['result_count'] gt 0}
            <div class="titlebar">
                <h2>{$LANG.cloudxVPS_simpleTransparentPricingWithCycle}</h2>
                <p>{$LANG.cloudxVPS_simpleTransparentPricingDesWithCycle}</p>
            </div>
            {if $cloudx_product_data['product_cycles_count'] gt 0 }
                <div class="serv-maintabs">
                    <ul class="nav nav-tabs" id="changeCyclePlanSections">
                        {assign var=counter value=0} 
                        {foreach from=$cloudx_product_data['product_cycles'] key=kCycle item=cloudx_product_cycle}
                            {if $kCycle neq 'onetime' && $kCycle neq 'free'}
                                {assign var="billCyx" value=$LANG.{$cloudx_product_cycle}}                       
                                <li class="nav-item" role="presentation" onClick="wgsProductPlanBillingCycleChange(this,'{$kCycle}');">
                                    <button class="nav-link button-billing-cycle {if $counter eq '0'}active{/if}" id="plan1-{$kCycle}-tab" type="button">{$billCyx}</button>
                                </li>
                            {/if}
                            {$counter = $counter+1}
                        {/foreach}
                    </ul>
                </div>
            {/if}
            <div class="plans-row {if $cloudx_product_data['result_count'] lt 4}product_boxes_without_slider{/if}">
                <div class="row" {if $cloudx_product_data['result_count'] gt 3} id="pricing-section-slider"{/if}>
                    {foreach from=$cloudx_product_data['products_array'] item=cloudx_product_prices}
                        <div class="col-md-4 col-sm-12">
                            <div class="plan-block {if $cloudx_product_prices['has_popular_label'] gt 0}populer-box{/if}">
                                {if $cloudx_product_prices['has_popular_label'] gt 0}<label>{$LANG.cloudx_popular_label_layout_3}</label>{/if}
                                <div class="plan-plat">
                                    <h3>{$cloudx_product_prices['name']}</h3>
                                    <div class="plan-price-section price-sec-ly-1">
                                        {if $cloudx_product_prices['paytype'] eq 'onetime'}
                                            <div class="pricing-min-main onetime">
                                                {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermonetime}</span>
                                            </div>
                                        {/if}
                                        {if $cloudx_product_prices['paytype'] eq 'free'}
                                            <div class="pricing-min-main freeaccount">
                                                {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermfreeaccount}</span>
                                            </div>
                                        {/if}
                                        {if $cloudx_product_prices['paytype'] eq 'recurring'}
                                            {if $cloudx_product_prices['pricing_raw']['monthly'] gt 0}
                                                <div class="pricing-min-main monthly w-hidden">
                                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                    <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermmonthly}</span>
                                                </div>
                                            {/if}
                                            {if $cloudx_product_prices['pricing_raw']['quarterly'] gt 0}
                                                <div class="pricing-min-main quarterly w-hidden">
                                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                    <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['quarterly']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermquarterly}</span>
                                                </div>
                                            {/if}
                                            {if $cloudx_product_prices['pricing_raw']['semiannually'] gt 0}
                                                <div class="pricing-min-main semiannually w-hidden">
                                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                    <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['semiannually']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermsemiannually}</span>
                                                </div>
                                            {/if}
                                            {if $cloudx_product_prices['pricing_raw']['annually'] gt 0}
                                                <div class="pricing-min-main annually w-hidden">
                                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                    <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['annually']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermannually}</span>
                                                </div>
                                            {/if}
                                            {if $cloudx_product_prices['pricing_raw']['biennially'] gt 0}
                                                <div class="pricing-min-main biennially w-hidden">
                                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                    <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['biennially']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermbiennially}</span>
                                                </div>
                                            {/if}
                                            {if $cloudx_product_prices['pricing_raw']['triennially'] gt 0}
                                                <div class="pricing-min-main triennially w-hidden">
                                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-1">{$LANG.startingfrom}</span>{/if}
                                                    <span class="product-min-price product-price-ly-1">{$cloudx_product_prices['pricing_formated']['triennially']}</span><span class="product-bill-cycle bill-cycle-ly-1">/{$LANG.orderpaymenttermtriennially}</span>
                                                </div>
                                            {/if}
                                        {/if}
                                    </div>  
                                </div>
                                <div class="plan-include">
                                    {$cloudx_product_prices['description']}
                                    <div class="product_url_section">
                                        <a href="{$cloudx_product_prices['product_url']}" class="btn-main">{$LANG.cloudxcloudxregister_now}</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
            <script>
                jQuery(document).ready(function(){
                    if(jQuery("#changeCyclePlanSections").length > 0){
                       jQuery("#changeCyclePlanSections").find("li").eq(0).trigger('click');
                    }
                });
            </script>  
        {/if}
    {else}
        <div class="titlebar">
            <h2>{$cloudx_product_data['status']}</h2>
        </div>
    {/if}
   </div>
</section>
{/if}