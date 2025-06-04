{if $cloudx_product_data}
    <section class="hosting-plans-wrp pricing-section-layout-3">
        <div class="container">
            {if $cloudx_product_data['status'] eq 'success'}
                {if $cloudx_product_data['result_count'] gt 0}
                    <div class="titlebar">
                        <h2>{$LANG.cloudxVPS_simpleTransparentPricing}</h2>
                        <p>{$LANG.cloudxVPS_simpleTransparentPricingDes}</p>
                    </div>
                    <div class="plans-row {if $cloudx_product_data['result_count'] lt 4}product_boxes_without_slider{/if}">
                        <div class="row" {if $cloudx_product_data['result_count'] gt 3} id="pricing-section-slider"{/if}>
                            {foreach from=$cloudx_product_data['products_array'] item=cloudx_product_prices}
                                <div class="col-md-4 col-sm-12">
                                    <div class="plan-block {if $cloudx_product_prices['has_popular_label'] gt 0}populer-box{/if}">
                                        {if $cloudx_product_prices['has_popular_label'] gt 0}<label>{$LANG.cloudx_popular_label_layout_3}</label>{/if}
                                        <div class="plan-plat">
                                            <h3>{$cloudx_product_prices['name']}</h3>
                                            <div class="plan-price-section price-sec-ly-3">
                                                {if $cloudx_product_prices['paytype'] eq 'onetime'}
                                                        {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                        <span class="product-min-price product-price-ly-3">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle bill-cycle-ly-3">/{$LANG.orderpaymenttermonetime}</span>
                                                {/if}
                                                {if $cloudx_product_prices['paytype'] eq 'free'}
                                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                    <span class="product-min-price product-price-ly-3">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle bill-cycle-ly-3">/{$LANG.orderpaymenttermfreeaccount}</span>
                                                {/if}
                                                {if $cloudx_product_prices['paytype'] eq 'recurring'}
                                                    {if $cloudx_product_prices['pricing_raw']['monthly'] gt 0}
                                                        {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                        <span class="product-price-ly-3">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="bill-cycle-ly-3">/{$LANG.orderpaymenttermmonthly}</span>
                                                    {elseif $cloudx_product_prices['pricing_raw']['quarterly'] gt 0}
                                                        {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                        <span class="product-price-ly-3">{$cloudx_product_prices['pricing_formated']['quarterly']}</span><span class="bill-cycle-ly-3">/{$LANG.orderpaymenttermquarterly}</span>
                                                    {elseif $cloudx_product_prices['pricing_raw']['semiannually'] gt 0}
                                                        {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                        <span class="product-price-ly-3">{$cloudx_product_prices['pricing_formated']['semiannually']}</span><span class="bill-cycle-ly-3">/{$LANG.orderpaymenttermsemiannually}</span>
                                                    {elseif $cloudx_product_prices['pricing_raw']['annually'] gt 0}
                                                        {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                        <span class="product-price-ly-3">{$cloudx_product_prices['pricing_formated']['annually']}</span><span class="bill-cycle-ly-3">/{$LANG.orderpaymenttermannually}</span>
                                                    {elseif $cloudx_product_prices['pricing_raw']['biennially'] gt 0}
                                                        {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                        <span class="product-price-ly-3">{$cloudx_product_prices['pricing_formated']['biennially']}</span><span class="bill-cycle-ly-3">/{$LANG.orderpaymenttermbiennially}</span>
                                                    {elseif $cloudx_product_prices['pricing_raw']['triennially'] gt 0}
                                                        {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-ly-3">{$LANG.startingfrom}</span>{/if}
                                                        <span class="product-price-ly-3">{$cloudx_product_prices['pricing_formated']['triennially']}</span><span class="bill-cycle-ly-3">/{$LANG.orderpaymenttermtriennially}</span>
                                                    {/if}
                                                {/if}
                                            </div>  
                                        </div>
                                        <div class="plan-include">
                                            {$cloudx_product_prices['description']}
                                            <a href="{$cloudx_product_prices['product_url']}" class="btn-main">{$LANG.cloudxcloudxregister_now}</a>                                    
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                {/if}
            {else}
                <div class="titlebar">
                    <h2>{$cloudx_product_data['status']}</h2>
                </div>
            {/if}
        </div>
    </section>
{/if}