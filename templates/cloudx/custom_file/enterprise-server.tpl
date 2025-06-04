<!-- Hosting -->
<section class="about-wrp bg-purple-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12" id="one">
                <div class="abt-bx host-raitbx">
                    <h1>{$LANG.cloudxenterpriseSer_enterpriseSerers}</h1>
                    <h6>{$LANG.cloudxenterpriseSer_highComputingPower}</h6>
                    <p>{$LANG.cloudxenterpriseSer_highPerformanceProfessionalServers}</p>

                    <div class="btn-group">
                        <a href="#" class="btn-main tell-btn">{$LANG.cloudxenterpriseSer_getStartedNow}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12" id="two">
                <div class="web-img">
                    <img src="{$WEB_ROOT}/templates/{$template}/images/enter-price-img.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hosting -->

<!-- Dedicated Servers -->
{include file="$template/custom_file/common_price_file/plan-section-layout-dedicated.tpl"}
<!-- End Dedicated Servers -->

<!-- Server Features -->
<section class="server-features-wrp">
    <div class="container">
        <h2>{$LANG.cloudxenterpriseSer_includeFeatures}</h2>

        <div class="server-features-slider">
            <div class="server-feat-box">
                <img src="{$WEB_ROOT}/templates/{$template}/images/featu-ic1.svg" alt="">
                <h3>{$LANG.cloudxenterpriseSer_ddosProtection}</h3>
                <p>{$LANG.cloudxenterpriseSer_ddosProtectionDes}</p>
            </div>
            <div class="server-feat-box">
                <img src="{$WEB_ROOT}/templates/{$template}/images/featu-ic2.svg" alt="">
                <h3>{$LANG.cloudxenterpriseSer_RPN}</h3>
                <p>{$LANG.cloudxenterpriseSer_RPNDes}</p>
            </div>
            <div class="server-feat-box">
                <img src="{$WEB_ROOT}/templates/{$template}/images/featu-ic3.svg" alt="">
                <h3>{$LANG.cloudxenterpriseSer_hypervVMware}</h3>
                <p>{$LANG.cloudxenterpriseSer_hypervVMwareDes}</p>
            </div>
            <div class="server-feat-box">
                <img src="{$WEB_ROOT}/templates/{$template}/images/featu-ic1.svg" alt="">
                <h3>{$LANG.cloudxenterpriseSer_DDosProtection}</h3>
                <p>{$LANG.cloudxenterpriseSer_DDosProtectionDes}</p>
            </div>
        </div>
    </div>
</section>
<!-- End Server Features -->

