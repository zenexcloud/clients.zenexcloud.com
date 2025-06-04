<?php
/* Smarty version 3.1.48, created on 2025-05-31 05:20:12
  from '/home/zenexcloud/public_html/templates/cloudx/custom_file/cpanel-hosting.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a918c5f4f79_22958940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ceae87e7998af2e5cac46d6c29df8f3c059db6a' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/custom_file/cpanel-hosting.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a918c5f4f79_22958940 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="about-wrp bg-purple-dark">
    <div class="container">
       <div class="row">
          <div class="col-md-6 col-sm-12">
             <div class="abt-bx host-raitbx">
                <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cpanelHosting'];?>
</h1>
                <h6><?php echo $_smarty_tpl->tpl_vars['LANG']->value['sharedDedicatedPackages_hosting'];?>
</h6>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['whetherStartup_hosting'];?>
</p>
                <div class="btn-group">
                   <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderNow_hosting'];?>
</a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-sm-12">
             <div class="web-img">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/Cpanel_hosting.svg" alt="">
             </div>
          </div>
       </div>
    </div>
 </section>
 <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/custom_file/common_price_file/plan-section-layout-with-billcycle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
 <section class="hosting-features-wrp bg-purple">
    <div class="container">
       <div class="titlebar">
          <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ourHostingFeature_hosting'];?>
</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ourHostingFeatureDes_hosting'];?>
</p>
       </div>
       <div class="row">
          <div class="col-md-4 col-sm-6">
             <div class="hosting-block">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/host-ic1.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeDomainName_hosting'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeDomainNameDes_hosting'];?>
</p>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="hosting-block">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/host-ic2.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freePersonalisedEmail_hosting'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freePersonalisedEmailDes_hosting'];?>
</p>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="hosting-block">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/host-ic3.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeEncryptSSL_hosting'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeEncryptSSLDes_hosting'];?>
</p>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="hosting-block">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/host-ic4.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeWeeklyBackup_hosting'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeWeeklyBackupDes_hosting'];?>
</p>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="hosting-block">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/host-ic5.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeSiteMigration_hosting'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeSiteMigrationDes_hosting'];?>
</p>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="hosting-block">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/host-ic6.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['oneClickWordPressHosting_hosting'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['oneClickWordPressHostingDes_hosting'];?>
</p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="why-choose-wrp">
    <div class="container">
       <div class="titlebar">
          <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['whyChooseUs_hosting'];?>
</h2>
          <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['whyChooseUsDes_hosting'];?>
</p>
       </div>
       <div class="serv-maintabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
             <li class="nav-item" role="presentation">
                <button class="nav-link active" id="whytb1-tab" data-bs-toggle="tab" data-bs-target="#whytb1" type="button" role="tab" aria-controls="home" aria-selected="true"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['infrastructureTechnology_hosting'];?>
</button>
             </li>
             <li class="nav-item" role="presentation">
                <button class="nav-link" id="whytb2-tab" data-bs-toggle="tab" data-bs-target="#whytb2" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeOneClickInstalls_hosting'];?>
</button>
             </li>
             <li class="nav-item" role="presentation">
                <button class="nav-link" id="whytb3-tab" data-bs-toggle="tab" data-bs-target="#whytb3" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['sslCertificate_hosting'];?>
</button>
             </li>
             <li class="nav-item" role="presentation">
                <button class="nav-link" id="whytb4-tab" data-bs-toggle="tab" data-bs-target="#whytb4" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['support_hosting'];?>
</button>
             </li>
          </ul>
       </div>
       <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="whytb1" role="tabpanel" aria-labelledby="whytb1-tab">
             <div class="why-row">
                <div class="row">
                   <div class="col-md-6 col-sm-12">
                      <div class="why-cloud-bx">
                         <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_ultraFastCloudInfrastructure'];?>
</h3>
                         <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_benefitsCloudSimplicitySharedHosting'];?>
</p>
                         <ul>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_intelXeonProcessors'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_postgresSQL'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_GBRAM'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_antiSpamVirusProtection'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_24x7Support'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_secureFTPAccess'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_protectedOSDrive'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_hotlinkLeechProtection'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_apache'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_phpMyAdminAccess'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_PHPPerlPython'];?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_onlineeMailAddressBook'];?>
/li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_freeDNSManagement'];?>
/</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxhosting_mySQL'];?>
/</li>
                         </ul>
                      </div>
                   </div>
                   <div class="col-md-6 col-sm-12">
                      <div class="why-ul">
                         <ul>
                            <li>
                               <div class="whyimg">
                                  <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/us-ic1.svg" alt="">
                               </div>
                               <div class="why-indt">
                                  <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['reliablePower_hosting'];?>
</h4>
                                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['reliablePowerDes_hosting'];?>
</p>
                               </div>
                            </li>
                            <li>
                               <div class="whyimg">
                                  <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/us-ic2.svg" alt="">
                               </div>
                               <div class="why-indt">
                                  <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['hvacProtection_hosting'];?>
</h4>
                                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['hvacProtectionDes_hosting'];?>
</p>
                               </div>
                            </li>
                            <li>
                               <div class="whyimg">
                                  <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/us-ic3.svg" alt="">
                               </div>
                               <div class="why-indt">
                                  <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['networkSecurity_hosting'];?>
</h4>
                                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['networkSecurityDes_hosting'];?>
</p>
                               </div>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="whytb2" role="tabpanel" aria-labelledby="whytb2-tab">
             <div class="why-row">
                <div class="row">
                   <div class="col-md-6 col-sm-12">
                      <div class="why-cloud-bx free-install">
                         <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['installPopularApplications_hosting'];?>
</h3>
                         <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['installPopularApplicationsDes_hosting'];?>
</p>
                         <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ourOneClickApps_hosting'];?>
</a>
                      </div>
                   </div>
                   <div class="col-md-6 col-sm-12">
                      <div class="freeimg">
                         <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/free-img.svg" alt="">
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="whytb3" role="tabpanel" aria-labelledby="whytb3-tab">
             <div class="why-row">
                <div class="row">
                   <div class="col-md-6 col-sm-12">
                      <div class="why-cloud-bx free-install">
                         <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeSSLCertificate_hosting'];?>
</h3>
                         <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['freeSSLCertificateDes_hosting'];?>
</p>
                         <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxlearnMore_hosting'];?>
</a>
                      </div>
                   </div>
                   <div class="col-md-6 col-sm-12">
                      <div class="freeimg">
                         <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/your-site.svg" alt="">
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="whytb4" role="tabpanel" aria-labelledby="whytb4-tab">
             <div class="why-row">
                <div class="titlebar">
                   <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportWeKnow_hosting'];?>
</h2>
                   <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportWeKnowDes_hosting'];?>
</p>
                </div>
                <div class="row">
                   <div class="col-md-4 col-sm-12">
                      <div class="cnt-infbx">
                         <div class="cnt-lf-dt">
                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['phoneNumber_hosting'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['phoneNumberDes_hosting'];?>
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
                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['email_hosting'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['emailDes_hosting'];?>
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
                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addressOffice_hosting'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addressOfficeDes_hosting'];?>
</p>
                         </div>
                         <div class="cnt-icbx">
                            <i class="fas fa-location-arrow"></i>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <div class="get-start-bx cpanel-bn">
   <div class="container">
      <div class="start-block-below">
            <div class="get-infobx">
               <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bestManagedCloud_hosting'];?>
</h2>
            </div>
            <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['getSartedNow_hosting'];?>
</a>
      </div>
   </div>
</div><?php }
}
