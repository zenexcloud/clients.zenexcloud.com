<link rel="stylesheet" type="text/css" href="{assetPath file='all.min.css'}?v={$versionHash}" />
{assetExists file="custom.css"}
    <link rel="stylesheet" type="text/css" href="{$__assetPath__}?v={$versionHash}" />
{/assetExists}
{assetExists file="cloudx_cart.css"}
    <link rel="stylesheet" type="text/css" href="{$__assetPath__}" />
{/assetExists}
{assetExists file="cloudx_cart_responsive.css"}
    <link rel="stylesheet" type="text/css" href="{$__assetPath__}" />
{/assetExists}
{if $LANG.locale == "ar_AR" || $LANG.locale == "fa_IR" || $LANG.locale == "he_IL"}
    {assetExists file="rtl_cloudx_cart.css"}
        <link href="{$__assetPath__}" rel="stylesheet" type="text/css">
    {/assetExists}
    {assetExists file="rtl_cloudx_cart_responsive.css"}
        <link href="{$__assetPath__}" rel="stylesheet" type="text/css">
    {/assetExists}
{/if}
<script type="text/javascript" src="{assetPath file='scripts.min.js'}?v={$versionHash}"></script>
<script type="text/javascript" src="{assetPath file='cloudx_cart.js'}"></script>