jQuery(document).ready(function () {
	jQuery('.topnav-right a.bar-icon').on('click',function(){
	  jQuery('.right-menu-admin').toggle();
	});
	jQuery('.topnav-right a.bar-icon').click( function(e){
		e.stopPropagation();
	});
	jQuery('.right-menu-admin').click( function(e) {
		e.stopPropagation(); 
	 });
	jQuery('body').click( function() {
		jQuery('.right-menu-admin').hide();
	});
	jQuery('body').on('click', '.growl-close', function(){
		jQuery(this).parent().remove();
	});
	jQuery('#icon_menu').on('click',function(){
		jQuery('.font-awsome-li-icon-list li').removeClass('active-font');
		var iconData = jQuery('#icon_menu').val();
		jQuery('.font-awsome-li-icon-list li').each(function(){
			var iconname = jQuery(this).attr('data');
			if(iconname == iconData){
				jQuery(this).addClass("active-font");
			}

		});
		jQuery("#modal-choose-menu-icon").modal('show');
	});
	jQuery('#modal-dedicated-server').on('hidden.bs.modal', function (e) {
		$(this)
		  .find("input,textarea,select")
			 .val('')
			 .end()
		  .find("input[type=checkbox], input[type=radio]")
			 .prop("checked", "")
			 .end();
	});
	jQuery('.font-awsome-li-icon-list li').click(function () {
		var imagespath = jQuery("#imageSystemPath").val();
		var iconname = jQuery(this).attr('data');
		var icontype = jQuery(this).attr('data-type');
		jQuery("#icon_type_menu").val(icontype);
		jQuery("#icon_menu").val(iconname);
		if(icontype == '0'){
			jQuery('#selectedIconData').html('<i class="'+iconname+'"></i>');
		}else if(icontype == '1'){
			jQuery('#selectedIconData').html('<img src="'+imagespath+''+iconname+'">');
		}		
		jQuery('.font-awsome-li-icon-list li').removeClass('active-font');
		jQuery(this).addClass('active-font');
		jQuery("#modal-choose-menu-icon").modal('hide');	
	});
});

/* Cloudx Setting feature */
function wgsSubmitCloudxSettings(obj,formId){
	jQuery(obj).attr("disable",true);
	jQuery(obj).find("i").removeClass("fas fa-save").addClass("fas fa-spinner fa-spin");		
	var formSerialize = jQuery("form#"+formId).serialize();
	jQuery.ajax({
		type: "POST",
		url: "",
		data: {
			'ajaxCallCloudxTheme':'proceed',
			'callFor':'cloudxSettingsSave',
			'requested_form':formId,
			'cloudxSettingData':formSerialize,
		},
		success: function (result) {
			var objData = jQuery.parseJSON(result);
			if(objData.status == 'success'){
				jQuery("#growls").html('<div class="growl growl-notice growl-large"><div class="growl-close">×</div><div class="growl-title">Success!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
				},1000);				
			}else if(objData.status == 'error'){
				jQuery("#growls").html('<div class="growl growl-error growl-large"><div class="growl-close">×</div><div class="growl-title">Error!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
				},1000);					
			}
		}
	});	
}

