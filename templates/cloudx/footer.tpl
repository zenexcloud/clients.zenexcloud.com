                    </div>

                    </div>
                    {if !$inShoppingCart && $secondarySidebar->hasChildren()}
                        <div class="d-md-none col-md-3 sidebar sidebar-secondary">
                            {include file="$template/includes/sidebar.tpl" sidebar=$secondarySidebar}
                        </div>
                    {/if}
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="foot-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="foot-lg">
							<div class="footer-logo-sec">
								{if !empty($cloudx_theme_settings.footer_logo)}
									<img src="{$cloudx_theme_settings.footer_logo}" alt="{$companyname}" {if $cloudx_theme_settings.footer_logo_height neq ''}height="{$cloudx_theme_settings.footer_logo_height}"{/if} {if $cloudx_theme_settings.footer_logo_width neq ''}width="{$cloudx_theme_settings.footer_logo_width}" {/if}>
								{else}
									<img src="{$WEB_ROOT}/templates/{$template}/images/Cloudxlogo.svg" alt="{$companyname}" {if $cloudx_theme_settings.footer_logo_height neq ''}height="{$cloudx_theme_settings.footer_logo_height}"{/if} {if $cloudx_theme_settings.footer_logo_width neq ''}width="{$cloudx_theme_settings.footer_logo_width}" {/if}>
								{/if}
							</div>
                            <div class="social-bx">                               
                                {include file="$template/includes/social-accounts.tpl"}                                     
                            </div>
                        </div>
                    </div>
                    {if $cloudx_theme_settings.disable_footer_phone_number neq 'on' || $cloudx_theme_settings.disable_footer_email neq 'on'}
                        <div class="offset-md-1 col-md-6 col-sm-12">
                            <div class="customers-bx">
                                <h4>{$LANG.cloudxfootercustomersupport}</h4>
                                <div class="foot-cnt">
                                    <ul>
                                        {if $cloudx_theme_settings.disable_footer_phone_number neq 'on'}
                                            <li>
                                                <div class="ft-cntbx">
                                                    <img src="{$WEB_ROOT}/templates/{$template}/images/cnt-ic1.svg" alt="">
                                                    <h4><span>{$LANG.cloudxfooter24support}</span> {if $cloudx_theme_settings.phone neq ''}+{$cloudx_theme_settings.country_code} {$cloudx_theme_settings.phone}{else}{$LANG.cloudxfooterphonenumber}{/if}</h4>
                                                </div>
                                            </li>
                                        {/if}
                                        {if $cloudx_theme_settings.disable_footer_email neq 'on'}
                                            <li>
                                                <div class="ft-cntbx">
                                                    <img src="{$WEB_ROOT}/templates/{$template}/images/cnt-ic2.svg" alt="">
                                                    <h4><span>{$LANG.cloudxfooteremailus}</span> {if $cloudx_theme_settings.email_address neq ''}{$cloudx_theme_settings.email_address}{else}{$cloudx_email_company}{/if}</h4>
                                                </div>
                                            </li>
                                        {/if}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    {/if}
                </div>

            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5" id="one">
                        <p>{lang key="copyrightFooterNotice" year=$date_year company=$companyname}</p>
                    </div>
                    <div class="col-md-7 col-sm-7" id="two">
                        <div class="copyright-nav">
                            <ul>
                                <li><a href="{$WEB_ROOT}/privacy-notice.php">{$LANG.cloudxfooterprivacypolicy}</a></li>
                                <li><a href="{$WEB_ROOT}/tos.php">{$LANG.cloudxfootertos}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button id="myBtn" title="Go to top"><i class="fal fa-angle-up" aria-hidden="true"></i></button>
    <script>
        var rtlCloudxSlider = false;
      </script>
      {if $LANG.locale == 'ar_AR' || $LANG.locale == 'fa_IR' || $LANG.locale == 'he_IL'}
        <script>
            var rtlCloudxSlider = true;
        </script>
      {/if}
      <script src="{assetPath file='slick.min.js'}"></script>
      <script src="{assetPath file='cloudx.js'}"></script>
      {assetExists file="cloudx_overrides.js"}
        <script src="{assetPath file='cloudx_overrides.js'}"></script>
      {/assetExists}
    <div id="fullpage-overlay" class="w-hidden">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <img src="{$WEB_ROOT}/assets/img/overlay-spinner.svg" alt="">
                <br>
                <span class="msg"></span>
            </div>
        </div>
    </div>
    <div class="modal system-modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">{lang key='close'}</span>
                    </button>
                </div>
                <div class="modal-body">
                    {lang key='loading'}
                </div>
                <div class="modal-footer">
                    <div class="float-left loader">
                        <i class="fas fa-circle-notch fa-spin"></i>
                        {lang key='loading'}
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {lang key='close'}
                    </button>
                    <button type="button" class="btn btn-primary modal-submit">
                        {lang key='submit'}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <form method="get" action="{$currentpagelinkback}">
        <div class="modal modal-localisation" id="modalChooseLanguage" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        {if $languagechangeenabled && count($locales) > 1}
                            <h5 class="h5 pt-5 pb-3">{lang key='chooselanguage'}</h5>
                            <div class="row item-selector">
                            <input type="hidden" name="language" value="{$language}" />
                                {foreach $locales as $locale}
                                    <div class="col-4">
                                        <a href="#" class="item{if $language == $locale.language} active{/if}" data-value="{$locale.language}">
                                            {$locale.localisedName}
                                        </a>
                                    </div>
                                {/foreach}
                            </div>
                        {/if}
                        {if !$loggedin && $currencies}
                            <p class="h5 pt-5 pb-3">{lang key='choosecurrency'}</p>
                            <div class="row item-selector">
                                <input type="hidden" name="currency" value="">
                                {foreach $currencies as $selectCurrency}
                                    <div class="col-4">
                                        <a href="#" class="item{if $activeCurrency.id == $selectCurrency.id} active{/if}" data-value="{$selectCurrency.id}">
                                            {$selectCurrency.prefix} {$selectCurrency.code}
                                        </a>
                                    </div>
                                {/foreach}
                            </div>
                        {/if}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">{lang key='apply'}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {if !$loggedin && $adminLoggedIn}
        <a href="{$WEB_ROOT}/logout.php?returntoadmin=1" class="btn btn-return-to-admin" data-toggle="tooltip" data-placement="bottom" title="{if $adminMasqueradingAsClient}{lang key='adminmasqueradingasclient'} {lang key='logoutandreturntoadminarea'}{else}{lang key='adminloggedin'} {lang key='returntoadminarea'}{/if}">
            <i class="fas fa-redo-alt"></i>
            <span class="d-none d-md-inline-block">{lang key="admin.returnToAdmin"}</span>
        </a>
    {/if}
    {include file="$template/includes/generate-password.tpl"}
    {$footeroutput}
</body>
</html>
