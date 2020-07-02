{**
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2015 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="panel" id="posmegamenu-list">
	<h3><i class="icon-list-ul"></i> {l s='Menu List' mod='posmegamenu'}
	<span class="panel-heading-action">
		
	</span>
	</h3>
	<div id="menuContent">
		<div id="menus">
			{foreach from=$info_menus item=info_menu}
				<div id="menu_{$info_menu.id_posmegamenu_item|intval}" class="panel">
					<div class="row">
						<div class="col-md-1"><i class="icon icon-arrows" style="font-size:16px; line-height:32px;"></i></div>
						<div class="col-md-2">
							<h4 class="pull-left">#{$info_menu.id_posmegamenu_item|escape:'html':'UTF-8'}</h4>
						</div>
						<div class="col-md-2">
							<h4 class="pull-left">{$info_menu.title|escape:'html':'UTF-8'}</h4>
						</div>
						<div class="col-md-7">	
							<div class="btn-group-action pull-right">
								{if $info_menu.submenu_type == 0}
									<a class="btn btn-default"
										href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=posmegamenu&id_posmegamenu_item={$info_menu.id_posmegamenu_item|intval}&buildMenu=1">
										<i class="icon-layer"></i>
										{l s='Build SubMenu' mod='posmegamenu'}
									</a>
								{/if}
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=posmegamenu&id_posmegamenu_item={$info_menu.id_posmegamenu_item|intval}&editMenu=1">
									<i class="icon-edit"></i>
									{l s='Edit' mod='posmegamenu'}
								</a>
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=posmegamenu&delete_id_menu={$info_menu.id_posmegamenu_item|intval}">
									<i class="icon-trash"></i>
									{l s='Delete' mod='posmegamenu'}
								</a>
								{$info_menu.status|escape:'quotes':'UTF-8'}
							</div>
						</div>
					</div>
				</div>
			{/foreach}
		</div>
		<a id="desc-product-new" class="" href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=posmegamenu&addMenu=1">
			<i class="process-icon-new "></i><span title="" class="label-tooltip" data-html="true">{l s='Add new item' mod='posmegamenu'}</span>
		</a>
	</div>	
	<script type="text/javascript">
		$(function() {
			var $myMenus = $("#menus");
			$myMenus.sortable({
				opacity: 0.6,
				cursor: "move",
				start: function(){
					$(this).css('background','#f1f1f1');
				},
				stop: function(){
					$(this).css('background','#ffffff');
				},
				update: function() {
					var order = $(this).sortable("serialize") + "&action=updateMenusPosition";
					$.post("{$url_base|escape:'html':'UTF-8'}modules/posmegamenu/ajax_posmegamenu.php?secure_key={$secure_key|escape:'html':'UTF-8'}", order);
					}
				});
			$myMenus.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});
		});
	</script>