/* Cloudx Get Parent menu */
function wgsGetParentMenu(obj){
	var getParemtmenu = jQuery(obj).val();
	if(getParemtmenu == '1'){
		jQuery.ajax({
			type: "POST",
			url: "",
			data: {
				'ajaxCallCloudxTheme':'proceed',
				'callFor':'cloudxMenuFeteched',
			},
			success: function (result) {
				var objData = jQuery.parseJSON(result);
				if(objData.status == 'success'){
					jQuery('#menu_parent_id').html(objData.options);
					jQuery('#menu_parent_id').prop("disabled", false);					
				}else if(objData.status == 'error'){
					jQuery("#growls").html('<div class="growl growl-error growl-large"><div class="growl-close">×</div><div class="growl-title">Error!</div><div class="growl-message">'+objData.msg+'</div></div>');
					setTimeout(function() {						
						jQuery("#growls").html('');
					},1000);					
				}
			}
		});	
	}else{
		jQuery("#menu_parent_id").html('<option selected="" value="0">(none)</option>');
		jQuery('#menu_parent_id').prop("disabled",true);
	}
}
function wgsGetParentMenuEdit(obj){
	var getParemtmenu = jQuery(obj).val();
	var menuId = jQuery(obj).attr("data-menu-id");
	if(getParemtmenu == '1'){
		jQuery.ajax({
			type: "POST",
			url: "",
			data: {
				'ajaxCallCloudxTheme':'proceed',
				'callFor':'cloudxMenuFetechedUpdate',
				'idmenu':menuId,
			},
			success: function (result) {
				var objData = jQuery.parseJSON(result);
				if(objData.status == 'success'){
					jQuery('#menu_parent_id').html(objData.options);
					jQuery('#menu_parent_id').prop("disabled", false);					
				}else if(objData.status == 'error'){
					jQuery("#growls").html('<div class="growl growl-error growl-large"><div class="growl-close">×</div><div class="growl-title">Error!</div><div class="growl-message">'+objData.msg+'</div></div>');
					setTimeout(function() {						
						jQuery("#growls").html('');
					},1000);					
				}
			}
		});	
	}else{
		jQuery("#menu_parent_id").html('<option selected="" value="0">(none)</option>');
		jQuery('#menu_parent_id').prop("disabled",true);
	}
}
/** Cloudx Theme Product Assigner */
function wgsSubmitCloudxProductAssigner(obj,form_data){
	jQuery(obj).attr("disable",true);
	jQuery(obj).find("i").removeClass("fas fa-save").addClass("fas fa-spinner fa-spin");		
	var formSerialize = jQuery("form#"+form_data).serialize();
	jQuery.ajax({
		type: "POST",
		url: "",
		data: {
			'ajaxCallCloudxTheme':'proceed',
			'callFor':'cloudxProductAssignSave',
			'requested_form':form_data,
			'cloudxProductAssignerData':formSerialize,
		},
		success: function (result) {
			var objData = jQuery.parseJSON(result);
			if(objData.status == 'success'){
				jQuery("#growls").html('<div class="growl growl-notice growl-large"><div class="growl-close">×</div><div class="growl-title">Success!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
				},1000);				
			}else if(objData.status == 'error'){
				jQuery("#growls").html('<div class="growl growl-error growl-large"><div class="growl-close">×</div><div class="growl-title">Error!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
				},1000);					
			}
		}
	});
}
/** Cloudx Theme Dedicated Product Value Update */
function wgsModalOpenForDedicated(obj,productId,productName,pageName){
	jQuery('h5.modal-title').text(productName);
	jQuery("#product_id_dedicated").val(productId);
	jQuery("#dedicated_page_name").val(pageName);
	jQuery('#modal-dedicated-server').find('a.btn-translate').remove();
	jQuery.ajax({
		type: "POST",
		url: "",
		data: {
			'ajaxCallCloudxTheme':'proceed',
			'callFor':'cloudxDedicatedProductFetch',
			'cloudxDedicatedProductId':productId,
		},
		success: function (result) {
			var objData = jQuery.parseJSON(result);
			var fieldText = 'text';
			var fieldTextArea = 'textarea';
			var tableCall = 'dedicated_table';
			if(objData.status == '1'){
				jQuery.each(objData.productData, function(key,value) {
					if(key == 'server_location'){
						var arrayL = value.split(',');
						jQuery("#multiple-select-box-modal").val(arrayL);
					}else{
						var translatedDataAnchor = '';
						jQuery('#'+key).val(value);
						if(value != ''){
							var labelModal = 'Translate '+jQuery('#'+key).attr("translate_data");
							translatedDataAnchor = '<a onclick="wgsDynmicTranslateContentCloudx(this,\''+productId+'\',\''+key+'\',\''+fieldText+'\',\''+tableCall+'\',\''+labelModal+'\');" class="btn btn-default btn-translate" data-modal-title="Translate Menu Label"><i class="fas fa-edit"></i> Translate</a>';
							jQuery('#'+key).after(translatedDataAnchor);
						}
					}
				});			
			}
		}
	});
	jQuery('#modal-dedicated-server').modal('show');
}
function wgsDedicatePageDataUpdate(obj){
	jQuery(obj).attr("disable",true);
	jQuery(obj).find("i").removeClass("fas fa-save").addClass("fas fa-spinner fa-spin");		
	var formSerialize = jQuery("form#modal-form-dedicated").serialize();
	jQuery.ajax({
		type: "POST",
		url: "",
		data: {
			'ajaxCallCloudxTheme':'proceed',
			'callFor':'cloudxDedicatedProductUpdate',
			'cloudxDedicatedProductAssignerData':formSerialize,
		},
		success: function (result) {
			var objData = jQuery.parseJSON(result);
			if(objData.status == 'success'){
				jQuery("#growls").html('<div class="growl growl-notice growl-large"><div class="growl-close">×</div><div class="growl-title">Success!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
					jQuery('#modal-dedicated-server').modal('hide');
				},1000);				
			}else if(objData.status == 'error'){
				jQuery("#growls").html('<div class="growl growl-error growl-large"><div class="growl-close">×</div><div class="growl-title">Error!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
					jQuery('#modal-dedicated-server').modal('hide');
				},1000);					
			}
		}
	});
}
function wgsCloudxShowViewImage(obj){
	var callFor = jQuery(obj).attr("data-trigger");
	if(callFor == 'dedicated'){
		jQuery("#image-inf").attr('src','../modules/addons/cloudx/assets/images/dedicated_view.jpg');
	}else{
		jQuery("#image-inf").attr('src','../modules/addons/cloudx/assets/images/vps_view.png');
	}
	jQuery("#modal-image-show").modal('show');
}
function wgsDynmicTranslateContentCloudx(obj,relId,relcolumn,fieldType,tableCall,modalTitle){
	jQuery("#modalBodyTranslation").html('');
	jQuery.ajax({
		type: "POST",
		url: "",
		data: {
			'ajaxCallCloudxTheme':'proceed',
			'callFor':'cloudxThemeTranslationPopUp',
			'relatedId':relId,
			'relatedCol':relcolumn,
			'relatedField':fieldType,
			'relatedTable':tableCall,
		},
		success: function (result) {
			jQuery("#modalDynmicTranslation").find(".modal-title").html(modalTitle);
			jQuery("#modalBodyTranslation").html(result);
			jQuery("#modalDynmicTranslation").modal("show");
		}
	});	
}
function wgsDynmicTranslateDataSavedCloud(obj){
	jQuery(obj).attr("disable",true);
	jQuery(obj).find("i").removeClass("fas fa-save").addClass("fas fa-spinner fa-spin");
	var formSerialize = jQuery("form#formDynmicTranslation").serialize();
	jQuery.ajax({
		type: "POST",
		url: "",
		data: {
			'ajaxCallCloudxTheme':'proceed',
			'callFor':'cloudxThemeTranslationSaveForm',
			'form_data_serial':formSerialize,
		},
		success: function (result) {
			var objData = jQuery.parseJSON(result);
			if(objData.status == 'success'){
				jQuery("#growls").html('<div class="growl growl-notice growl-large"><div class="growl-close">×</div><div class="growl-title">Success!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
					jQuery('#modalDynmicTranslation').modal('hide');
				},1000);				
			}else if(objData.status == 'error'){
				jQuery("#growls").html('<div class="growl growl-error growl-large"><div class="growl-close">×</div><div class="growl-title">Error!</div><div class="growl-message">'+objData.msg+'</div></div>');
				setTimeout(function() {
					jQuery(obj).attr("disable",false);
					jQuery(obj).find("i").removeClass("fas fa-spinner fa-spin").addClass("fas fa-save");						
					jQuery("#growls").html('');
					jQuery('#modalDynmicTranslation').modal('hide');
				},1000);					
			}
		}
	});
}