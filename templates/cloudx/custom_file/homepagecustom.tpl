<section class="hero-banner bg-purple-dark">
    <div class="hero-slider">
       <div class="hero-slide-bx">
          <div class="container">
             <div class="row">
                <div class="col-md-6 col-sm-6">
                   <div class="banner-text">
                      <h1>{$LANG.cloudxcloudHosting_homepagecustom_slide3}</h1>
                      <h6>{$LANG.cloudxstartYourDigital_homepagecustom_slide3}</h6>
                      <ul>
                         <li>{$LANG.cloudxmicrosoftTeams_homepagecustom_slide3}</li>
                         <li>{$LANG.cloudxexchangeOnline_homepagecustom_slide3}</li>
                         <li>{$LANG.cloudxoneDrive_homepagecustom_slide3}</li>
                         <li>{$LANG.cloudxofficeWebApps_homepagecustom_slide3}</li>
                      </ul>
                      <div class="btn-group">
                         <a href="{$WEB_ROOT}/vps-servers.php" class="btn-main">Private Servers</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 col-sm-6">
                   <div class="banner-img">
                      <img src="{$WEB_ROOT}/templates/{$template}/images/banner-img3.svg" alt="">
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    {if $registerdomainenabled || $transferdomainenabled}
    <div class="container">
       <div class="online-business-box">
          <div class="row">
             <div class="col-md-5 col-sm-12">
                <h3>{$LANG.cloudxbringYourBusinessOnline_homepagecustom}</h3>
             </div>
             <div class="col-md-7 col-sm-12">
                <div class="domain-box">
                   <form method="post" action="domainchecker.php">
                      <input type="hidden" name="register">
                      <input type="text" name="sld" placeholder="Find your perfect domain" class="form-control">
                      <div class="btn-domainb">
                         <select name="tld" class="form-control">
                            {foreach from=$cloudx_domain_tld_data item=tldextensionData}
                            <option value="{$tldextensionData}">{$tldextensionData}</option>
                            {/foreach}
                         </select>
                         <button type="submit">{$LANG.cloudxfindDomain_homepagecustom}</button>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
    {/if}
 </section>
 
 {include file="$template/custom_file/common_price_file/plan-section-layout-without-billcycle.tpl"}
 
 <section class="secure-wrp">
    <div class="container">
       <div class="row">
          <div class="col-md-5 col-sm-12">
             <div class="secure-img">
                <img src="{$WEB_ROOT}/templates/{$template}/images/secure-img.svg" alt="">
             </div>
          </div>
          <div class="offset-md-1 col-md-6 col-sm-12">
             <div class="secure-data">
                <h2>{$LANG.cloudxsecureStorageSolutions_homepagecustom}</h2>
                <p>{$LANG.cloudxsecureStorageSolutionsDes_homepagecustom}</p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="about-wrp about-home bg-purple">
    <div class="container">
       <div class="row">
          <div class="col-md-7 col-sm-12">
             <div class="abt-bx">
                <h2>{$LANG.cloudxaboutUs_homepagecustom}</h2>
                <p>{$LANG.cloudxaboutUsDes_homepagecustom}</p>
                <div class="abt-info">
                   <p>{$LANG.cloudxhelpingSmallBusinesses_homepagecustom}</p>
                </div>
                <div class="btn-group"><a href="#" class="btn-main">{$LANG.cloudxaboutUsBtn_homepagecustom}</a><a href="#" class="btn-main tell-btn">{$LANG.cloudxaboutUsTellBtn_homepagecustom}</a></div>
             </div>
          </div>
          <div class="col-md-5 col-sm-12">
             <div class="about-home-right"><img src="{$WEB_ROOT}/templates/{$template}/images/about-img.jpg" alt=""></div>
          </div>
       </div>
    </div>
 </section>
 <section class="servers-wrp">
    <div class="container">
       <div class="serv-maintabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
             <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">{$LANG.cloudxhighEndServers_homepagecustom}</button>
             </li>
             <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">{$LANG.cloudxunattainablePromotions_homepagecustom}</button>
             </li>
          </ul>
       </div>
       <div class="tab-content">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             <div class="inner-serv-dt">
                <div class="row">
                   <div class="col-md-5 col-sm-12 banner-section">
                      <div class="tab-content">
                         <div class="tab-pane fade show active" id="tb1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="server-img">
                               <img src="{$WEB_ROOT}/templates/{$template}/images/server-img.svg" alt="">
                            </div>
                         </div>
                         <div class="tab-pane fade" id="tb2" role="tabpanel" aria-labelledby="profile-tab2">
                            <div class="server-img">
                               <img src="{$WEB_ROOT}/templates/{$template}/images/server-img.svg" alt="">
                            </div>
                         </div>
                         <div class="tab-pane fade" id="tb3" role="tabpanel" aria-labelledby="profile-tab3">
                            <div class="server-img">
                               <img src="{$WEB_ROOT}/templates/{$template}/images/server-img.svg" alt="">
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="offset-md-1 col-md-6 col-sm-12 features-section">
                      <div class="inner-lst-bx">
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                               <button class="nav-link active" id="home-tab1"  data-bs-target="#tb1" type="button" role="tab" aria-controls="tb1" aria-selected="true">
                                  <span><img src="{$WEB_ROOT}/templates/{$template}/images/Security_icon.svg" alt=""></span>
                                  <div class="tab-box">
                                     <h4>{$LANG.cloudxsecurity_homepagecustom}</h4>
                                     <p>{$LANG.cloudxsecurityDes_homepagecustom}</p>
                                  </div>
                               </button>
                            </li>
                            <li class="nav-item" role="presentation">
                               <button class="nav-link" id="profile-tab1"  data-bs-target="#tb2" type="button" role="tab" aria-controls="tb2" aria-selected="false">
                                  <span><img src="{$WEB_ROOT}/templates/{$template}/images/Scalable_icon.svg" alt=""></span>
                                  <div class="tab-box">
                                     <h4>{$LANG.cloudxscalable_homepagecustom}</h4>
                                     <p>{$LANG.cloudxscalableDes_homepagecustom}</p>
                                  </div>
                               </button>
                            </li>
                            <li class="nav-item" role="presentation">
                               <button class="nav-link" id="profile-tab2"  data-bs-target="#tb3" type="button" role="tab" aria-controls="tb3" aria-selected="false">
                                  <span><img src="{$WEB_ROOT}/templates/{$template}/images/Robust_icon.svg" alt=""></span>
                                  <div class="tab-box">
                                     <h4>{$LANG.cloudxrobust_homepagecustom}</h4>
                                     <p>{$LANG.cloudxrobustDes_homepagecustom}</p>
                                  </div>
                               </button>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             <div class="inner-serv-dt">
                <div class="row">
                   <div class="col-md-5 col-sm-12 banner-section">
                      <div class="tab-content">
                         <div class="tab-pane fade show active" id="tb1-p" role="tabpanel" aria-labelledby="home-tab">
                            <div class="server-img">
                               <img src="{$WEB_ROOT}/templates/{$template}/images/server-img.svg" alt="">
                            </div>
                         </div>
                         <div class="tab-pane fade" id="tb2-p" role="tabpanel" aria-labelledby="profile-tab2">
                            <div class="server-img">
                               <img src="{$WEB_ROOT}/templates/{$template}/images/server-img.svg" alt="">
                            </div>
                         </div>
                         <div class="tab-pane fade" id="tb3-p" role="tabpanel" aria-labelledby="profile-tab3">
                            <div class="server-img">
                               <img src="{$WEB_ROOT}/templates/{$template}/images/server-img.svg" alt="">
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="offset-md-1 col-md-6 col-sm-12 features-section">
                      <div class="inner-lst-bx">
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                               <button class="nav-link active" id="home-tab1"  data-bs-target="#tb1-p" type="button" role="tab" aria-controls="tb1" aria-selected="true">
                                  <span><img src="{$WEB_ROOT}/templates/{$template}/images/Honesty_icon.svg" alt=""></span>
                                  <div class="tab-box">
                                     <h4>{$LANG.cloudxsecurity_homepagecustom_corevalue}</h4>
                                     <p>{$LANG.cloudxsecurityDes_homepagecustom_corevalue}</p>
                                  </div>
                               </button>
                            </li>
                            <li class="nav-item" role="presentation">
                               <button class="nav-link" id="profile-tab1"  data-bs-target="#tb2-p" type="button" role="tab" aria-controls="tb2" aria-selected="false">
                                  <span><img src="{$WEB_ROOT}/templates/{$template}/images/Transparency_icon.svg" alt=""></span>
                                  <div class="tab-box">
                                     <h4>{$LANG.cloudxscalable_homepagecustom_corevalue}</h4>
                                     <p>{$LANG.cloudxscalableDes_homepagecustom_corevalue}</p>
                                  </div>
                               </button>
                            </li>
                            <li class="nav-item" role="presentation">
                               <button class="nav-link" id="profile-tab2"  data-bs-target="#tb3-p" type="button" role="tab" aria-controls="tb3" aria-selected="false">
                                  <span><img src="{$WEB_ROOT}/templates/{$template}/images/Accountability_icon.svg" alt=""></span>
                                  <div class="tab-box">
                                     <h4>{$LANG.cloudxrobust_homepagecustom_corevalue}</h4>
                                     <p>{$LANG.cloudxrobustDes_homepagecustom_corevalue}</p>
                                  </div>
                               </button>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="sponcer-wrp">
    <div class="container">
       <div class="sponcer-slider">
          <div class="sponcer-logo">
             <img src="{$WEB_ROOT}/templates/{$template}/images/brand1.png" alt="">
          </div>
          <div class="sponcer-logo">
             <img src="{$WEB_ROOT}/templates/{$template}/images/brand2.png" alt="">
          </div>
          <div class="sponcer-logo">
             <img src="{$WEB_ROOT}/templates/{$template}/images/brand3.png" alt="">
          </div>
          <div class="sponcer-logo">
             <img src="{$WEB_ROOT}/templates/{$template}/images/brand4.png" alt="">
          </div>
          <div class="sponcer-logo">
             <img src="{$WEB_ROOT}/templates/{$template}/images/brand5.png" alt="">
          </div>
       </div>
    </div>
 </section>