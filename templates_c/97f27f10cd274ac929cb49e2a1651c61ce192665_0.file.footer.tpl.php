<?php
/* Smarty version 3.1.48, created on 2025-06-04 10:13:31
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_68401c4b101d92_55232695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97f27f10cd274ac929cb49e2a1651c61ce192665' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/footer.tpl',
      1 => 1749023655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68401c4b101d92_55232695 (Smarty_Internal_Template $_smarty_tpl) {
?>                    </div>

                    </div>
                    <?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value && $_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren()) {?>
                        <div class="d-md-none col-md-3 sidebar sidebar-secondary">
                            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sidebar'=>$_smarty_tpl->tpl_vars['secondarySidebar']->value), 0, true);
?>
                        </div>
                    <?php }?>
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
								<?php if (!empty($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo'])) {?>
									<img src="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_height'] != '') {?>height="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_height'];?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_width'] != '') {?>width="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_width'];?>
" <?php }?>>
								<?php } else { ?>
									<img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/Cloudxlogo.svg" alt="<?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_height'] != '') {?>height="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_height'];?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_width'] != '') {?>width="<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['footer_logo_width'];?>
" <?php }?>>
								<?php }?>
							</div>
                            <div class="social-bx">                               
                                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/social-accounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>                                     
                            </div>
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['disable_footer_phone_number'] != 'on' || $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['disable_footer_email'] != 'on') {?>
                        <div class="offset-md-1 col-md-6 col-sm-12">
                            <div class="customers-bx">
                                <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxfootercustomersupport'];?>
</h4>
                                <div class="foot-cnt">
                                    <ul>
                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['disable_footer_phone_number'] != 'on') {?>
                                            <li>
                                                <div class="ft-cntbx">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/cnt-ic1.svg" alt="">
                                                    <h4><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxfooter24support'];?>
</span> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['phone'] != '') {?>+<?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['country_code'];?>
 <?php echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['phone'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxfooterphonenumber'];
}?></h4>
                                                </div>
                                            </li>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['disable_footer_email'] != 'on') {?>
                                            <li>
                                                <div class="ft-cntbx">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/cnt-ic2.svg" alt="">
                                                    <h4><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxfooteremailus'];?>
</span> <?php if ($_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['email_address'] != '') {
echo $_smarty_tpl->tpl_vars['cloudx_theme_settings']->value['email_address'];
} else {
echo $_smarty_tpl->tpl_vars['cloudx_email_company']->value;
}?></h4>
                                                </div>
                                            </li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>

            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5" id="one">
                        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"copyrightFooterNotice",'year'=>$_smarty_tpl->tpl_vars['date_year']->value,'company'=>$_smarty_tpl->tpl_vars['companyname']->value),$_smarty_tpl ) );?>
</p>
                    </div>
                    <div class="col-md-7 col-sm-7" id="two">
                        <div class="copyright-nav">
                            <ul>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/privacy-notice.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxfooterprivacypolicy'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/tos.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxfootertos'];?>
</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button id="myBtn" title="Go to top"><i class="fal fa-angle-up" aria-hidden="true"></i></button>
    <?php echo '<script'; ?>
>
        var rtlCloudxSlider = false;
      <?php echo '</script'; ?>
>
      <?php if ($_smarty_tpl->tpl_vars['LANG']->value['locale'] == 'ar_AR' || $_smarty_tpl->tpl_vars['LANG']->value['locale'] == 'fa_IR' || $_smarty_tpl->tpl_vars['LANG']->value['locale'] == 'he_IL') {?>
        <?php echo '<script'; ?>
>
            var rtlCloudxSlider = true;
        <?php echo '</script'; ?>
>
      <?php }?>
      <?php echo '<script'; ?>
 src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'slick.min.js'),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'cloudx.js'),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>
      <?php $_block_plugin6 = isset($_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['assetExists'][0][0] : null;
if (!is_callable(array($_block_plugin6, 'assetExists'))) {
throw new SmartyException('block tag \'assetExists\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('assetExists', array('file'=>"cloudx_overrides.js"));
$_block_repeat=true;
echo $_block_plugin6::assetExists(array('file'=>"cloudx_overrides.js"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
        <?php echo '<script'; ?>
 src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['assetPath'][0], array( array('file'=>'cloudx_overrides.js'),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>
      <?php $_block_repeat=false;
echo $_block_plugin6::assetExists(array('file'=>"cloudx_overrides.js"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
    <div id="fullpage-overlay" class="w-hidden">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/overlay-spinner.svg" alt="">
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
                        <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'close'),$_smarty_tpl ) );?>
</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'loading'),$_smarty_tpl ) );?>

                </div>
                <div class="modal-footer">
                    <div class="float-left loader">
                        <i class="fas fa-circle-notch fa-spin"></i>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'loading'),$_smarty_tpl ) );?>

                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'close'),$_smarty_tpl ) );?>

                    </button>
                    <button type="button" class="btn btn-primary modal-submit">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'submit'),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
        </div>
    </div>

    <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['currentpagelinkback']->value;?>
">
        <div class="modal modal-localisation" id="modalChooseLanguage" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <?php if ($_smarty_tpl->tpl_vars['languagechangeenabled']->value && count($_smarty_tpl->tpl_vars['locales']->value) > 1) {?>
                            <h5 class="h5 pt-5 pb-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'chooselanguage'),$_smarty_tpl ) );?>
</h5>
                            <div class="row item-selector">
                            <input type="hidden" name="language" value="<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" />
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['locales']->value, 'locale');
$_smarty_tpl->tpl_vars['locale']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['locale']->value) {
$_smarty_tpl->tpl_vars['locale']->do_else = false;
?>
                                    <div class="col-4">
                                        <a href="#" class="item<?php if ($_smarty_tpl->tpl_vars['language']->value == $_smarty_tpl->tpl_vars['locale']->value['language']) {?> active<?php }?>" data-value="<?php echo $_smarty_tpl->tpl_vars['locale']->value['language'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['locale']->value['localisedName'];?>

                                        </a>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php }?>
                        <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['currencies']->value) {?>
                            <p class="h5 pt-5 pb-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'choosecurrency'),$_smarty_tpl ) );?>
</p>
                            <div class="row item-selector">
                                <input type="hidden" name="currency" value="">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'selectCurrency');
$_smarty_tpl->tpl_vars['selectCurrency']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['selectCurrency']->value) {
$_smarty_tpl->tpl_vars['selectCurrency']->do_else = false;
?>
                                    <div class="col-4">
                                        <a href="#" class="item<?php if ($_smarty_tpl->tpl_vars['activeCurrency']->value['id'] == $_smarty_tpl->tpl_vars['selectCurrency']->value['id']) {?> active<?php }?>" data-value="<?php echo $_smarty_tpl->tpl_vars['selectCurrency']->value['id'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['selectCurrency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['selectCurrency']->value['code'];?>

                                        </a>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'apply'),$_smarty_tpl ) );?>
</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['adminLoggedIn']->value) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/logout.php?returntoadmin=1" class="btn btn-return-to-admin" data-toggle="tooltip" data-placement="bottom" title="<?php if ($_smarty_tpl->tpl_vars['adminMasqueradingAsClient']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'adminmasqueradingasclient'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'logoutandreturntoadminarea'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'adminloggedin'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'returntoadminarea'),$_smarty_tpl ) );
}?>">
            <i class="fas fa-redo-alt"></i>
            <span class="d-none d-md-inline-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"admin.returnToAdmin"),$_smarty_tpl ) );?>
</span>
        </a>
    <?php }?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/generate-password.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php echo $_smarty_tpl->tpl_vars['footeroutput']->value;?>

</body>
</html>
<?php }
}
