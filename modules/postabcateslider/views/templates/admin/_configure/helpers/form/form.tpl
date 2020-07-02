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
	{if $input.type == 'file_lang'}
		<div class="col-lg-9">
			{foreach from=$languages item=language}
				{if $languages|count > 1}
					<div class="translatable-field lang-{$language.id_lang}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
				{/if}
				<div class="form-group">
					<div class="col-lg-6">
						<input id="{$input.name}_{$language.id_lang}" type="file" name="{$input.name}_{$language.id_lang}" class="hide" />
						<div class="dummyfile input-group">
							<span class="input-group-addon"><i class="icon-file"></i></span>
							<input id="{$input.name}_{$language.id_lang}-name" type="text" class="disabled" name="filename" readonly />
						<span class="input-group-btn">
								<button id="{$input.name}_{$language.id_lang}-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
									<i class="icon-folder-open"></i> {l s='Choose a file' mod='blockbanner'}
								</button>
							</span>
						</div>
					</div>
					{if $languages|count > 1}
						<div class="col-lg-2">
							<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
								{$language.iso_code}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								{foreach from=$languages item=lang}
								<li><a href="javascript:hideOtherLanguage({$lang.id_lang});" tabindex="-1">{$lang.name}</a></li>
								{/foreach}
							</ul>
						</div>
					{/if}
				</div>
				<div class="form-group">
					{if isset($fields_value[$input.name][$language.id_lang]) && $fields_value[$input.name][$language.id_lang] != ''}
					<div id="{$input.name}-{$language.id_lang}-images-thumbnails" class="col-lg-12">
						<img src="{$uri}img/{$fields_value[$input.name][$language.id_lang]}" class="img-thumbnail"/>
					</div>
					{/if}
				</div>
				{if $languages|count > 1}
					</div>
				{/if}
				<script>
				$(document).ready(function(){
					$('#{$input.name}_{$language.id_lang}-selectbutton').click(function(e){
						$('#{$input.name}_{$language.id_lang}').trigger('click');
					});
					$('#{$input.name}_{$language.id_lang}').change(function(e){
						var val = $(this).val();
						var file = val.split(/[\\/]/);
						$('#{$input.name}_{$language.id_lang}-name').val(file[file.length-1]);
					});
				});
			</script>
			{/foreach}
			{if isset($input.desc) && !empty($input.desc)}
				<p class="help-block">
					{$input.desc}
				</p>
			{/if}
		</div>
	{else if $input.type == 'selectlist'}
		<div class="row"><div class="col-lg-6">
		<div id="category-block">
			<div class="panel" style="max-height: 300px; overflow: auto; background: #f5f5f5;">
				<ul class="cattree tree">
						{$options}
				</ul>
			</div>
		</div>
        </div> </div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#category-block ul.tree').hide();
				$('#category-block ul.tree.cattree').show();
				
				{if isset($cateCurrent)}
					{assign var=imploded_selected_categories value='","'|implode:$cateCurrent}					
					var cateCurrent = new Array("{$imploded_selected_categories}");
					$('#category-block').find(':input').each(function(){
						if ($.inArray($(this).val(), cateCurrent) != -1)
						{
							$(this).prop("checked", true);
							$(this).parent().addClass("tree-selected");
							$(this).parents('ul.tree').each(function(){
								$(this).show();
								$(this).prev().find('.icon-folder-close').removeClass('icon-folder-close').addClass('icon-folder-open');
							});
						};
						$(this).on("click", function(){
							var test= $(this).parent();						
							if (test.hasClass("tree-selected")){
								test.removeClass("tree-selected");
							}else{
								test.addClass("tree-selected");
							}
						})
					});
				{/if}
				
				$("#category-block .tree-folder-name i").each(function(){
					$(this).on("click", function(){
						if($(this).hasClass('icon-folder-close')){
							$(this).removeClass('icon-folder-close');
							$(this).addClass('icon-folder-open');	
						}else{
							$(this).removeClass('icon-folder-open');
							$(this).addClass('icon-folder-close');
						}
						$(this).parent().parent().children("ul.tree").slideToggle();
					})
				});
				$("#category-block .tree-folder-name label").each(function(){
					$(this).on("click", function(){
						if($(this).parent().find('i').hasClass('icon-folder-close')){
							$(this).parent().find('i').removeClass('icon-folder-close');
							$(this).parent().find('i').addClass('icon-folder-open');	
						}else{
							$(this).parent().find('i').removeClass('icon-folder-open');
							$(this).parent().find('i').addClass('icon-folder-close');
						}
						$(this).parent().parent().children("ul.tree").slideToggle();
						
					})
				})
				
			});
		</script>
	{else}
		{$smarty.block.parent}
	{/if}

{/block}
