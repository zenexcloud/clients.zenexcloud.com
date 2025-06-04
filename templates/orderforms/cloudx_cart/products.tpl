{include file="orderforms/{$carttpl}/common.tpl"}
<div id="order-standard_cart" class="cloudx_cart_body">
    <div class="row">
        <div class="cart-sidebar sidebar">
            {include file="orderforms/{$carttpl}/sidebar-categories.tpl"}
        </div>
        <div class="cart-body">

            <div class="header-lined">
                <h1 class="font-size-36">
                    {if $productGroup.headline}
                        {$productGroup.headline}
                    {else}
                        {$productGroup.name}
                    {/if}
                </h1>
                {if $productGroup.tagline}
                    <p>{$productGroup.tagline}</p>
                {/if}
            </div>
            {if $errormessage}
                <div class="alert alert-danger">
                    {$errormessage}
                </div>
            {elseif !$productGroup}
                <div class="alert alert-info">
                    {lang key='orderForm.selectCategory'}
                </div>
            {/if}
            {include file="orderforms/{$carttpl}/sidebar-categories-collapsed.tpl"}
            <div class="products" id="products">
                <div class="row row-eq-height">
                    {foreach $products as $key => $product}
                        {$idPrefix = ($product.bid) ? ("bundle"|cat:$product.bid) : ("product"|cat:$product.pid)}
                    <div class="col-md-4">
                        <div class="product clearfix" id="{$idPrefix}">
                            <header>
                                <span id="{$idPrefix}-name">{$product.name}</span>
                                {if $product.stockControlEnabled}
                                    <span class="qty">
                                        {$product.qty} {$LANG.orderavailable}
                                    </span>
                                {/if}
                                <div class="product-pricing" id="{$idPrefix}-price">
                                    {if $product.bid}
                                        {$LANG.bundledeal}<br />
                                        {if $product.displayprice}
                                            <span class="price">{$product.displayprice}</span>
                                        {/if}
                                    {else}
                                        {if $product.pricing.hasconfigoptions}
                                           <span class="starting-from">{$LANG.startingfrom}</span>                           
                                        {/if}
                                        <span class="price">{$product.pricing.minprice.price}</span>
                                        {if $product.pricing.minprice.cycle eq "monthly"}
                                            <small class="billing-cycle-p-list">{$LANG.orderpaymenttermmonthly}</small>
                                        {elseif $product.pricing.minprice.cycle eq "quarterly"}
                                            <small class="billing-cycle-p-list">{$LANG.orderpaymenttermquarterly}</small>
                                        {elseif $product.pricing.minprice.cycle eq "semiannually"}
                                            <small class="billing-cycle-p-list">{$LANG.orderpaymenttermsemiannually}</small>
                                        {elseif $product.pricing.minprice.cycle eq "annually"}
                                            <small class="billing-cycle-p-list">{$LANG.orderpaymenttermannually}</small>
                                        {elseif $product.pricing.minprice.cycle eq "biennially"}
                                            <small class="billing-cycle-p-list">{$LANG.orderpaymenttermbiennially}</small>
                                        {elseif $product.pricing.minprice.cycle eq "triennially"}
                                            <small class="billing-cycle-p-list">{$LANG.orderpaymenttermtriennially}</small>
                                        {/if}
                                        {if $product.pricing.minprice.setupFee}
                                            <small class="p-setup-fee">{$product.pricing.minprice.setupFee->toPrefixed()} {$LANG.ordersetupfee}</small>
                                        {/if}
                                    {/if}
                                </div>
                                <a href="{$product.productUrl}" class="btn btn-success btn-sm btn-order-now" id="{$idPrefix}-order-button"{if $product.hasRecommendations} data-has-recommendations="1"{/if}>
                                    <i class="fas fa-shopping-cart"></i>
                                    {$LANG.ordernowbutton}
                                </a>
                            </header>
                            <div class="product-desc">
                                {if $product.featuresdesc}
                                    <p id="{$idPrefix}-description">
                                        {$product.featuresdesc}
                                    </p>
                                {/if}
                                <ul>
                                    {foreach $product.features as $feature => $value}
                                        <li id="{$idPrefix}-feature{$value@iteration}">
                                            <span class="feature-value">{$value}</span>
                                            {$feature}
                                        </li>
                                    {/foreach}
                                </ul>
                            </div>
                        </div>
                    </div>
                    {if $product@iteration % 3 == 0}
                </div>
                <div class="row row-eq-height">
                    {/if}
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>
{include file="orderforms/{$carttpl}/recommendations-modal.tpl"}