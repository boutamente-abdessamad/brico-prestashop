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
		<div class="row">
			{foreach from=$languages item=language}
				{if $languages|count > 1}
					<div class="translatable-field lang-{$language.id_lang}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
				{/if}
					<div class="col-lg-6">
						{if isset($fields[0]['form']['images'])}
						<img src="{$image_baseurl}{$fields[0]['form']['images'][$language.id_lang]}" class="img-thumbnail" />
						{/if}
						<div class="dummyfile input-group">
							<input id="{$input.name}_{$language.id_lang}" type="file" name="{$input.name}_{$language.id_lang}" class="hide-file-upload" />
							<span class="input-group-addon"><i class="icon-file"></i></span>
							<input id="{$input.name}_{$language.id_lang}-name" type="text" class="disabled" name="filename" readonly />
							<span class="input-group-btn">
								<button id="{$input.name}_{$language.id_lang}-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
									<i class="icon-folder-open"></i> {l s='Choose a file' mod='posslideshows'}
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
		</div>
	{elseif $input.type == 'custom_des'}
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		{foreach $languages as $lang}
			  <li class="nav-item" style="margin-left:3px;">
			    <a class="nav-link" href="#{$lang['iso_code']}" data-toggle="tab" role="tab">{$lang['name']}</a>
			  </li>
		{/foreach}
		</ul>
		<div class="tab-content" id="myTabContent">
		{foreach $languages as $lang}
		<div class="tab-pane fade" id="{$lang['iso_code']}" role="tabpanel">
        <div class="row">
          <div class="col-lg-9 col-lg-offset-3">
            <div class="panel">
              <table class="table js-custom-links-table-{$lang['id_lang']}">
                <thead>
                <tr>
                  <th></th>
                  <th>{l s='Name' mod='posslideshows'}</th>
                  <th>{l s='Group display' mod='posslideshows'}</th>
                  <th>{l s='Animation' mod='posslideshows'}</th>
                </tr>
                </thead>
                <tbody>
                <tr class="js-custom-link-row-template-{$lang['id_lang']}" data-item="0" style="display: none">
                  <td class="col-md-1"><a href="#" class="js-clear-custom-link" style="display: none"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                  <td class="col-md-7">
                      <input type="text" name="description[{$lang['id_lang']}][0][title]"/>
                  </td>
                  <td class="col-md-2">
                        <select name="description[{$lang['id_lang']}][0][display]">
                        	<option value="0">h2 tag</option>
                        	<option value="1">h3 tag</option>
                        	<option value="2">h4 tag</option>
                        	<option value="3">h5 tag</option>
                        	<option value="4">p tag</option>
                        	<option value="5">button</option>
                        </select>
                  </td>
                  <td class="col-md-2">
                        <select name="description[{$lang['id_lang']}][0][animation]">
                        	<option value="0">bounceIn</option>
                        	<option value="1">bounceInDown</option>
                        	<option value="2">bounceInLeft</option>
                        	<option value="3">bounceInRight</option>
                        	<option value="4">bounceInUp</option>	
							<option value="5">fadeIn</option>
                        	<option value="6">fadeInDown</option>
                        	<option value="7">fadeInLeft</option>
                        	<option value="8">fadeInRight</option>
                        	<option value="9">fadeInUp</option>
							<option value="10">zoomIn</option>
                        	<option value="11">zoomInDown</option>
                        	<option value="12">zoomInLeft</option>
                        	<option value="13">zoomInRight</option>
                        	<option value="14">zoomInUp</option>	
							<option value="15">rotateIn</option>
                        	<option value="16">rotateInDownLeft</option>
                        	<option value="17">rotateInDownRight</option>
                        	<option value="18">rotateInUpLeft</option>
                        	<option value="19">rotateInUpRight</option>
							<option value="20">pulse</option>
                        	<option value="21">flipInX</option>
                        	<option value="22">jackInTheBox</option>
                        	<option value="23">rollIn</option>
                        </select>
                  </td>
                </tr>
                {foreach $input.values[$lang['id_lang']] as $key => $page}
                  <tr {if $key%2}class="alt_row"{/if} data-item="{$key}" class="test">
                    <td><a href="#" class="js-clear-custom-link"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                    <td>
                        <input type="text" name="description[{$lang['id_lang']}][{$key}][title]" value="{$page.title}"/>
                    </td>
                    <td>
                        <select name="description[{$lang['id_lang']}][{$key}][display]">						
                        	<option value="0" {if $page.display == 0}selected="selected"{/if}>h2 tag</option>
                        	<option value="1" {if $page.display == 1}selected="selected"{/if}>h3 tag</option>
							<option value="2" {if $page.display == 2}selected="selected"{/if}>h4 tag</option>
                        	<option value="3" {if $page.display == 3}selected="selected"{/if}>h5 tag</option>
							<option value="4" {if $page.display == 4}selected="selected"{/if}>p tag</option>
                        	<option value="5" {if $page.display == 5}selected="selected"{/if}>button</option>
                        </select>
                    </td>
                    <td>
                        <select name="description[{$lang['id_lang']}][{$key}][animation]">
							<option value="0" {if $page.animation == 0}selected="selected"{/if}>bounceIn</option>
                        	<option value="1" {if $page.animation == 1}selected="selected"{/if}>bounceInDown</option>
                        	<option value="2" {if $page.animation == 2}selected="selected"{/if}>bounceInLeft</option>
                        	<option value="3" {if $page.animation == 3}selected="selected"{/if}>bounceInRight</option>
                        	<option value="4" {if $page.animation == 4}selected="selected"{/if}>bounceInUp</option>	
							<option value="5" {if $page.animation == 5}selected="selected"{/if}>fadeIn</option>
                        	<option value="6" {if $page.animation == 6}selected="selected"{/if}>fadeInDown</option>
                        	<option value="7" {if $page.animation == 7}selected="selected"{/if}>fadeInLeft</option>
                        	<option value="8" {if $page.animation == 8}selected="selected"{/if}>fadeInRight</option>
                        	<option value="9" {if $page.animation == 9}selected="selected"{/if}>fadeInUp</option>
							<option value="10" {if $page.animation == 10}selected="selected"{/if}>zoomIn</option>
                        	<option value="11" {if $page.animation == 11}selected="selected"{/if}>zoomInDown</option>
                        	<option value="12" {if $page.animation == 12}selected="selected"{/if}>zoomInLeft</option>
                        	<option value="13" {if $page.animation == 13}selected="selected"{/if}>zoomInRight</option>
                        	<option value="14" {if $page.animation == 14}selected="selected"{/if}>zoomInUp</option>	
							<option value="15" {if $page.animation == 15}selected="selected"{/if}>rotateIn</option>
                        	<option value="16" {if $page.animation == 16}selected="selected"{/if}>rotateInDownLeft</option>
                        	<option value="17" {if $page.animation == 17}selected="selected"{/if}>rotateInDownRight</option>
                        	<option value="18" {if $page.animation == 18}selected="selected"{/if}>rotateInUpLeft</option>
                        	<option value="19" {if $page.animation == 19}selected="selected"{/if}>rotateInUpRight</option>
							<option value="20" {if $page.animation == 20}selected="selected"{/if}>pulse</option>
                        	<option value="21" {if $page.animation == 21}selected="selected"{/if}>flipInX</option>
                        	<option value="22" {if $page.animation == 22}selected="selected"{/if}>jackInTheBox</option>
                        	<option value="23" {if $page.animation == 23}selected="selected"{/if}>rollIn</option>    	
                        </select>
                    </td>
                  </tr>
                {/foreach}
                </tbody>
              </table>
              <div class="panel-footer">
                <a href="#" class="js-add-custom-link-{$lang['id_lang']} btn btn-default pull-right"><i class="process-icon-new"></i>{l s='Add' d='Admin.Actions'}</a>
              </div>
            </div>
          </div>
        </div>

        <script type="application/javascript">
          $(document).ready(function() {
          	$('#myTab li').eq(0).addClass('active');
          	$('#myTabContent .tab-pane').eq(0).addClass('active').addClass('in');
            function clearCustomLink () {
              $(this).closest('tbody').find('tr:last-of-type > td > a.js-clear-custom-link').hide();
              $(this).closest('tr').remove();

              return false;
            }

            $('a.js-clear-custom-link').click(clearCustomLink);

            function addCustomTextRow() {
              var tbody = $('table.js-custom-links-table-{$lang['id_lang']} > tbody');
              var lastTr = tbody.find('tr:last-of-type');
              var i = lastTr ? lastTr.data('item') + 1 : 0;

              tbody.find('tr:nth-last-of-type(2) > td > a').show();

              var tpl = $('tr.js-custom-link-row-template-{$lang['id_lang']}').clone();
              tpl.removeClass('js-custom-link-row-template-{$lang['id_lang']}');
              tpl.data('item', i);

              tpl.find('td:nth-of-type(2) input').attr('name', 'description[{$lang['id_lang']}][' + i + '][title]');
              tpl.find('td:nth-of-type(3) select').attr('name', 'description[{$lang['id_lang']}][' + i + '][display]');
              tpl.find('td:nth-of-type(4) select').attr('name', 'description[{$lang['id_lang']}][' + i + '][animation]');
              tpl.find('a.js-clear-custom-link').click(clearCustomLink);
              tpl.show();
              tbody.append(tpl);

              tbody.find('tr > td > a.js-clear-custom-link').show();
              tbody.find('tr:last-of-type > td > a.js-clear-custom-link').hide();
            }

            addCustomTextRow();

            $('a.js-add-custom-link-{$lang['id_lang']}').click(function () {
              addCustomTextRow();

              return false;
            });
          });
        </script>
       </div>
      {/foreach}
      </div>
	{/if}
	{$smarty.block.parent}
{/block}