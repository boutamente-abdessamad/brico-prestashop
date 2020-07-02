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

<form id="module_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&amp;configure=posmegamenu&amp;token={Tools::getAdminTokenLite('AdminModules')|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data" novalidate="">
<div class="panel"><h3><i class="icon-list-ul"></i> {l s='Menu Item' mod='posmegamenu'}</h3>
	<div class="form-wrapper" id="menuContent" >
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Title' mod='posmegamenu'}</label>
			<div class="col-lg-9">
				{foreach from=$languages item=language}
					{if $languages|count > 1}
						<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
					{/if}
					<div class="col-lg-6">
					<input type="text" class="title" id="title_{$language.id_lang|intval}" name="title_{$language.id_lang|intval}" value="{if isset($menu->title[$language.id_lang|intval])}{$menu->title[$language.id_lang|intval]}{else}menu title{/if}"/>
					</div>
					{if $languages|count > 1}
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								{$language.iso_code|escape:'html':'UTF-8'}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								{foreach from=$languages item=lang}
								<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});javascript:changeLangInfor({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
								{/foreach}
							</ul>
						</div>
					{/if}
					{if $languages|count > 1}
						</div>
					{/if}
				{/foreach}
				<p class="help-block" style="clear:both;">{l s='>>> If use Prestashop link and want to use Prestashop title, leave it empty.' mod='posmegamenu'}</p>
			</div>
		</div>
		<div class="form-group lab-type-link">
			<label class="control-label col-lg-3">{l s='Type Link' mod='posmegamenu'}</label>
			<div class="col-lg-9">
				<select id="type_link" name="type_link" class="form-control fixed-width-xl" data-default="0">
	                <option value="0" {if $menu->type_link == 0}selected="selected" {/if}>{l s='PrestaShop Link' mod='posmegamenu'}</option>
	                <option value="1" {if $menu->type_link == 1}selected="selected" {/if}>{l s='Custom Link' mod='posmegamenu'}</option>
	                <option value="2" {if $menu->type_link == 2}selected="selected" {/if}>{l s='None' mod='posmegamenu'}</option>
	            </select>
			</div>
		</div>
		
		<div class="form-group custom_link">
			<label class="control-label col-lg-3">{l s='Custom link' mod='posmegamenu'}</label>
			<div class="col-lg-9">
				{foreach from=$languages item=language}
					{if $languages|count > 1}
						<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
					{/if}
					<div class="col-lg-6">
					<input type="text" id="custom_link_{$language.id_lang|intval}" name="custom_link_{$language.id_lang|intval}" value="{if isset($menu->custom_link[$language.id_lang|intval])}{$menu->custom_link[$language.id_lang|intval]}{else}#{/if}"/>
					</div>
					{if $languages|count > 1}
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								{$language.iso_code|escape:'html':'UTF-8'}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								{foreach from=$languages item=lang}
								<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});javascript:changeLangInfor({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
								{/foreach}
							</ul>
						</div>
					{/if}
					{if $languages|count > 1}
						</div>
					{/if}
				{/foreach}
			</div>
		</div>
		<div class="form-group ps_link">
			<label class="control-label col-lg-3">{l s='PrestaShop Link' mod='posmegamenu'}</label>
			<div class="col-lg-9">
				<select class="form-control fixed-width-xl" name="link" id="link">
					{$all_options|escape:'quotes':'UTF-8'}
				</select>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#link").val('{$menu->link}');
					});
				</script>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">{l s='Sub Title' mod='posmegamenu'}</label>
			<div class="col-lg-9">
				{foreach from=$languages item=language}
					{if $languages|count > 1}
						<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
					{/if}
					<div class="col-lg-6">
					<input type="text" class="subtitle" id="subtitle_{$language.id_lang|intval}" name="subtitle_{$language.id_lang|intval}" value="{if $menu->subtitle[$language.id_lang|intval]}{$menu->subtitle[$language.id_lang|intval]}{/if}"/>
					</div>
					{if $languages|count > 1}
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								{$language.iso_code|escape:'html':'UTF-8'}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								{foreach from=$languages item=lang}
								<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});javascript:changeLangInfor({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
								{/foreach}
							</ul>
						</div>
					{/if}
					{if $languages|count > 1}
						</div>
					{/if}
				{/foreach}
			</div>
		</div>
		<div class="form-group lab-type-icon">
			<label class="control-label col-lg-3">{l s='Use icon' mod='posmegamenu'}</label>
			<div class="col-lg-9">
				<select id="type_icon" name="type_icon" class="form-control fixed-width-xl" data-default="0">
	                <option value="0" {if $menu->type_icon == 0}selected="selected" {/if}>{l s='No' mod='posmegamenu'}</option>
	                <option value="1" {if $menu->type_icon == 1}selected="selected" {/if}>{l s='Font-Awesome Icon' mod='posmegamenu'}</option>
	                <option value="2" {if $menu->type_icon == 2}selected="selected" {/if}>{l s='Image Icon' mod='posmegamenu'}</option>
	            </select>
			</div>
		</div>
		
		<div class="form-group lab-fw-icon">
			<label class="control-label col-lg-3">{l s='Font-Awesome Icon' mod='posmegamenu'}</label>
			<div class="col-lg-9">
				<input type="text" class="icon_class fixed-width-xl" id="icon_class" name="icon_class" value="{$menu->icon_class|escape:'html':'UTF-8'}"/>
				<p>{l s='Put class icon of Font-Awesome at :' mod='posmegamenu'} <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/">http://fortawesome.github.io/Font-Awesome/3.2.1/icons/.</a> ex: <span>&lt;i class="</span>fab fa-angellist<span>"&gt;&lt;/i&gt;</span></p> 
			</div>
		</div>
		<div class="form-group lab-img-icon">
			<label class="control-label col-lg-3">{l s='Image Icon' mod='posmegamenu'}</label>
			<div class="col-lg-9">
                <div class="col-lg-7">
                    <input type="text" id="icon_img" name="icon_img" value="{if $menu->icon}{$menu->icon}{/if}"/>
                    <a href="filemanager/dialog.php?type=1&field_id=icon_img" class="btn btn-default iframe-column-upload"  data-input-name="icon_img" type="button">{l s='Select image' mod='posmegamenu'} <i class="icon-angle-right"></i></a>
                    {if $menu->icon}<img src="{$menu->icon}" style="display: block; max-width: 200px;"/>{/if}
                </div>
            </div>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-1" for="">{l s='Main link style' mod='posmegamenu'}</label>
		<div class="col-lg-11">
			<div class="row">
				
				<div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="color">{l s='Color' mod='posmegamenu'}</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="link_color" value="{if $menu->item_color}{$menu->item_color}{/if}" id="link_color" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="color_hover">{l s='Color hover' mod='posmegamenu'}</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="color_hover" value="{if $menu->item_colorh}{$menu->item_colorh}{/if}" id="color_hover" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="fontsize">{l s='Font size' mod='posmegamenu'}</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="fontsize" value="{if $menu->item_fontsize}{$menu->item_fontsize}{/if}" id="fontsize" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="lineheight">{l s='Line height' mod='posmegamenu'}</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="lineheight" value="{if $menu->item_lineheight}{$menu->item_lineheight}{/if}" id="lineheight" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2" style="width: 20%;">
			        <label class="control-label col-lg-6" for="transform">{l s='Text transform' mod='posmegamenu'}</label>
			        <div class="col-lg-6">
			            <select id="transform" name="transform" class="form-control" data-default="0">
			                <option value="0" {if $menu->item_transform == 0}selected="selected" {/if}>{l s='none' mod='posmegamenu'}</option>
			                <option value="1" {if $menu->item_transform == 1}selected="selected" {/if}>{l s='UPPERCASE' mod='posmegamenu'}</option>
			                <option value="2" {if $menu->item_transform == 2}selected="selected" {/if}>{l s='Capitalize' mod='posmegamenu'}</option>
			            </select>
			        </div>
			    </div>
	            <div style="clear:both;"></div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="bgcolor">{l s='Background color' mod='posmegamenu'}</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="bgcolor" value="{if $menu->item_bg_color}{$menu->item_bg_color}{/if}" id="bgcolor" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="bgcolor_hover">{l s='Background hover' mod='posmegamenu'}</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="bgcolor_hover" value="{if $menu->item_bg_colorh}{$menu->item_bg_colorh}{/if}" id="bgcolor_hover" type="color">
	                    </div>
	                </div>
	            </div>
	            
	            
	            
		    </div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<div class="form-group">
		<label class="control-label col-lg-1" for="">{l s='Subtitle style' mod='posmegamenu'}</label>
		<div class="col-lg-11">
			<div class="row">
				
				<div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="subtitle_color">{l s='Color' mod='posmegamenu'}</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="subtitle_color" value="{if $menu->subtitle_color}{$menu->subtitle_color}{/if}" id="subtitle_color" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-3" style="width: 23%;">
	                <label class="control-label col-lg-4" for="subtitle_bgcolor">{l s='Background color' mod='posmegamenu'}</label>
	                <div class="col-lg-8">
	                    <div class="input-group">
	                        <input data-hex="true" class="color mColorPickerInput mColorPicker" data-default="" data-serializable="true" name="subtitle_bgcolor" value="{if $menu->subtitle_bg_color}{$menu->subtitle_bg_color}{/if}" id="subtitle_bgcolor" type="color">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="subtitle_fontsize">{l s='Font size' mod='posmegamenu'}</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="subtitle_fontsize" value="{if $menu->subtitle_fontsize}{$menu->subtitle_fontsize}{/if}" id="subtitle_fontsize" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2">
	                <label class="control-label col-lg-6" for="subtitle_lineheight">{l s='Line height' mod='posmegamenu'}</label>
	                <div class="col-lg-6">
	                    <div class="input-group">
	                        <input class="" data-default="" data-serializable="true" name="subtitle_lineheight" value="{if $menu->subtitle_lineheight}{$menu->subtitle_lineheight}{/if}" id="subtitle_lineheight" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group col-lg-2" style="width: 20%;">
			        <label class="control-label col-lg-6" for="subtitle_transform">{l s='Text transform' mod='posmegamenu'}</label>
			        <div class="col-lg-6">
			            <select id="subtitle_transform" name="subtitle_transform" class="form-control" data-default="0">
			                <option value="0" {if $menu->subtitle_transform == 0}selected="selected" {/if}>{l s='none' mod='posmegamenu'}</option>
			                <option value="1" {if $menu->subtitle_transform == 1}selected="selected" {/if}>{l s='UPPERCASE' mod='posmegamenu'}</option>
			                <option value="2" {if $menu->subtitle_transform == 2}selected="selected" {/if}>{l s='Capitalize' mod='posmegamenu'}</option>
			            </select>
			        </div>
			    </div>
		    </div>
		</div>
	</div>
	<div class="form-group" id="item_type_form">
        <label class="control-label col-lg-3" for="submenu_type">{l s='Submenu type' mod='posmegamenu'}</label>
        <div class="col-lg-9">
            <select id="submenu_type" name="submenu_type" class="form-control fixed-width-lg" data-default="1">
                <option value="0" {if $menu->submenu_type == 0}selected="selected" {/if}>{l s='Mega' mod='posmegamenu'}</option>
                <option value="1" {if $menu->submenu_type == 1}selected="selected" {/if}>{l s='Flyout' mod='posmegamenu'}</option>
                <option value="2" {if $menu->submenu_type == 2}selected="selected" {/if}>{l s='None' mod='posmegamenu'}</option>
            </select>
            <p class="help-block">{l s='Flyout only is available when you select category in Type Link' mod='posmegamenu'}</p>
        </div>
    </div>
	<div class="form-group">
		<label class="control-label col-lg-3">{l s='Add specific class' mod='posmegamenu'}</label>
		<div class="col-lg-9">
			<input type="text" class="item_class" id="item_class" name="item_class" value="{if $menu->item_class}{$menu->item_class|escape:'html':'UTF-8'}{/if}"/>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3">{l s='New window' mod='posmegamenu'}</label>
		<div class="col-lg-9">
			<span class="switch prestashop-switch fixed-width-lg">
				<input type="radio" name="new_window" id="new_window_on" value="1" {if (isset($menu->new_window) &&  $menu->new_window != 0) }checked="checked"{/if}>
				<label for="new_window_on">Yes</label>
				<input type="radio" name="new_window" id="new_window_off" value="0" {if (isset($menu->new_window) && $menu->new_window == 0)|| !$menu->new_window}checked="checked"{/if}>
				<label for="new_window_off">No</label>
				<a class="slide-button btn"></a>
			</span>	
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-3">{l s='Active' mod='posmegamenu'}</label>
		<div class="col-lg-9">
			<span class="switch prestashop-switch fixed-width-lg">
				<input type="radio" name="active" id="active_on" value="1" {if (isset($menu->active) &&  $menu->active != 0) || !$menu->active}checked="checked"{/if}>
				<label for="active_on">Yes</label>
				<input type="radio" name="active" id="active_off" value="0" {if isset($menu->active) && $menu->active == 0}checked="checked"{/if}>
				<label for="active_off">No</label>
				<a class="slide-button btn"></a>
			</span>	
		</div>
	</div>
	
	<div class="panel-footer">
		<input type="hidden" name="id_posmegamenu_item" id="id_posmegamenu_item" value="{if isset($menu->id)}{$menu->id|intval}{/if}"/>
		<button type="submit" value="1" id="module_form_submit_btn" name="submitMenuItem" class="btn btn-default pull-right">
			<i class="process-icon-save"></i> Save
		</button>
		<a href="index.php?controller=AdminModules&amp;configure=posmegamenu&amp;token={$token|escape:'html':'UTF-8'}" class="btn btn-default">
		<i class="process-icon-back"></i> Back to list</a>
	</div>
	
</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
        $('#type_icon').change(function(){
            ItemChangeTypeIcon();
        });
        $('#type_link').change(function(){
            ItemChangeTypeLink();
        });
        ItemChangeTypeIcon();
        ItemChangeTypeLink();
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
    });

    function ItemChangeTypeIcon(){
        var val = $('#type_icon').val();
        switch(val){
            case "0": // none
                $('.lab-fw-icon,.lab-img-icon').addClass('hidden');
                break;

            case "1": // integration
                $('.lab-img-icon').addClass('hidden');
                $('.lab-fw-icon').removeClass('hidden');
                break;

            case "2": // js
                $('.lab-fw-icon').addClass('hidden');
                $('.lab-img-icon').removeClass('hidden');
                break;
        }
    }
    function ItemChangeTypeLink(){
        var val = $('#type_link').val();
        switch(val){
            case "0": // none
                $('.custom_link').addClass('hidden');
                $('.ps_link').removeClass('hidden');
                break;

            case "1": // integration
                $('.ps_link').addClass('hidden');
                $('.custom_link').removeClass('hidden');
                break;

            case "2": // js
                $('.ps_link, .custom_link').addClass('hidden');
                break;
        }
    }
</script>
<style>
	#menuContent > div.form-group {
		margin-bottom: 20px;
	} 
</style>