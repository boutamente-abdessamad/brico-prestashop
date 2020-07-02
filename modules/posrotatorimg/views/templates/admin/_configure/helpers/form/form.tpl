{*
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{extends file="helpers/form/form.tpl"}
{block name="field"}
	{if $input.type == 'text'}											
	<div class="col-lg-{if isset($input.col)}{$input.col|intval}{else}9{/if}{if !isset($input.label)} col-lg-offset-3{/if}">			
		{if isset($input.lang) AND $input.lang}
		
		{if isset($input.maxchar) && $input.maxchar}
		<script type="text/javascript">
		$(document).ready(function(){
		{foreach from=$languages item=language}
			countDown($("#{if isset($input.id)}{$input.id}_{$language.id_lang}{else}{$input.name}_{$language.id_lang}{/if}"), $("#{if isset($input.id)}{$input.id}_{$language.id_lang}{else}{$input.name}_{$language.id_lang}{/if}_counter"));
		{/foreach}
		});
		</script>
		{/if}
		
		{else}
			
			{assign var='value_text' value=$fields_value[$input.name]}
			{if isset($input.maxchar) || isset($input.prefix) || isset($input.suffix)}
			<div class="input-group{if isset($input.class)} {$input.class}{/if}">
			{/if}
			{if isset($input.maxchar) && $input.maxchar}
			<span id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}_counter" class="input-group-addon"><span class="text-count-down">{$input.maxchar|intval}</span></span>
			{/if}
			{if isset($input.prefix)}
			<span class="input-group-addon">
			  {$input.prefix}
			</span>
			{/if}
			<input type="text"
				name="{$input.name}"
				id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}"
				value="{if isset($input.string_format) && $input.string_format}{$value_text|string_format:$input.string_format|escape:'html':'UTF-8'}{else}{$value_text|escape:'html':'UTF-8'}{/if}"
				class="{if isset($input.class)}{$input.class}{/if}"
				{if isset($input.size)} size="{$input.size}"{/if}
				{if isset($input.maxchar) && $input.maxchar} data-maxchar="{$input.maxchar|intval}"{/if}
				{if isset($input.maxlength) && $input.maxlength} maxlength="{$input.maxlength|intval}"{/if}
				{if isset($input.readonly) && $input.readonly} readonly="readonly"{/if}
				{if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}
				{if isset($input.autocomplete) && !$input.autocomplete} autocomplete="off"{/if}
				{if isset($input.required) && $input.required } required="required" {/if}
				{if isset($input.placeholder) && $input.placeholder } placeholder="{$input.placeholder}"{/if}
				/>
			{if isset($input.suffix)}
			<span class="input-group-addon">
			  {$input.suffix}
			</span>
			{/if}

			{if isset($input.maxchar) || isset($input.prefix) || isset($input.suffix)}
			</div>
			{/if}
			{if isset($input.maxchar) && $input.maxchar}
			<script type="text/javascript">
			$(document).ready(function(){
				countDown($("#{if isset($input.id)}{$input.id}{else}{$input.name}{/if}"), $("#{if isset($input.id)}{$input.id}{else}{$input.name}{/if}_counter"));
			});
			</script>
			{/if}
		{/if}
		{block name="description"}
			{if isset($input.desc) && !empty($input.desc)}
				<p class="help-block">
					{if is_array($input.desc)}
						{foreach $input.desc as $p}
							{if is_array($p)}
								<span id="{$p.id}">{$p.text}</span><br />
							{else}
								{$p}<br />
							{/if}
						{/foreach}
					{else}
						{$input.desc}
					{/if}
				</p>
			{/if}
		{/block}
		<script type="text/javascript">
			var handle_font_style = function(){
				{literal}	
				$('#image-box').removeClass();
			    var animation_style = $('#posrotatorimg_animation').val();
			    var animation_time = $('#posrotatorimg_time').val();
			    var animation1 = "an1";
			    var animation2 = "an2";
			    var animation3 = "an3";
			    var animation4 = "an4";
			    var animation5 = "an5";
			    var animation6 = "an6";
			    var animation7 = "an7";
			    var animation8 = "an8";
			    var animation9 = "an9";
			    var animation10 = "an10";
			    var animation11 = "an11";
			    var style;
			   switch(animation_style){
			        case "1":
			            style = animation1;
			            break;
			        case "2":
			            style = animation2;
			            break;
			        case "3":
			            style = animation3;   
			            break;
			        case "4":
			            style = animation4;   
			            break;
			        case "5":
			            style = animation5;   
			            break;
			        case "6":
			            style = animation6;
			            break;   
			        case "7":
			            style = animation7; 
			            break;  
			        case "8":
			            style = animation8; 
			            break;  
			        case "9":
			            style = animation9;  
			            break; 
			        case "10":
			            style = animation11; 
			            break;
			        case "11":
			            style = animation10; 
			            break;  

			   };
			   $('#image-box').addClass(style);
			    {/literal}
			};
		</script>
	</div>
									
	{else}
		{$smarty.block.parent}
	{/if}

{/block}
