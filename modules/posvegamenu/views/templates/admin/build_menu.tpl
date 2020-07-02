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

<div class="panel container" id="posvegamenu-submenu">
	<h3><i class="icon-list-ul"></i> {l s='Submenu content' mod='posvegamenu'}
	<input type="hidden" name="id_posvegamenu_item" id="id_posvegamenu_item" value="{$id_posvegamenu_item}" />
	</h3>
	<div class="form-wrapper" id="menuRowContent">
		<div id="pos-menu-row">
		{foreach from=$info_rows item=info_row name=info_row}
			<div id="col_{$info_row.id_row|intval}" class="pos-menu-row container-fluid">
				<div class="panel-position">
					<i class="icon icon-arrows"></i>
				</div>
				<div class="panel-content">
					<h4>{l s='Row' mod='posvegamenu'} #{$smarty.foreach.info_row.iteration|intval}
						<a class="btn btn-default" href="#" onclick="posVegamenu.removeRow({$info_row.id_row|intval}); return false;"><i class="icon-trash"></i>{l s='Delete' mod='posvegamenu'}
						</a>
						<a class="btn btn-default" href="#" onclick="posVegamenu.editRow({$info_row.id_row|intval}); return false;">
							<i class="icon-edit"></i>{l s='Edit' mod='posvegamenu'}
						</a>
						<a class="btn {if $info_row.active == '1'}btn-success{else}btn-danger{/if}" href="#" onclick="posVegamenu.toggleRow({$info_row.id_row|intval}); return false;" title="">
							{if $info_row.active == '1'}
								<i class="icon-check"></i> Enabled
							{else}
								<i class="icon-remove"></i> Disabled
							{/if}
						</a>
						<a class="btn btn-default button-new-item" href="#" onclick="posVegamenu.addColumn({$info_row.id_row|intval}); return false;"><i class="icon-plus-sign"></i>&nbsp;{l s='Add Column' mod='posvegamenu'}
						</a>
					</h4>
					<div class="pos-menu-column-content">
						<div class="pos-menu-column">
							{foreach from=$info_row.list_col item=info_col}
								<div id="col_{$info_col.id_posvegamenu_submenu_column|intval}" class="pos-column col-sm-{$info_col.width}">
								<div class="column-container">
									<input type="hidden" id="id_posvegamenu_submenu_column" value="{$info_col.id_posvegamenu_submenu_column|intval}" />
									<h4>
										<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="{l s='Delete Colum' mod='posvegamenu'}" data-html="true">
										<a class="btn btn-default" href="#" onclick="posVegamenu.removeColumn({$info_col.id_posvegamenu_submenu_column|intval}); return false;">
											<i class="icon-trash"></i>
										</a>
										</span>
										<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="{l s='Edit Column' mod='posvegamenu'}" data-html="true">
										<a class="btn btn-default" href="#" onclick="posVegamenu.editColumn({$info_col.id_posvegamenu_submenu_column|intval}); return false;">
											<i class="icon-edit"></i>
										</a>
										</span>
										<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="{l s='Add new Item' mod='posvegamenu'}" data-html="true">
										<a class="btn btn-default" href="#" onclick="posVegamenu.add({$info_col.id_posvegamenu_submenu_column|intval}); return false;">
											<i class="process-icon-new "></i>
										</a>
										</span>
									</h4>
									{if $info_col.title}
									<h4 class="column_title" style="text-transform:uppercase;">{$info_col.title}</h4>
									{/if}
									<ul class="block-items">
										{foreach from=$info_col.list_menu_item item=sub_menu_item}
											
											<li id="menuitem_{$sub_menu_item.id_posvegamenu_submenu_item|intval}">
												<span>{$sub_menu_item.title|escape:'html':'UTF-8'}</span>
												<div class="group-action">
													<a class="btn btn-default" href="#" onclick="posVegamenu.edit({$sub_menu_item.id_posvegamenu_submenu_item|intval}); return false;" title="{l s='Edit Item' mod='posvegamenu'} ">
														<i class="icon-edit"></i>
													</a>
													<a class="btn btn-default" href="#" onclick="posVegamenu.remove({$sub_menu_item.id_posvegamenu_submenu_item|intval}); return false;" title="{l s='delete Item' mod='posvegamenu'} "><i class="icon-trash"></i>
													</a>
													<a class="btn {if $sub_menu_item.active == '1'}btn-success{else}btn-danger{/if}" href="#" onclick="posVegamenu.toggle({$sub_menu_item.id_posvegamenu_submenu_item|intval}); return false;" title="">
														{if $sub_menu_item.active == '1'}
															<i class="icon-check"></i>
														{else}
															<i class="icon-remove"></i>
														{/if}
													</a>
												</div>
											</li>
										{/foreach}
									</ul>
								</div>
								</div>
							{/foreach}
						</div>
					</div>
				</div>
			</div>
		{/foreach}
		</div>
		<a id="desc-product-new" class="list-toolbar-btn" href="#" onclick="posVegamenu.addRow({$id_posvegamenu_item|intval}); return false;">
			<i class="process-icon-new "></i>
			<span>Add a row</span>
		</a>
	</div>
	{include file="./menu_sub_item.tpl"}
	{include file="./menu_sub_column.tpl"}
	{include file="./menu_sub_row.tpl"}
	<script type="text/javascript">
		window.addEventListener('load', function(){
	        posVegamenu.ajaxUrl = '{$link->getAdminLink('AdminPosvegamenu')}';
	        posVegamenu.successSaveMessage = '{l s='Item saved' mod='posvegamenu'}';
	        posVegamenu.successDeleteMessage = '{l s='Item deleted' mod='posvegamenu'}';
	    });  
		$(function() {
			var $myMenus = $("ul.block-items");
			$myMenus.sortable({
				opacity: 0.7,
				cursor: "move",
				start: function(){
					$(this).css('background','#f1f1f1');
				},
				stop: function(){
					$(this).css('background','#ffffff');
				},
				update: function() {
					var order = $(this).sortable("serialize") + "&action=updateMenusItemPosition";
					$.post("{$url_base|escape:'html':'UTF-8'}modules/posvegamenu/ajax_posvegamenu.php?secure_key={$secure_key|escape:'html':'UTF-8'}", order);
					}
				});
			$myMenus.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});
			
			var $myColumns = $("div.pos-menu-column");
			$myColumns.sortable({
				opacity: 0.7,
				cursor: "move",
				start: function(){
					$(this).css('background','#f1f1f1');
				},
				stop: function(){
					$(this).css('background','#ffffff');
				},
				update: function() {
					var order1 = $(this).sortable("serialize") + "&action=updateColumnsPosition";
					$.post("{$url_base|escape:'html':'UTF-8'}modules/posvegamenu/ajax_posvegamenu.php?secure_key={$secure_key|escape:'html':'UTF-8'}", order1);
					}
				});
			$myColumns.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});

			var $myColumns = $("#pos-menu-row");
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
					var order1 = $(this).sortable("serialize") + "&action=updateRowsPosition";
					$.post("{$url_base|escape:'html':'UTF-8'}modules/posvegamenu/ajax_posvegamenu.php?secure_key={$secure_key|escape:'html':'UTF-8'}", order1);
					}
				});
			$myColumns.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});
		});
	</script>
</div>