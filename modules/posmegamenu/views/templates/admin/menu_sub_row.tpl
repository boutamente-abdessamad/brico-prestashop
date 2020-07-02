{*
* 2018 Posthemes
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@areama.net so we can send you a copy immediately.
*
*
*  @author Posthemes <posthemes@gmail.com>
*  @copyright  2018 Posthemes
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of Posthemes
*}

<div class="modal fade" id="submenu-row-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="submenu-row-modal-title">{l s='Row settings' mod='posmegamenu'}</h4>
            </div>
            <form class="form-horizontal form" id="submenu-row-form" onsubmit="posMegamenu.saveRow(); return false;">
                <div class="modal-body"> 
                    <input type="hidden" name="row_id_posmegamenu_item" value="" id="row_id_posmegamenu_item"/>
                    <input type="hidden" name="row_id_row" value="" id="row_id_row"/>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="row_class">{l s='Specific class' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <input type="text" id="row_class" name="row_class" value="" data-serializable="true"/>
                        </div>
                    </div>
                    <input type="hidden" id="row_active" name="row_active" value="" />
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{l s='Cancel' mod='posmegamenu'}</button>
                    <button type="submit" class="btn btn-primary">{l s='Save' mod='posmegamenu'}</button>
                </div>
            </form>
        </div>
    </div>
</div>

