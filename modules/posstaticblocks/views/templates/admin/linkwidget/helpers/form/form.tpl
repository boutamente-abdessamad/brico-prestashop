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
    {if $input.type == 'link_blocks'}
        <div class="row">
            <script type="text/javascript">
                var come_from = '{$name_controller}';
                var token = '{$token}';
                var alternate = 1;
            </script>
            <a id="inline" href="#data" style="position: absolute;right: 30px;z-index: 10;top:10px;font-size: 13px;"><i class="material-icons" style="font-size:14px;">place</i> Click to view theme's hooks position.</a>
            <div style="display:none"><div id="data"><img src="{__PS_BASE_URI__}/modules/posstaticblocks/hooks.jpg"/></div></div>
            {foreach $input.values as $key => $link_blocks_position name='blocksLoop'}
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading" style="color:#22aac5;">
                            {$link_blocks_position.hook_name}
                             <small style="color:#555;">{$link_blocks_position.hook_title}</small>
                        </div>
                        <table class="table tableDnD cms" id="link_block_{$key%2}">
                            <thead>
                                <tr class="nodrag nodrop">
                                    <th>{l s='ID' d='Modules.Linklist.Admin'}</th>
                                    <th>{l s='Position' d='Modules.Linklist.Admin'}</th>
                                    <th>{l s='Name of the block' d='Modules.Linklist.Admin'}</th>
                                    <th>{l s='Active' d='Modules.Linklist.Admin'}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach $link_blocks_position.blocks as $link_block}
                                    <tr class="{if $key%2}alt_row{else}not_alt_row{/if} row_hover" id="tr_{$key%2}_{$link_block['id_pos_staticblock']}_{$link_block['position']}">
                                        <td>{$link_block['id_pos_staticblock']}</td>
                                        <td class="center pointer dragHandle" id="td_{$key%2}_{$link_block['id_pos_staticblock']}">
                                            <div class="dragGroup">
                                                <div class="positions">
                                                    {$link_block['position'] + 1}
                                                </div>
                                            </div>
                                        </td>
                                        <td>{$link_block['block_name']}</td>
                                        <td>
                                        {if $link_block['active']}
                                        <a class="btn btn-success" href="{$base_url|escape:'html':'UTF-8'}&configure={$configure_name}&token={$token}&changeStatus&id_pos_staticblock={$link_block['id_pos_staticblock']}" title=""><i class="icon-check"></i></a>
                                        {else}
                                        <a class="btn btn-danger" href="{$base_url|escape:'html':'UTF-8'}&configure={$configure_name}&token={$token}&changeStatus&id_pos_staticblock={$link_block['id_pos_staticblock']}" title=""><i class="icon-remove"></i></a>
                                        {/if}
                                        </td>
                                        <td>
                                            <div class="btn-group-action">
                                                <div class="btn-group pull-right">
                                                    <a class="btn btn-default" href="{$current}&amp;edit{$identifier}&amp;id_pos_staticblock={(int)$link_block['id_pos_staticblock']}" title="{l s='Edit' d='Modules.Linklist.Admin'}">
                                                        <i class="icon-edit"></i> {l s='Edit' d='Modules.Linklist.Admin'}
                                                    </a>
                                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-caret-down"></i>&nbsp;
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{$current}&amp;delete{$identifier}&amp;id_pos_staticblock={(int)$link_block['id_pos_staticblock']}" title="{l s='Delete' d='Modules.Linklist.Admin'}">
                                                            <i class="icon-trash"></i> {l s='Delete' d='Modules.Linklist.Admin'}
                                                        </a>
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
						
                    </div>
                </div>
                {if $smarty.foreach.blocksLoop.index%2}<div class="clearfix"></div>{/if}
            {/foreach}
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#inline").fancybox({
                    'transitionIn'  :   'elastic',
                    'transitionOut' :   'elastic',
                    'speedIn'       :   600, 
                    'speedOut'      :   200, 
                    'overlayShow'   :   false,
                    'width'         : 600,
                    'height'        : 'auto',
                });
				
            });
        </script>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
