<!-- Styling -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
<link href="{assetPath file='all.min.css'}?v={$versionHash}" rel="stylesheet">
<link href="{assetPath file='theme.min.css'}?v={$versionHash}" rel="stylesheet">
<link href="{$WEB_ROOT}/assets/css/fontawesome-all.min.css" rel="stylesheet">
<link href="{$WEB_ROOT}/templates/{$template}/css/flags/flags.css" rel="stylesheet">
{assetExists file="cloudx.css"}
<link href="{$__assetPath__}" rel="stylesheet">
{/assetExists}
{assetExists file="cloudx_responsive.css"}
<link href="{$__assetPath__}" rel="stylesheet">
{/assetExists}
{assetExists file="cloudx_overrides.css"}
  <link href="{$__assetPath__}?v={$smarty.now}" rel="stylesheet">
{/assetExists}
{if $LANG.locale == 'ar_AR' || $LANG.locale == 'fa_IR' || $LANG.locale == 'he_IL'}
  {assetExists file="cloudx_rtl.css"}
    <link href="{$__assetPath__}" rel="stylesheet">
  {/assetExists}
  {assetExists file="cloudx_rtl_responsive.css"}
    <link href="{$__assetPath__}" rel="stylesheet">
  {/assetExists}
{/if}
<script>
    var csrfToken = '{$token}',
        markdownGuide = '{lang|addslashes key="markdown.title"}',
        locale = '{if !empty($mdeLocale)}{$mdeLocale}{else}en{/if}',
        saved = '{lang|addslashes key="markdown.saved"}',
        saving = '{lang|addslashes key="markdown.saving"}',
        whmcsBaseUrl = "{\WHMCS\Utility\Environment\WebHelper::getBaseUrl()}";
        {if $captcha}{$captcha->getPageJs()}{/if}
</script>
<script src="{assetPath file='scripts.min.js'}?v={$versionHash}"></script>
{if $templatefile == "viewticket" && !$loggedin}
  <meta name="robots" content="noindex" />
{/if}