</div>
<div class="panel" id="posmegamenu-config">
	<h3><i class="icon-cog"></i> {l s='Menu settings' mod='posmegamenu'}</h3>
	<form id="module_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&amp;configure=posmegamenu&amp;token={Tools::getAdminTokenLite('AdminModules')|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data" novalidate="">
		<div class="form-group">
            <label class="control-label col-lg-2" for="posmegamenu_bg">{l s='Background type' mod='posmegamenu'}</label>
            <div class="col-lg-10">
                <select id="posmegamenu_bg" name="posmegamenu_bg" class="form-control fixed-width-xl">
                    <option value="1" {if $menu_config.posmegamenu_bg == 1}selected="selected"{/if}>None</option>
                    <option value="2" {if $menu_config.posmegamenu_bg == 2}selected="selected"{/if}>Color</option>
                    <option value="3" {if $menu_config.posmegamenu_bg == 3}selected="selected"{/if}>Image</option>
                </select>
            </div>
        </div>
        <div class="form-group bg-type-color {if $menu_config.posmegamenu_bg == 1 || $menu_config.posmegamenu_bg == 3}hidden{/if}">
            <label class="control-label col-lg-2" for="posmegamenu_bg_color">{l s='Background color' mod='posmegamenu'}</label>
            <div class="col-lg-10">
                <div class="input-group fixed-width-xl">
                    <input data-hex="true" class="color mColorPickerInput mColorPicker" name="posmegamenu_bg_color" value="{$menu_config.posmegamenu_bg_color}" id="posmegamenu_bg_color" type="color">
                </div>
            </div>
        </div>
        <div class="form-group bg-type-image {if $menu_config.posmegamenu_bg == 1 || $menu_config.posmegamenu_bg == 2}hidden{/if}">
            <label class="control-label col-lg-2" for="submenu_bg_image">{l s='Image source' mod='posmegamenu'}</label>
            <div class="col-lg-10">
                <div class="col-lg-7">
                    <input type="text" id="posmegamenu_bg_image" name="posmegamenu_bg_image" value="{$menu_config.posmegamenu_bg_image}"/>
                    <a href="filemanager/dialog.php?type=1&field_id=posmegamenu_bg_image" class="btn btn-default iframe-column-upload"  data-input-name="posmegamenu_bg_image" type="button">{l s='Select image' mod='posmegamenu'} <i class="icon-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="form-group bg-type-image {if $menu_config.posmegamenu_bg == 1 || $menu_config.posmegamenu_bg == 2}hidden{/if}">
            <label class="control-label col-lg-2" for="posmegamenu_bg_repeat">{l s='Background repeat' mod='posmegamenu'}</label>
            <div class="col-lg-10">
                <select id="posmegamenu_bg_repeat" name="posmegamenu_bg_repeat" class="form-control fixed-width-xl">
                    <option value="1" {if $menu_config.posmegamenu_bg_repeat == 1}selected="selected"{/if}>No repeat</option>
                    <option value="2" {if $menu_config.posmegamenu_bg_repeat == 2}selected="selected"{/if}>Repeat X</option>
                    <option value="3" {if $menu_config.posmegamenu_bg_repeat == 3}selected="selected"{/if}>Repeat Y</option>
                    <option value="4" {if $menu_config.posmegamenu_bg_repeat == 4}selected="selected"{/if}>Repeat XY</option>
                </select>
            </div>
        </div>
        <div class="form-group">
			<label class="control-label col-lg-2">{l s='Sticky menu' mod='posmegamenu'}</label>
			<div class="col-lg-10">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" name="posmegamenu_sticky" id="posmegamenu_sticky_on" value="1" {if (isset($menu_config.posmegamenu_sticky) &&  $menu_config.posmegamenu_sticky != 0) || !$menu_config.posmegamenu_sticky}checked="checked"{/if}>
					<label for="posmegamenu_sticky_on">Yes</label>
					<input type="radio" name="posmegamenu_sticky" id="posmegamenu_sticky_off" value="0" {if isset($menu_config.posmegamenu_sticky) && $menu_config.posmegamenu_sticky == 0}checked="checked"{/if}>
					<label for="posmegamenu_sticky_off">No</label>
					<a class="slide-button btn"></a>
				</span>	
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-lg-2">{l s='Center main menu' mod='posmegamenu'}</label>
			<div class="col-lg-10">
				<span class="switch prestashop-switch fixed-width-lg">
					<input type="radio" name="posmegamenu_center" id="posmegamenu_center_on" value="1" {if (isset($menu_config.posmegamenu_center) &&  $menu_config.posmegamenu_center != 0) || !$menu_config.posmegamenu_center}checked="checked"{/if}>
					<label for="posmegamenu_center_on">Yes</label>
					<input type="radio" name="posmegamenu_center" id="posmegamenu_center_off" value="0" {if isset($menu_config.posmegamenu_center) && $menu_config.posmegamenu_center == 0}checked="checked"{/if}>
					<label for="posmegamenu_center_off">No</label>
					<a class="slide-button btn"></a>
				</span>	
			</div>
		</div>
        <div class="form-group bg-type-image">
            <label class="control-label col-lg-2" for="posmegamenu_sub_animation">{l s='Submenu animation' mod='posmegamenu'}</label>
            <div class="col-lg-10">
                <select id="posmegamenu_sub_animation" name="posmegamenu_sub_animation" class="form-control fixed-width-xl">
                    <option value="1" {if $menu_config.posmegamenu_sub_animation == 1}selected="selected"{/if}>No animation</option>
                    <option value="2" {if $menu_config.posmegamenu_sub_animation == 2}selected="selected"{/if}>Slidedown</option>
                    <option value="3" {if $menu_config.posmegamenu_sub_animation == 3}selected="selected"{/if}>Slideup</option>
                    <option value="4" {if $menu_config.posmegamenu_sub_animation == 4}selected="selected"{/if}>Rotate Y</option>
                </select>
            </div>
        </div>
        
		<div class="form-group">
            <label class="control-label col-lg-2" for="posmegamenu_css">{l s='Custom CSS' mod='posmegamenu'}</label>
            <div class="col-lg-10">
                <textarea class="textarea-autosize"  name="posmegamenu_css" value="{$menu_config.posmegamenu_css}" id="posmegamenu_css" style="min-height: 200px;">{$menu_config.posmegamenu_css}</textarea>
            </div>
        </div>
        <div class="panel-footer">
			<button type="submit" value="1" id="module_form_submit_btn" name="submitMenu" class="btn btn-default pull-right">
				<i class="process-icon-save"></i> Save
			</button>
		</div>
	</form>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#posmegamenu_bg').change(function(){
	            posmenuChangeType();
	        });
	        $('.iframe-column-upload').fancybox({  
	            'width'     : 900,
	            'height'    : 600,
	            'type'      : 'iframe',
	            'autoScale' : false,
	            'autoDimensions': false,
	             'fitToView' : false,
	             'autoSize' : false,
	             onUpdate : function(){ 
	                 $('.fancybox-iframe').contents().find('a.link').data('field_id', $(this.element).data("input-name"));
	                 $('.fancybox-iframe').contents().find('a.link').attr('data-field_id', $(this.element).data("input-name"));
	                },
	             afterShow: function(){
	                 $('.fancybox-iframe').contents().find('a.link').data('field_id', $(this.element).data("input-name"));
	                 $('.fancybox-iframe').contents().find('a.link').attr('data-field_id', $(this.element).data("input-name"));
	            }
	          });
		})
		function posmenuChangeType(){
	        var val = $('#posmegamenu_bg').val();
	        switch(val){
	            case "1": // link
	                $('.bg-type-color, .bg-type-image').addClass('hidden');
	                break;

	            case "2": // integration
	                $('.bg-type-image').addClass('hidden');
	                $('.bg-type-color').removeClass('hidden');
	                break;

	            case "3": // js
	                $('.bg-type-color').addClass('hidden');
	                $('.bg-type-image').removeClass('hidden');
	                break;
	        }
	    }
	</script>
</div>