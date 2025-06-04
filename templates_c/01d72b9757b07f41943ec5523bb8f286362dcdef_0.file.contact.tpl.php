<?php
/* Smarty version 3.1.48, created on 2025-06-04 10:13:35
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_68401c4f366e36_55803183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01d72b9757b07f41943ec5523bb8f286362dcdef' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/contact.tpl',
      1 => 1749023655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68401c4f366e36_55803183 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="contact-wrp">
    <div class="container">
        <?php if ($_smarty_tpl->tpl_vars['sent']->value) {?>
            <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'contactsent'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_prefixVariable1,'textcenter'=>true), 0, true);
?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value), 0, true);
?>
        <?php }?>
        <div class="titlebar">
            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['title_contact'];?>
</h2>
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['titleDes_contact'];?>
</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="cnt-infbx">
                    <div class="cnt-lf-dt">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['phoneNumber_contact'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['phoneNumberDes_contact'];?>
</p>
                    </div>
                    <div class="cnt-icbx">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="cnt-infbx">
                    <div class="cnt-lf-dt">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['email_contact'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['emailDes_contact'];?>
</p>
                    </div>
                    <div class="cnt-icbx">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="cnt-infbx">
                    <div class="cnt-lf-dt">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addressOffice_contact'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addressOfficeDes_contact'];?>
</p>
                    </div>
                    <div class="cnt-icbx">
                        <i class="fas fa-location-arrow"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group">
            <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/submitticket.php" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['salesTicket_contact'];?>
</a>
            <a href="#" class="btn-main live-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['liveChat_contact'];?>
</a>
        </div>
        <div class="cnt-frm-block">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="cnt-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/contact-img.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="cnt-frm">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['submitYourInquiry_contact'];?>
</h3>
                        <?php if (!$_smarty_tpl->tpl_vars['sent']->value) {?>
                            <form method="post" action="contact.php" role="form">
                                <input type="hidden" name="action" value="send" />
                                <div class="form-group">
                                    <input type="text"  name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" id="inputEmail" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsclientname'),$_smarty_tpl ) );?>
" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" name="" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsclientemail'),$_smarty_tpl ) );?>
" class="form-control" id="inputEmail">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsticketsubject'),$_smarty_tpl ) );?>
" id="inputSubject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'contactmessage'),$_smarty_tpl ) );?>
" rows="3" id="inputMessage"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['captcha']->value) {?>
                                    <div class="text-center margin-bottom">
                                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                    </div>
                                <?php }?>
                                <button type="submit" class="btn-main <?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'contactsend'),$_smarty_tpl ) );?>
</button>
                            </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php }
}
