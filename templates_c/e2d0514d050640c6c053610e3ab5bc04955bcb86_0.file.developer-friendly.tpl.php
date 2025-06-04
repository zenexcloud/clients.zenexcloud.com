<?php
/* Smarty version 3.1.48, created on 2025-06-02 07:05:55
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/developer-friendly.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683d4d53976c12_42228030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2d0514d050640c6c053610e3ab5bc04955bcb86' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/developer-friendly.tpl',
      1 => 1726854008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683d4d53976c12_42228030 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="about-wrp bg-purple-dark">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-12" id="one">
            <div class="abt-bx host-raitbx">
               <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_1_heading_1'];?>
</h1>
               <h6><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_1_description_1'];?>
</h6>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_1_description_2'];?>
</p>
               <div class="btn-group">
                  <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_1_description_3'];?>
</a>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-sm-12" id="two">
            <div class="web-img">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/server-pg-img.svg" alt="">
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
      <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_heading_1'];?>
</h2>
      <div class="server-features-slider">
         <div class="server-feat-box">
            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic1.svg" alt="">
            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_1'];?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_2'];?>
</p>
         </div>
         <div class="server-feat-box">
            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic2.svg" alt="">
            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_3'];?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_4'];?>
</p>
         </div>
         <div class="server-feat-box">
            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic3.svg" alt="">
            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_5'];?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_6'];?>
</p>
         </div>
         <div class="server-feat-box">
            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/featu-ic1.svg" alt="">
            <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_7'];?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_2_description_8'];?>
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
         <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudxwindow_hosting_section_4_description_1'];?>
</p>
      </div>
      <div class="serv-maintabs">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
               <button class="nav-link active" id="whytb1-tab" data-bs-toggle="tab" data-bs-target="#whytb1" type="button" role="tab" aria-controls="home" aria-selected="true"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_hosting_servers_section_4_description_2'];?>
</button>
            </li>
            <li class="nav-item" role="presentation">
               <button class="nav-link" id="whytb2-tab" data-bs-toggle="tab" data-bs-target="#whytb2" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_hosting_servers_section_4_description_3'];?>
</button>
            </li>
            <li class="nav-item" role="presentation">
               <button class="nav-link" id="whytb3-tab" data-bs-toggle="tab" data-bs-target="#whytb3" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_hosting_servers_section_4_description_4'];?>
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
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_5'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_6'];?>
</p>
                        <ul>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_7'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_8'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_9'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_10'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_11'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_12'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_13'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_14'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_15'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_16'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_17'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_18'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_19'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_20'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_21'];?>
</li>
                           <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_22'];?>
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
/images/us-ic1.svg" alt="">
                              </div>
                              <div class="why-indt">
                                 <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_23'];?>
</h4>
                                 <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_24'];?>
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
                                 <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_25'];?>
</h4>
                                 <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_26'];?>
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
                                 <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_27'];?>
</h4>
                                 <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_3_description_28'];?>
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
                        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_heading_1'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_1'];?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_2'];?>
</p>
                        <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_3'];?>
</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="whytb3" role="tabpanel" aria-labelledby="whytb3-tab">
            <div class="available-os-block">
               <div class="titlebar">
                  <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_4'];?>
</h2>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_5'];?>
</p>
               </div>
               <div class="available-os-tbles table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th></th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_6'];?>
</th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_7'];?>
</th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_8'];?>
</th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_9'];?>
</th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_10'];?>
</th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_11'];?>
</th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_12'];?>
</th>
                           <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_13'];?>
</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_14'];?>
</strong></td>
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_15'];?>
</td>
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_15'];?>
</td>
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_15'];?>
</td>
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_15'];?>
</td>
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_15'];?>
</td>
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_15'];?>
</td>
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_15'];?>
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
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_16'];?>
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
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_17'];?>
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
                           <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_4_description_18'];?>
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
         <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_heading_1'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_1'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_2'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_3'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_4'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_5'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_6'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_7'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_5_description_8'];?>
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
      <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_heading_1'];?>
</h2>
      <div class="accordion" id="accordionExample">
         <div class="accordion-item">
            <h3 class="accordion-header" id="headingOne">
               <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_1'];?>
</button>
            </h3>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_2'];?>
</p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h3 class="accordion-header" id="headingTwo">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_3'];?>
</button>
            </h3>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_4'];?>
</p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h3 class="accordion-header" id="headingthree">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_5'];?>
</button>
            </h3>
            <div id="collapsethree" class="accordion-collapse collapse" aria-labelledby="headingthree" data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_6'];?>
</p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h3 class="accordion-header" id="headingfour">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_7'];?>
</button>
            </h3>
            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_8'];?>
</p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h3 class="accordion-header" id="headingfive">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_9'];?>
</button>
            </h3>
            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_6_description_10'];?>
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
                     <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_heading_1'];?>
</h2>
                     <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_1'];?>
</p>
                     <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_2'];?>
</h3>
                     <ul>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_3'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_4'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_5'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_6'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_7'];?>
</li>
                     </ul>
                     <div class="btn-group">
                        <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_8'];?>
</a>
                        <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_7_description_9'];?>
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
                     <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_heading_1'];?>
</h2>
                     <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_1'];?>
</p>
                     <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_2'];?>
</h3>
                     <ul>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_3'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_4'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_5'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_6'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_7'];?>
</li>
                     </ul>
                     <div class="btn-group">
                        <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_8'];?>
</a>
                        <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_8_description_9'];?>
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
                     <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_heading_1'];?>
</h2>
                     <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_1'];?>
</p>
                     <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_2'];?>
</h3>
                     <ul>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_3'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_4'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_5'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_6'];?>
</li>
                        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_7'];?>
</li>
                     </ul>
                     <div class="btn-group">
                        <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_8'];?>
</a>
                        <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_9_description_9'];?>
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
                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_10_heading_1'];?>
</h2>
             </div>
             <a href="#" class="btn-main"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_server_section_10_description_1'];?>
</a>
       </div>
    </div>
</div><?php }
}
