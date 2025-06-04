{if $cloudx_product_data}
   <section class="dedicated-server-wrp dedicated-layout-2">
      <div class="container">
         {if $cloudx_product_data['status'] eq 'success'}
            {if $cloudx_product_data['result_count'] gt 0}
               <div class="titlebar">
                  <h2>{$LANG.cloudx_dedicated2_head}</h2>
                  <p>{$LANG.cloudx_dedicated2_subhead}</p>
               </div>
               <div class="row">
                  {foreach from=$cloudx_product_data['products_array'] item=cloudx_product_prices}
                     <div class="dedicated-2-main">
                        <span class="plan-name-dedicated">{$cloudx_product_prices['name']}</span>
                        <div class="dedicated-inner-sec">
                           <div class="left-dedicated-sec">
                              <p>
                                 {$LANG.cloudx_cpu_dedicated2} {if $cloudx_product_prices['dedicated_page_data']['cpu_name'] neq '0'}{$cloudx_product_prices['dedicated_page_data']['cpu_name']}{else}{$LANG.cloudx_not_available}{/if}/{if $cloudx_product_prices['dedicated_page_data']['cpu_power'] neq '0'}{$cloudx_product_prices['dedicated_page_data']['cpu_power']}{else}{$LANG.cloudx_not_available}{/if}
                              </p>
                              <p>
                                 {$LANG.cloudx_ram_dedicated2} {if $cloudx_product_prices['dedicated_page_data']['ram_data'] neq '0'}{$cloudx_product_prices['dedicated_page_data']['ram_data']}{else}{$LANG.cloudx_not_available}{/if}
                              </p>
                              <p>
                                 {$LANG.cloudx_disks_dedicated2} {if $cloudx_product_prices['dedicated_page_data']['storage_data'] neq '0'}{$cloudx_product_prices['dedicated_page_data']['storage_data']}{else}{$LANG.cloudx_not_available}{/if}
                              </p>
                              <p>
                                 {$LANG.cloudx_bandwidth_dedicated2} {if $cloudx_product_prices['dedicated_page_data']['bandwidth_data'] neq '0'}{$cloudx_product_prices['dedicated_page_data']['bandwidth_data']}{else}{$LANG.cloudx_not_available}{/if}
                              </p>
                              <p>
                                 {$LANG.cloudx_ip_add_dedicated2} {if $cloudx_product_prices['dedicated_page_data']['ip_address'] neq '0'}{$cloudx_product_prices['dedicated_page_data']['ip_address']}{else}{$LANG.cloudx_not_available}{/if}
                              </p>
                                 {if $cloudx_product_prices['dedicated_page_data']['server_location'] neq '0'}
                                    <div class="server-location-flag dedicated-2-loc">
                                       <p class="s-l">{$LANG.cloudx_sl_dedicated2}
                                       {foreach from=$cloudx_product_prices['dedicated_page_data']['server_location'] item=locationData}
                                          <img src="{$WEB_ROOT}/templates/{$template}/css/flags/blank.gif" class="flag flag-{$locationData}"/>
                                       {/foreach}
                                       </p>
                                    </div>
                                 {else}
                                    <p class="s-l">
                                       {$LANG.cloudx_sl_dedicated2} {$LANG.cloudx_not_available}
                                    </p>
                                 {/if}
                           </div>
                           <div class="right-dedicated-sec">
                              {if $cloudx_product_prices['paytype'] eq 'onetime'}
                                 <div class="pricing-dedi-main ontime">
                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                    <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermonetime}</span>
                                 </div>
                              {/if}
                              {if $cloudx_product_prices['paytype'] eq 'free'}
                                 <div class="pricing-dedi-main freeaccount">
                                    {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                    <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermfreeaccount}</span>
                                 </div>
                              {/if}
                              {if $cloudx_product_prices['paytype'] eq 'recurring'}
                                 {if $cloudx_product_prices['pricing_raw']['monthly'] gt 0}
                                    <div class="pricing-dedi-main monthly">
                                       {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                       <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['monthly']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermmonthly}</span>
                                    </div>
                                 {elseif $cloudx_product_prices['pricing_raw']['quarterly'] gt 0}
                                    <div class="pricing-dedi-main quarterly">
                                       {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                       <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['quarterly']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermquarterly}</span>
                                    </div>
                                 {elseif $cloudx_product_prices['pricing_raw']['semiannually'] gt 0}
                                    <div class="pricing-dedi-main semiannually">
                                       {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                       <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['semiannually']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermsemiannually}</span>
                                    </div>
                                 {elseif $cloudx_product_prices['pricing_raw']['annually'] gt 0}
                                    <div class="pricing-dedi-main annually">
                                       {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                       <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['annually']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermannually}</span>
                                    </div>
                                 {elseif $cloudx_product_prices['pricing_raw']['biennially'] gt 0}
                                    <div class="pricing-dedi-main biennially">
                                       {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                       <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['biennially']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermbiennially}</span>
                                    </div>
                                 {elseif $cloudx_product_prices['pricing_raw']['triennially'] gt 0}
                                    <div class="pricing-dedi-main triennially">
                                       {if $cloudx_product_prices['has_config_option'] gt 0}<span class="start-from-dedicated">{$LANG.startingfrom}</span>{/if}
                                       <span class="product-min-price-dedi">{$cloudx_product_prices['pricing_formated']['triennially']}</span><span class="product-bill-cycle-dedi">/{$LANG.orderpaymenttermtriennially}</span>
                                    </div>
                                 {/if}
                              {/if}
                              <div class="dedi-2-buy">
                                 <a href="{$cloudx_product_prices['product_url']}" class="dedicated-btn-buy">{$LANG.cloudx_buy_now_button}</a>  
                              </div>                                        
                           </div>
                        </div>
                     </div>
                  {/foreach}
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