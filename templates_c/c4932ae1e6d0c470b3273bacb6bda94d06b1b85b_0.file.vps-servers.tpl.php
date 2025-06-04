<?php
/* Smarty version 3.1.48, created on 2025-05-31 05:08:12
  from '/home/zenexcloud/public_html/templates/cloudx/custom_file/vps-servers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683a8ebc2be5d3_96742337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4932ae1e6d0c470b3273bacb6bda94d06b1b85b' => 
    array (
      0 => '/home/zenexcloud/public_html/templates/cloudx/custom_file/vps-servers.tpl',
      1 => 1726854010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683a8ebc2be5d3_96742337 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="about-wrp vps-server-banner bg-purple-dark">
        <div class="container">
            <div class="row">                
                <div class="col-md-6 col-sm-12" id="one">
                    <div class="abt-bx host-raitbx">
                        <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_vpsSSD'];?>
</h1>
                        <h6><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_highPerformanceVPS'];?>
</h6>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_highPerformanceServers'];?>
</p>

                        <div class="btn-group">
                            <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_getStartedNow'];?>
</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" id="two">
                    <div class="web-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-ssd-img.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hosting -->

    <!-- Plans -->
    	<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/custom_file/common_price_file/plan-section-layout-with-billcycle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <!-- End Plans -->

    <!-- Support -->
    <section class="support-wrp">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="support-box">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_dedicatedLiveSupport'];?>
</h3>
                        <span><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/sup-ic1.svg" alt=""></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="support-box">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_uptimeGuarantee'];?>
</h3>
                        <span><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/sup-ic2.svg" alt=""></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="support-box">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_daysRiskFree'];?>
</h3>
                        <span><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/sup-ic3.svg" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Support -->

    <section class="vps-host-wrp">
        <div class="container">
             <div class="titlebar">
                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_whyChooseVPSHosting'];?>
</h2>
            </div>

            <div class="why-row step-row">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="why-ul">
                            <ul>
                                <li>
                                    <div class="whyimg">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-ic1.svg" alt="">
                                    </div>
                                    <div class="why-indt">
                                        <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_fullRootAccess'];?>
</h4>
                                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_fullRootAccessDes'];?>
</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="whyimg">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-ic2.svg" alt="">
                                    </div>
                                    <div class="why-indt">
                                        <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_integratedCpanel'];?>
</h4>
                                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_integratedCpanelDes'];?>
</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="whyimg">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-ic3.svg" alt="">
                                    </div>
                                    <div class="why-indt">
                                        <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_nearInstantProvisioning'];?>
</h4>
                                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_nearInstantProvisioningDes'];?>
</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="step-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-host-img.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hosting Features -->
    <section class="hosting-features-wrp vps-host-features bg-purple">
        <div class="container">
            <div class="titlebar">
                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_stillSearchingBestVPSserver'];?>
</h2>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="hosting-block">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic1.svg" alt="">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_fastSimple'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_fastSimpleDes'];?>
</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="hosting-block">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic2.svg" alt="">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_easyControlPanel'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_easyControlPanelDes'];?>
</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="hosting-block">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic3.svg" alt="">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_awardWinningSupport'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_awardWinningSupportDes'];?>
</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="hosting-block">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic4.svg" alt="">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_cuttingEdgeHardware'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_cuttingEdgeHardwareDes'];?>
</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="hosting-block">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic5.svg" alt="">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_privateMancraftServer'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_privateMancraftServerDes'];?>
</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="hosting-block">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic6.svg" alt="">
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_highEndCloudServer'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_highEndCloudServerDes'];?>
</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hosting Features -->

    <!-- Hosting -->
    <section class="about-wrp risk-factor-section">
        <div class="container">
            <div class="row">                
                <div class="col-md-6 col-sm-12" id="one">
                    <div class="abt-bx host-raitbx">
                        <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_riskFreeTrial'];?>
</h2>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_riskFreeTrialDes'];?>
</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" id="two">
                    <div class="web-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/trail-img.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hosting -->

    <!-- Why Us -->
    <section class="why-choose-wrp why-us-server">
        <div class="container">
            <div class="titlebar">
                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_technicalSpecifications'];?>
</h2>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="why-chbx">
                        <div class="serv-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/tech-ic1.svg" alt="">
                        </div>
                        <div class="serv-dt">
                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_guaranteedResources'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_guaranteedResourcesDes'];?>
</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="why-chbx">
                        <div class="serv-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/tech-ic2.svg" alt="">
                        </div>
                        <div class="serv-dt">
                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_secureEnvironment'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_secureEnvironmentDes'];?>
</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="why-chbx">
                        <div class="serv-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/tech-ic3.svg" alt="">
                        </div>
                        <div class="serv-dt">
                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_cuttingEdgeServerHardware'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_cuttingEdgeServerHardwareDes'];?>
</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="why-chbx">
                        <div class="serv-img">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/tech-ic4.svg" alt="">
                        </div>
                        <div class="serv-dt">
                            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_topLineNetwork'];?>
</h3>
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_topLineNetworkDes'];?>
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
            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_frequentlyAskedQuestions'];?>
</h2>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item active">
                    <h3 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_whatSSLCertificate'];?>
</button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_whatSSLCertificateDes'];?>
</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_whatBenefitSSL'];?>
</button>
                    </h3>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_whatBenefitSSLDes'];?>
</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingthree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_doesSSLWebBrowsers'];?>
</button>
                    </h3>
                    <div id="collapsethree" class="accordion-collapse collapse" aria-labelledby="headingthree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_doesSSLWebBrowsersDes'];?>
</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingfour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_howDoApplySSL'];?>
</button>
                    </h3>
                    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_howDoApplySSLDes'];?>
</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingfive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_certificateSigningRequest'];?>
</button>
                    </h3>
                    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_certificateSigningRequestDes'];?>
</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ -->
<div class="get-start-bx bg-purple">
   <div class="container">
      <div class="start-block-below">
            <div class="get-infobx">
               <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_chooseBestManagedCloudHosting'];?>
</h2>
            </div>
            <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxVPS_getSartedNow'];?>
</a>
      </div>
   </div>
</div><?php }
}
