<?php
/* Smarty version 3.1.48, created on 2025-05-31 07:16:48
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/enterprise-server.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683aace08d27b8_54830462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34e32bb8a1639c64bc53c4e4882d81795dd2a491' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/enterprise-server.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683aace08d27b8_54830462 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Hosting -->
<section class="about-wrp bg-purple-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12" id="one">
                <div class="abt-bx host-raitbx">
                    <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_enterpriseSerers'];?>
</h1>
                    <h6><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_highComputingPower'];?>
</h6>
                    <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_highPerformanceProfessionalServers'];?>
</p>

                    <div class="btn-group">
                        <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_getStartedNow'];?>
</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12" id="two">
                <div class="web-img">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/enter-price-img.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hosting -->

<!-- Dedicated Servers -->
<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/custom_file/common_price_file/plan-section-layout-dedicated.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<!-- End Dedicated Servers -->

<!-- Server Features -->
<section class="server-features-wrp">
    <div class="container">
        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_includeFeatures'];?>
</h2>

        <div class="server-features-slider">
            <div class="server-feat-box">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic1.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_ddosProtection'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_ddosProtectionDes'];?>
</p>
            </div>
            <div class="server-feat-box">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic2.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_RPN'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_RPNDes'];?>
</p>
            </div>
            <div class="server-feat-box">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic3.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_hypervVMware'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_hypervVMwareDes'];?>
</p>
            </div>
            <div class="server-feat-box">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic1.svg" alt="">
                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_DDosProtection'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_DDosProtectionDes'];?>
</p>
            </div>
        </div>
    </div>
</section>
<!-- End Server Features -->

<!-- Services -->
<section class="why-choose-wrp">
    <div class="container">
        <div class="titlebar">
            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_ourServices'];?>
</h2>
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_ourServicesDes'];?>
</p>
        </div>

        <div class="serv-maintabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="whytb1-tab" data-bs-toggle="tab" data-bs-target="#whytb1"
                        type="button" role="tab" aria-controls="home"
                        aria-selected="true"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_managmentMonitroing'];?>
</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="whytb2-tab" data-bs-toggle="tab" data-bs-target="#whytb2" type="button"
                        role="tab" aria-controls="profile"
                        aria-selected="false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_DDosProtection'];?>
</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="whytb3-tab" data-bs-toggle="tab" data-bs-target="#whytb3" type="button"
                        role="tab" aria-controls="profile"
                        aria-selected="false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_licenceSoftware'];?>
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
                                <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_ultraFastCloudHosting'];?>
</h3>
                                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_benefitsCloudSimplicitySharedHosting'];?>
</p>

                                <ul>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_dualXeonProcessors'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_mySQL'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_GBRAM'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_rubyOnRails'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_24x7Support'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_antiSpamVirusProtection'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_250GBRaidOSDrive'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_secureFTPAccess'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_1TBCachedCustomerDrive'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_hotlinkLeechProtection'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_apache2']['2x'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_phpMyAdminAccess'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_PHPPerlPython'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_onlineeMailAddressBook'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_freeDNSManagement'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_nowWithVarnishCaching'];?>
</li>
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
/images/us-ic1.svg"
                                                alt="">
                                        </div>
                                        <div class="why-indt">
                                            <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_reliablePower'];?>
</h4>
                                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_reliablePowerDes'];?>
</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="whyimg">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/us-ic2.svg"
                                                alt="">
                                        </div>
                                        <div class="why-indt">
                                            <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_HvacProtection'];?>
</h4>
                                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_HvacProtectionDes'];?>
</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="whyimg">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/us-ic3.svg"
                                                alt="">
                                        </div>
                                        <div class="why-indt">
                                            <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_networkSecurity'];?>
</h4>
                                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_networkSecurityDes'];?>
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
                            <div class="freeimg">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/dose-img.svg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="why-cloud-bx free-install">
                                <h3><span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_antiDDosProtection'];?>
</span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_infrastructuresProtected'];?>

                                </h3>
                                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_ourDedicatedServersCome'];?>
</p>

                                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_keepYourDedicatedInfrastructuresProtected'];?>
</p>

                                <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_getItOut'];?>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="whytb3" role="tabpanel" aria-labelledby="whytb3-tab">
                <div class="available-os-block">
                    <div class="titlebar">
                        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_availableOperatingSystem'];?>
</h2>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_availableOperatingSystemDes'];?>
</p>
                    </div>

                    <div class="available-os-tbles table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_centos'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_ubuntu'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_cloudlinux'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_fedora'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_debian'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_cPanel'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_plesk'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_windows'];?>
</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Pricing</strong></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_free'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_free'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_free'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_free'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_free'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_free'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_free'];?>
</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_web_pro'];?>
</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_web_pro_d10'];?>
</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_web_pro_d2'];?>
</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services -->

<!-- Why Us -->
<section class="why-choose-wrp why-us-server">
    <div class="container">
        <div class="titlebar">
            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_whyChooseUs'];?>
</h2>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/serv-why-ic1.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_solutions'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_solutionsDes'];?>
</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/serv-why-ic2.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_speed'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_speedDes'];?>
</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/serv-why-ic3.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_support'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_supportDes'];?>
</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/serv-why-ic4.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_uptimeGuarantee'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_uptimeGuaranteeDes'];?>
</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Us -->

<!-- FAQ -->
<section class="faq-wrapper">
    <div class="container">
        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_frequentlyAskedQuestions'];?>
</h2>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_whatSSLCertificate'];?>
</button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_whatSSLCertificateDes'];?>
</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_whatBenefitSSL'];?>
</button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_whatBenefitSSLDes'];?>
</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingthree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsethree" aria-expanded="false"
                        aria-controls="collapsethree"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_doesSSLWebBrowsers'];?>
</button>
                </h3>
                <div id="collapsethree" class="accordion-collapse collapse" aria-labelledby="headingthree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_doesSSLWebBrowsersDes'];?>
</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingfour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsefour" aria-expanded="false"
                        aria-controls="collapsefour"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_howDoApplySSL'];?>
</button>
                </h3>
                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_howDoApplySSLDes'];?>
</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingfive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsefive" aria-expanded="false"
                        aria-controls="collapsefive"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_certificateSigningRequest'];?>
</button>
                </h3>
                <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_certificateSigningRequestDes'];?>
</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End FAQ -->

<!-- Hosting -->
<section class="about-wrp dedicated-server-slider-sec">
    <div class="container">
        <div class="dedi-serv-slider">
            <div class="dedi-serv-bx">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="web-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/dedicat-img.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="abt-bx host-raitbx">
                            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_dedicatedServers_slide1'];?>
</h2>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_dedicatedServersDes_slide1'];?>
</p>

                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_flexEnterprise'];?>
</h3>

                            <ul>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_intelXeon'];?>

                                    <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_intelXeonSpan'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_1000'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_1000Span'];?>
</span>
                                </li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseram'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriserams'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterprise449kr'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudenterprisemonth'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_2TB'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_2TBSpan'];?>
</span>
                                </li>
                            </ul>

                            <div class="btn-group">
                                <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_getStarted'];?>
</a>
                                <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_learnMore'];?>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dedi-serv-bx">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="web-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/dedicat-img.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="abt-bx host-raitbx">
                            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_dedicatedServers_slide2'];?>
</h2>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_dedicatedServersDes_slide2'];?>
</p>

                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_flexEnterprise_slide2'];?>
</h3>

                            <ul>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_intelXeon_slide2'];?>

                                    <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_intelXeonSpan_slide2'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_1000_slide2'];?>
<span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_1000Span_slide2'];?>
</span>
                                </li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseram'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriserams'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterprise449kr'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudenterprisemonth'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_2TB'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_2TBSpan'];?>
</span>
                                </li>
                            </ul>

                            <div class="btn-group">
                                <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_getStarted'];?>
</a>
                                <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_learnMore'];?>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dedi-serv-bx">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="web-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/dedicat-img.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="abt-bx host-raitbx">
                            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_dedicatedServers_slide2'];?>
</h2>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_dedicatedServersDes_slide2'];?>
</p>

                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_flexEnterprise_slide2'];?>
</h3>

                            <ul>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_intelXeon_slide2'];?>

                                    <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_intelXeonSpan_slide2'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_1000_slide2'];?>
<span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_1000Span_slide2'];?>
</span>
                                </li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseram'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriserams'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterprise449kr'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudenterprisemonth'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_2TB'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_2TBSpan'];?>
</span>
                                </li>
                            </ul>

                            <div class="btn-group">
                                <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_getStarted'];?>
</a>
                                <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_learnMore'];?>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hosting -->
 <div class="get-start-bx bg-purple">
   <div class="container">
      <div class="start-block-below">
            <div class="get-infobx">
               <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_chooseBestManagedCloudHosting'];?>
</h2>
            </div>
            <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxenterpriseSer_getSartedNow'];?>
</a>
      </div>
   </div>
</div><?php }
}
