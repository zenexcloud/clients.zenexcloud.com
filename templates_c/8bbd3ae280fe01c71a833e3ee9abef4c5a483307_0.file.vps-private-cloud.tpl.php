<?php
/* Smarty version 3.1.48, created on 2025-06-02 07:43:53
  from '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/vps-private-cloud.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_683d5639ad8a14_49389972',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bbd3ae280fe01c71a833e3ee9abef4c5a483307' => 
    array (
      0 => '/home/zenexcloud/public_html/billing.zenexcloud.com/templates/cloudx/custom_file/vps-private-cloud.tpl',
      1 => 1726854010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683d5639ad8a14_49389972 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="about-wrp bg-purple-dark">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-12" id="one">
            <div class="abt-bx host-raitbx">
               <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_heading_1'];?>
</h1>
               <h6><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_description_1'];?>
</h6>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_description_2'];?>
</p>
               <div class="btn-group">
                  <a href="#" class="btn-main tell-btn"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_description_3'];?>
</a>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-sm-12" id="two">
            <div class="web-img">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-private-img.svg" alt="">
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Price Section Start -->
<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/custom_file/common_price_file/plan-section-layout-with-billcycle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<!-- Price Section End -->
<section class="hosting-plans-wrp">
   <div class="container">
      <div class="titlebar">
         <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_heading_2'];?>
</h2>
         <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_1_description_1'];?>
</p>
      </div>
      <div class="row">
         <div class="col-md-4 col-sm-12">
            <div class="support-box">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_1_description_2'];?>
</h3>
               <span><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/sup-ic1.svg" alt=""></span>
            </div>
         </div>
         <div class="col-md-4 col-sm-12">
            <div class="support-box">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_1_description_3'];?>
</h3>
               <span><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/sup-ic2.svg" alt=""></span>
            </div>
         </div>
         <div class="col-md-4 col-sm-12">
            <div class="support-box">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_1_description_4'];?>
</h3>
               <span><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/sup-ic3.svg" alt=""></span>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="vps-host-wrp">
   <div class="container">
      <div class="titlebar">
         <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_1_heading_1'];?>
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
                           <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_2_description_1'];?>
</h4>
                           <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_2_description_2'];?>
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
                           <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_2_description_3'];?>
</h4>
                           <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_2_description_4'];?>
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
                           <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_2_description_5'];?>
</h4>
                           <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_2_description_6'];?>
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
<section class="hosting-features-wrp vps-host-features">
   <div class="container">
      <div class="titlebar">
         <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_heading_1'];?>
</h2>
      </div>
      <div class="row">
         <div class="col-md-4 col-sm-6">
            <div class="hosting-block">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic1.svg" alt="">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_1'];?>
</h3>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_2'];?>
</p>
            </div>
         </div>
         <div class="col-md-4 col-sm-6">
            <div class="hosting-block">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic2.svg" alt="">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_3'];?>
</h3>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_4'];?>
</p>
            </div>
         </div>
         <div class="col-md-4 col-sm-6">
            <div class="hosting-block">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic3.svg" alt="">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_5'];?>
</h3>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_6'];?>
</p>
            </div>
         </div>
         <div class="col-md-4 col-sm-6">
            <div class="hosting-block">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic4.svg" alt="">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_7'];?>
</h3>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_8'];?>
</p>
            </div>
         </div>
         <div class="col-md-4 col-sm-6">
            <div class="hosting-block">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic5.svg" alt="">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_9'];?>
</h3>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_10'];?>
</p>
            </div>
         </div>
         <div class="col-md-4 col-sm-6">
            <div class="hosting-block">
               <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/vps-fe-ic6.svg" alt="">
               <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_11'];?>
</h3>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_12'];?>
</p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="about-wrp risk-factor-section">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-12" id="one">
            <div class="abt-bx host-raitbx">
               <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_13'];?>
</h2>
               <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_3_description_14'];?>
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
<section class="why-choose-wrp why-us-server">
   <div class="container">
      <div class="titlebar">
         <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_4_heading_1'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_4_description_1'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_4_description_2'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_5_heading_1'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_5_description_1'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_5_description_2'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_5_description_3'];?>
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
                  <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_5_description_5'];?>
</h3>
                  <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudx_private_cloud_section_5_description_6'];?>
</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section><?php }
}