<!-- Services -->
<section class="why-choose-wrp">
    <div class="container">
        <div class="titlebar">
            <h2>{$LANG.cloudxenterpriseSer_ourServices}</h2>
            <p>{$LANG.cloudxenterpriseSer_ourServicesDes}</p>
        </div>

        <div class="serv-maintabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="whytb1-tab" data-bs-toggle="tab" data-bs-target="#whytb1"
                        type="button" role="tab" aria-controls="home"
                        aria-selected="true">{$LANG.cloudxenterpriseSer_managmentMonitroing}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="whytb2-tab" data-bs-toggle="tab" data-bs-target="#whytb2" type="button"
                        role="tab" aria-controls="profile"
                        aria-selected="false">{$LANG.cloudxenterpriseSer_DDosProtection}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="whytb3-tab" data-bs-toggle="tab" data-bs-target="#whytb3" type="button"
                        role="tab" aria-controls="profile"
                        aria-selected="false">{$LANG.cloudxenterpriseSer_licenceSoftware}</button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="whytb1" role="tabpanel" aria-labelledby="whytb1-tab">
                <div class="why-row">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="why-cloud-bx">
                                <h3>{$LANG.cloudxenterpriseSer_ultraFastCloudHosting}</h3>
                                <p>{$LANG.cloudxenterpriseSer_benefitsCloudSimplicitySharedHosting}</p>

                                <ul>
                                    <li>{$LANG.cloudxenterpriseSer_dualXeonProcessors}</li>
                                    <li>{$LANG.cloudxenterpriseSer_mySQL}</li>
                                    <li>{$LANG.cloudxenterpriseSer_GBRAM}</li>
                                    <li>{$LANG.cloudxenterpriseSer_rubyOnRails}</li>
                                    <li>{$LANG.cloudxenterpriseSer_24x7Support}</li>
                                    <li>{$LANG.cloudxenterpriseSer_antiSpamVirusProtection}</li>
                                    <li>{$LANG.cloudxenterpriseSer_250GBRaidOSDrive}</li>
                                    <li>{$LANG.cloudxenterpriseSer_secureFTPAccess}</li>
                                    <li>{$LANG.cloudxenterpriseSer_1TBCachedCustomerDrive}</li>
                                    <li>{$LANG.cloudxenterpriseSer_hotlinkLeechProtection}</li>
                                    <li>{$LANG.cloudxenterpriseSer_apache2.2x}</li>
                                    <li>{$LANG.cloudxenterpriseSer_phpMyAdminAccess}</li>
                                    <li>{$LANG.cloudxenterpriseSer_PHPPerlPython}</li>
                                    <li>{$LANG.cloudxenterpriseSer_onlineeMailAddressBook}</li>
                                    <li>{$LANG.cloudxenterpriseSer_freeDNSManagement}</li>
                                    <li>{$LANG.cloudxenterpriseSer_nowWithVarnishCaching}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="why-ul">
                                <ul>
                                    <li>
                                        <div class="whyimg">
                                            <img src="{$WEB_ROOT}/templates/{$template}/images/us-ic1.svg"
                                                alt="">
                                        </div>
                                        <div class="why-indt">
                                            <h4>{$LANG.cloudxenterpriseSer_reliablePower}</h4>
                                            <p>{$LANG.cloudxenterpriseSer_reliablePowerDes}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="whyimg">
                                            <img src="{$WEB_ROOT}/templates/{$template}/images/us-ic2.svg"
                                                alt="">
                                        </div>
                                        <div class="why-indt">
                                            <h4>{$LANG.cloudxenterpriseSer_HvacProtection}</h4>
                                            <p>{$LANG.cloudxenterpriseSer_HvacProtectionDes}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="whyimg">
                                            <img src="{$WEB_ROOT}/templates/{$template}/images/us-ic3.svg"
                                                alt="">
                                        </div>
                                        <div class="why-indt">
                                            <h4>{$LANG.cloudxenterpriseSer_networkSecurity}</h4>
                                            <p>{$LANG.cloudxenterpriseSer_networkSecurityDes}</p>
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
                                <img src="{$WEB_ROOT}/templates/{$template}/images/dose-img.svg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="why-cloud-bx free-install">
                                <h3><span>{$LANG.cloudxenterpriseSer_antiDDosProtection}</span>{$LANG.cloudxenterpriseSer_infrastructuresProtected}
                                </h3>
                                <p>{$LANG.cloudxenterpriseSer_ourDedicatedServersCome}</p>

                                <p>{$LANG.cloudxenterpriseSer_keepYourDedicatedInfrastructuresProtected}</p>

                                <a href="#" class="btn-main">{$LANG.cloudxenterpriseSer_getItOut}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="whytb3" role="tabpanel" aria-labelledby="whytb3-tab">
                <div class="available-os-block">
                    <div class="titlebar">
                        <h2>{$LANG.cloudxenterpriseSer_availableOperatingSystem}</h2>
                        <p>{$LANG.cloudxenterpriseSer_availableOperatingSystemDes}</p>
                    </div>

                    <div class="available-os-tbles table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{$LANG.cloudxenterpriseSer_centos}</th>
                                    <th>{$LANG.cloudxenterpriseSer_ubuntu}</th>
                                    <th>{$LANG.cloudxenterpriseSer_cloudlinux}</th>
                                    <th>{$LANG.cloudxenterpriseSer_fedora}</th>
                                    <th>{$LANG.cloudxenterpriseSer_debian}</th>
                                    <th>{$LANG.cloudxenterpriseSer_cPanel}</th>
                                    <th>{$LANG.cloudxenterpriseSer_plesk}</th>
                                    <th>{$LANG.cloudxenterpriseSer_windows}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Pricing</strong></td>
                                    <td>{$LANG.cloudxenterpriseSer_free}</td>
                                    <td>{$LANG.cloudxenterpriseSer_free}</td>
                                    <td>{$LANG.cloudxenterpriseSer_free}</td>
                                    <td>{$LANG.cloudxenterpriseSer_free}</td>
                                    <td>{$LANG.cloudxenterpriseSer_free}</td>
                                    <td>{$LANG.cloudxenterpriseSer_free}</td>
                                    <td>{$LANG.cloudxenterpriseSer_free}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{$LANG.cloudxenterpriseSer_web_pro}</td>
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
                                    <td>{$LANG.cloudxenterpriseSer_web_pro_d10}</td>
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
                                    <td>{$LANG.cloudxenterpriseSer_web_pro_d2}</td>
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
            <h2>{$LANG.cloudxenterpriseSer_whyChooseUs}</h2>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="{$WEB_ROOT}/templates/{$template}/images/serv-why-ic1.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3>{$LANG.cloudxenterpriseSer_solutions}</h3>
                        <p>{$LANG.cloudxenterpriseSer_solutionsDes}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="{$WEB_ROOT}/templates/{$template}/images/serv-why-ic2.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3>{$LANG.cloudxenterpriseSer_speed}</h3>
                        <p>{$LANG.cloudxenterpriseSer_speedDes}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="{$WEB_ROOT}/templates/{$template}/images/serv-why-ic3.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3>{$LANG.cloudxenterpriseSer_support}</h3>
                        <p>{$LANG.cloudxenterpriseSer_supportDes}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="why-chbx">
                    <div class="serv-img">
                        <img src="{$WEB_ROOT}/templates/{$template}/images/serv-why-ic4.svg" alt="">
                    </div>
                    <div class="serv-dt">
                        <h3>{$LANG.cloudxenterpriseSer_uptimeGuarantee}</h3>
                        <p>{$LANG.cloudxenterpriseSer_uptimeGuaranteeDes}</p>
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
        <h2>{$LANG.cloudxenterpriseSer_frequentlyAskedQuestions}</h2>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">{$LANG.cloudxenterpriseSer_whatSSLCertificate}</button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>{$LANG.cloudxenterpriseSer_whatSSLCertificateDes}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">{$LANG.cloudxenterpriseSer_whatBenefitSSL}</button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>{$LANG.cloudxenterpriseSer_whatBenefitSSLDes}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingthree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsethree" aria-expanded="false"
                        aria-controls="collapsethree">{$LANG.cloudxenterpriseSer_doesSSLWebBrowsers}</button>
                </h3>
                <div id="collapsethree" class="accordion-collapse collapse" aria-labelledby="headingthree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>{$LANG.cloudxenterpriseSer_doesSSLWebBrowsersDes}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingfour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsefour" aria-expanded="false"
                        aria-controls="collapsefour">{$LANG.cloudxenterpriseSer_howDoApplySSL}</button>
                </h3>
                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>{$LANG.cloudxenterpriseSer_howDoApplySSLDes}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingfive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsefive" aria-expanded="false"
                        aria-controls="collapsefive">{$LANG.cloudxenterpriseSer_certificateSigningRequest}</button>
                </h3>
                <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>{$LANG.cloudxenterpriseSer_certificateSigningRequestDes}</p>
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
                            <img src="{$WEB_ROOT}/templates/{$template}/images/dedicat-img.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="abt-bx host-raitbx">
                            <h2>{$LANG.cloudxenterpriseSer_dedicatedServers_slide1}</h2>
                            <p>{$LANG.cloudxenterpriseSer_dedicatedServersDes_slide1}</p>

                            <h3>{$LANG.cloudxenterpriseSer_flexEnterprise}</h3>

                            <ul>
                                <li>{$LANG.cloudxenterpriseSer_intelXeon}
                                    <span>{$LANG.cloudxenterpriseSer_intelXeonSpan}</span></li>
                                <li>{$LANG.cloudxenterpriseSer_1000} <span>{$LANG.cloudxenterpriseSer_1000Span}</span>
                                </li>
                                <li>{$LANG.cloudxenterpriseram} <span>{$LANG.cloudxenterpriserams}</span></li>
                                <li>{$LANG.cloudxenterprise449kr} <span>{$LANG.cloudenterprisemonth}</span></li>
                                <li>{$LANG.cloudxenterpriseSer_2TB} <span>{$LANG.cloudxenterpriseSer_2TBSpan}</span>
                                </li>
                            </ul>

                            <div class="btn-group">
                                <a href="#" class="btn-main tell-btn">{$LANG.cloudxenterpriseSer_getStarted}</a>
                                <a href="#" class="btn-main">{$LANG.cloudxenterpriseSer_learnMore}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dedi-serv-bx">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="web-img">
                            <img src="{$WEB_ROOT}/templates/{$template}/images/dedicat-img.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="abt-bx host-raitbx">
                            <h2>{$LANG.cloudxenterpriseSer_dedicatedServers_slide2}</h2>
                            <p>{$LANG.cloudxenterpriseSer_dedicatedServersDes_slide2}</p>

                            <h3>{$LANG.cloudxenterpriseSer_flexEnterprise_slide2}</h3>

                            <ul>
                                <li>{$LANG.cloudxenterpriseSer_intelXeon_slide2}
                                    <span>{$LANG.cloudxenterpriseSer_intelXeonSpan_slide2}</span></li>
                                <li>{$LANG.cloudxenterpriseSer_1000_slide2}<span>{$LANG.cloudxenterpriseSer_1000Span_slide2}</span>
                                </li>
                                <li>{$LANG.cloudxenterpriseram} <span>{$LANG.cloudxenterpriserams}</span></li>
                                <li>{$LANG.cloudxenterprise449kr} <span>{$LANG.cloudenterprisemonth}</span></li>
                                <li>{$LANG.cloudxenterpriseSer_2TB} <span>{$LANG.cloudxenterpriseSer_2TBSpan}</span>
                                </li>
                            </ul>

                            <div class="btn-group">
                                <a href="#" class="btn-main tell-btn">{$LANG.cloudxenterpriseSer_getStarted}</a>
                                <a href="#" class="btn-main">{$LANG.cloudxenterpriseSer_learnMore}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dedi-serv-bx">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="web-img">
                            <img src="{$WEB_ROOT}/templates/{$template}/images/dedicat-img.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="abt-bx host-raitbx">
                            <h2>{$LANG.cloudxenterpriseSer_dedicatedServers_slide2}</h2>
                            <p>{$LANG.cloudxenterpriseSer_dedicatedServersDes_slide2}</p>

                            <h3>{$LANG.cloudxenterpriseSer_flexEnterprise_slide2}</h3>

                            <ul>
                                <li>{$LANG.cloudxenterpriseSer_intelXeon_slide2}
                                    <span>{$LANG.cloudxenterpriseSer_intelXeonSpan_slide2}</span></li>
                                <li>{$LANG.cloudxenterpriseSer_1000_slide2}<span>{$LANG.cloudxenterpriseSer_1000Span_slide2}</span>
                                </li>
                                <li>{$LANG.cloudxenterpriseram} <span>{$LANG.cloudxenterpriserams}</span></li>
                                <li>{$LANG.cloudxenterprise449kr} <span>{$LANG.cloudenterprisemonth}</span></li>
                                <li>{$LANG.cloudxenterpriseSer_2TB} <span>{$LANG.cloudxenterpriseSer_2TBSpan}</span>
                                </li>
                            </ul>

                            <div class="btn-group">
                                <a href="#" class="btn-main tell-btn">{$LANG.cloudxenterpriseSer_getStarted}</a>
                                <a href="#" class="btn-main">{$LANG.cloudxenterpriseSer_learnMore}</a>
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
               <h2>{$LANG.cloudxenterpriseSer_chooseBestManagedCloudHosting}</h2>
            </div>
            <a href="#" class="btn-main">{$LANG.cloudxenterpriseSer_getSartedNow}</a>
      </div>
   </div>
</div>