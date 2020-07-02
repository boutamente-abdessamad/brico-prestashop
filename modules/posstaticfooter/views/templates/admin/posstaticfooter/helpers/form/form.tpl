{*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{extends file="helpers/form/form.tpl"}
{block name="script"}

$(document).ready(function() {
  var control = $("#type_content");

  if (control.val() == 0)
  {
  $(".list_links").removeClass('hidden');
  $(".custom_content").addClass('hidden');
  }

  if (control.val() == 1) {
  $(".list_links").addClass('hidden');
  $(".custom_content").removeClass('hidden');
  }



  $("#type_content").change(function() {
    var control = $(this);

  if (control.val() == 0)
  {
  $(".list_links").removeClass('hidden');
  $(".custom_content").addClass('hidden');
  }

  if (control.val() == 1) {
  $(".list_links").addClass('hidden');
  $(".custom_content").removeClass('hidden');
  }
  });
});
{/block}
{block name="label"}
    {if $input.type == 'link_blocks'}

    {else}
        {$smarty.block.parent}
    {/if}
{/block}

{block name="legend"}
    <h3>
        {if isset($field.image)}<img src="{$field.image}" alt="{$field.title|escape:'html':'UTF-8'}" />{/if}
        {if isset($field.icon)}<i class="{$field.icon}"></i>{/if}
        {$field.title}
        <span class="panel-heading-action">
            {foreach from=$toolbar_btn item=btn key=k}
                {if $k != 'modules-list' && $k != 'back'}
                    <a id="desc-{$table}-{if isset($btn.imgclass)}{$btn.imgclass}{else}{$k}{/if}" class="list-toolbar-btn" {if isset($btn.href)}href="{$btn.href}"{/if} {if isset($btn.target) && $btn.target}target="_blank"{/if}{if isset($btn.js) && $btn.js}onclick="{$btn.js}"{/if}>
                        <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="{l s=$btn.desc}" data-html="true">
                            <i class="process-icon-{if isset($btn.imgclass)}{$btn.imgclass}{else}{$k}{/if} {if isset($btn.class)}{$btn.class}{/if}" ></i>
                        </span>
                    </a>
                {/if}
            {/foreach}
            </span>
    </h3>
{/block}

{block name="input_row"}
  {if isset($input.preffix_wrapper)}<div class="{$input.preffix_wrapper}">{/if}
    {if $input.type == 'link_blocks'}
      <div class="container">
        <div class="row">
            <script type="text/javascript">
                var come_from = '{$name_controller}';
                var token = '{$token}';
                var alternate = 1;
            </script>
            {foreach $input.values as $key => $link_blocks_position name='blocksLoop'}
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            {$link_blocks_position.hook_name}
                             <small>{$link_blocks_position.hook_title}</small>
                        </div>
                        <div class="cms" id="link_block_{$key}">
                          {foreach $link_blocks_position.blocks as $link_block}
                            <div class="pos-block col-sm-{$link_block.width}" id="footerblock_{$link_block['id_posstaticfooter']}">
                              <div class="block-container" style="border: 1px solid #ccc;">
                                <div class="panel-position">
                                  <i class="icon icon-arrows"></i>
                                </div>
                                <div class="panel-content">
                                  <div class="btn-group-action">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-default" href="{$current}&amp;edit{$identifier}&amp;id_posstaticfooter={(int)$link_block['id_posstaticfooter']}" title="{l s='Edit' d='Modules.Linklist.Admin'}">
                                            <i class="icon-edit"></i> {l s='Edit' d='Modules.Linklist.Admin'}
                                        </a>
                                        <a class="btn btn-default" href="{$current}&amp;delete{$identifier}&amp;id_posstaticfooter={(int)$link_block['id_posstaticfooter']}" title="{l s='Delete' d='Modules.Linklist.Admin'}">
                                            <i class="icon-trash"></i> {l s='Delete' d='Modules.Linklist.Admin'}
                                        </a>
                                    </div>
                                  </div>
                                  <h4>{$link_block['block_name']}</h4>
                                </div>
                              </div>
                            </div>
                          {/foreach}
                        </div>
                        
                    </div>
                </div>
                {if $smarty.foreach.blocksLoop.index%2}<div class="clearfix"></div>{/if}
                <script type="text/javascript">
                  var $myColumns = $("#link_block_{$key}");
                  $myColumns.sortable({
                    opacity: 0.9,
                    cursor: "move",
                    start: function(){
                      $(this).css('background','#f1f1f1');
                    },
                    stop: function(){
                      $(this).css('background','#ffffff');
                    },
                    update: function() {
                      var order1 = $(this).sortable("serialize") + "&action=updatePositions";
                      $.post("{$base_url|escape:'html':'UTF-8'}/index.php?controller=AdminStaticFooter&token={$token}", order1);
                      }
                    });
                  $myColumns.hover(function() {
                    $(this).css("cursor","move");
                    },
                    function() {
                    $(this).css("cursor","auto");
                  });
                </script>
            {/foreach}
        </div>
      </div>
      
      <style>
        .panel {
          float: left;
          width: 100%;
        }
        .block-container {
          border: 1px solid #ccc;
          float: left;
          width: 100%;
          position: relative;
          background: #f1f1f1;
        }
        .block-container .panel-position {
          float: left;
          width: 35px;
        }
        .block-container .panel-position i {
          padding-left: 10px;
          position: absolute;
          top: 50%;
          margin-top: -6px;
        }
        .panel-content {
          margin-left: 36px;
          border-left: 1px solid #ccc;
          background: #fff;
        }
        .block-container h4 {
          margin: 0;
          clear: both;
          padding: 10px 0 10px 10px;
        }
        .block-container .btn-group-action {
          float: right;
          clear:both;
          width: 100%;
          border-bottom: 1px dotted #ccc;
          padding: 5px;
        }
        .block-container .btn-group-action a:first-child {
          margin-right: 5px !important;
        }
      </style>
    {elseif $input.type == 'cms_pages'}
    {foreach $input.values as $cms_category}
      <div class="row">
        <div class="col-lg-9 col-lg-offset-3">
          <div class="panel">
            <div class="panel-heading">
              {$input.label} - {$cms_category.name}
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>
                    <input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, '{$input.name}', this.checked)" />
                  </th>
                  <th>{l s='ID' d='Modules.Linklist.Admin'}</th>
                  <th>{l s='Name' d='Modules.Linklist.Admin'}</th>
                </tr>
              </thead>
              <tbody>
                {foreach $cms_category.pages as $key => $page}
                  <tr {if $key%2}class="alt_row"{/if}>
                    <td>
                      <input type="checkbox" class="cmsBox" name="{$input.name}" id="{$page.id_cms}" value="{$page.id_cms}" {if in_array($page.id_cms, $fields_value['content']['cms'])}checked="checked"{/if} />
                    </td>
                    <td class="fixed-width-xs">
                      {$page.id_cms}
                    </td>
                    <td>
                      <label class="control-label" for="{$page.id_cms}">
                        {$page.title|escape}
                      </label>
                    </td>
                  </tr>
                {/foreach}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    {/foreach}

    {elseif $input.type == 'product_pages' || $input.type == 'static_pages'}

      {foreach $input.values as $cms_category}
        <div class="row">
          <div class="col-lg-9 col-lg-offset-3">
            <div class="panel">
              <div class="panel-heading">
                {$input.label}
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, '{$input.name}', this.checked)" />
                    </th>
                    <th>{l s='Name' d='Modules.Linklist.Admin'}</th>
                  </tr>
                </thead>
                <tbody>
                  {foreach $cms_category.pages as $key => $page}
                    <tr {if $key%2}class="alt_row"{/if}>
                      <td>
                        {if $input.type == 'product_pages'}
                          <input type="checkbox" class="cmsBox" name="{$input.name}" id="{$page.id_cms}" value="{$page.id_cms}" {if in_array($page.id_cms, $fields_value['content']['product'])}checked="checked"{/if} />
                        {elseif $input.type == 'static_pages'}
                          <input type="checkbox" class="cmsBox" name="{$input.name}" id="{$page.id_cms}" value="{$page.id_cms}" {if in_array($page.id_cms, $fields_value['content']['static'])}checked="checked"{/if} />
                        {/if}
                      </td>
                      <td>
                        <label class="control-label" for="{$page.id_cms}">
                          {$page.title|escape}
                        </label>
                      </td>
                    </tr>
                  {/foreach}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      {/foreach}

    {elseif $input.type == 'custom_pages'}

      {foreach $languages as $lang}
        <div class="row">
          <div class="col-lg-9 col-lg-offset-3">
            <div class="panel">
              <div class="panel-heading">
                {$input.label} - {$lang['name']}
              </div>
              <table class="table js-custom-links-table-{$lang['id_lang']}">
                <thead>
                <tr>
                  <th></th>
                  <th>{l s='Name' d='Modules.Linklist.Admin'}</th>
                  <th>{l s='URL' d='Modules.Linklist.Admin'}</th>
                </tr>
                </thead>
                <tbody>
                <tr class="js-custom-link-row-template-{$lang['id_lang']}" data-item="0" style="display: none">
                  <td class="col-md-1"><a href="#" class="js-clear-custom-link" style="display: none"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                  <td class="col-md-2">
                    <label class="control-label">
                      <input type="text" name="custom[{$lang['id_lang']}][0][title]"/>
                    </label>
                  </td>
                  <td class="col-md-9">
                    <label class="control-label col-md-12">
                      <input type="text" name="custom[{$lang['id_lang']}][0][url]"/>
                    </label>
                  </td>
                </tr>
                {foreach $input.values[$lang['id_lang']] as $key => $page}
                  <tr {if $key%2}class="alt_row"{/if} data-item="{$key}">
                    <td><a href="#" class="js-clear-custom-link"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                    <td>
                      <label class="control-label">
                        <input type="text" name="custom[{$lang['id_lang']}][{$key}][title]" value="{$page.title}"/>
                      </label>
                    </td>
                    <td>
                      <label class="control-label">
                        <input type="text" name="custom[{$lang['id_lang']}][{$key}][url]" value="{$page.url}"/>
                      </label>
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
            function clearCustomLink () {
              $(this).closest('tbody').find('tr:last-of-type > td > a.js-clear-custom-link').hide();
              $(this).closest('tr').remove();

              return false;
            }

            $('a.js-clear-custom-link').click(clearCustomLink);

            function addCustomLinkRow() {
              var tbody = $('table.js-custom-links-table-{$lang['id_lang']} > tbody');
              var lastTr = tbody.find('tr:last-of-type');
              var i = lastTr ? lastTr.data('item') + 1 : 0;

              tbody.find('tr:nth-last-of-type(2) > td > a').show();

              var tpl = $('tr.js-custom-link-row-template-{$lang['id_lang']}').clone();
              tpl.removeClass('js-custom-link-row-template-{$lang['id_lang']}');
              tpl.data('item', i);
              tpl.find('td:nth-of-type(2) input').attr('name', 'custom[{$lang['id_lang']}][' + i + '][title]');
              tpl.find('td:nth-of-type(3) input').attr('name', 'custom[{$lang['id_lang']}][' + i + '][url]');
              tpl.find('a.js-clear-custom-link').click(clearCustomLink);
              tpl.show();
              tbody.append(tpl);

              tbody.find('tr > td > a.js-clear-custom-link').show();
              tbody.find('tr:last-of-type > td > a.js-clear-custom-link').hide();
            }

            addCustomLinkRow();

            $('a.js-add-custom-link-{$lang['id_lang']}').click(function () {
              addCustomLinkRow();

              return false;
            });
          });
        </script>
      {/foreach}
    {else}
        {$smarty.block.parent}
    {/if}
  {if isset($input.preffix_wrapper)}</div>{/if}
{/block}
