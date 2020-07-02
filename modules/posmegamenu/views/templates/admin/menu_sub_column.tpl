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

<div class="modal fade" id="submenu-column-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="submenu-item-modal-title">{l s='Column settings' mod='posmegamenu'}</h4>
            </div>
            <form class="form-horizontal form" id="submenu-column-form" onsubmit="posMegamenu.saveColumn(); return false;">
                <div class="modal-body"> 
                    <input type="hidden" name="column_id_column" value="" id="column_id"/>
                    <input type="hidden" name="column_id_row" value="" id="column_id_row"/>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="column_width">{l s='Width' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="column_width" name="column_width" class="form-control fixed-width-xl" data-serializable="true" data-default="1">
                                <option value="1">1/12</option>
                                <option value="2">2/12</option>
                                <option value="3">3/12</option>
                                <option value="4">4/12</option>
                                <option value="5">5/12</option>
                                <option value="6">6/12</option>
                                <option value="7">7/12</option>
                                <option value="8">8/12</option>
                                <option value="9">9/12</option>
                                <option value="10">10/12</option>
                                <option value="11">11/12</option>
                                <option value="12">12/12</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">{l s='Column title' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            {foreach from=$languages item=language}
                                {if $languages|count > 1}
                                    <div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
                                {/if}
                                <div class="col-lg-6">
                                <input type="text" class="title" id="column_title_{$language.id_lang|intval}" name="column_title_{$language.id_lang|intval}" value="" data-serializable="true"/>
                                </div>
                                {if $languages|count > 1}
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                                            {$language.iso_code|escape:'html':'UTF-8'}
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            {foreach from=$languages item=lang}
                                            <li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
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
                    <div class="form-group">
                        <label class="control-label col-lg-2">{l s='Type Link' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="column_type_link" name="column_type_link" class="form-control fixed-width-xl" data-default="0" data-serializable="true">
                                <option value="0">{l s='PrestaShop Link' mod='posmegamenu'}</option>
                                <option value="1">{l s='Custom Link' mod='posmegamenu'}</option>
                                <option value="2">{l s='None' mod='posmegamenu'}</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group column_custom_link">
                        <label class="control-label col-lg-2">{l s='Custom link' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            {foreach from=$languages item=language}
                                {if $languages|count > 1}
                                    <div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
                                {/if}
                                <div class="col-lg-10">
                                <input type="text" id="column_custom_link_{$language.id_lang|intval}" name="column_custom_link_{$language.id_lang|intval}" value="" data-serializable="true"/>
                                </div>
                                {if $languages|count > 1}
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                                            {$language.iso_code|escape:'html':'UTF-8'}
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            {foreach from=$languages item=lang}
                                            <li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
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
                    <div class="form-group column_ps_link">
                        <label class="control-label col-lg-2">{l s='PrestaShop Link' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select class="form-control fixed-width-xl" name="column_link" id="column_link" data-serializable="true">
                                {$ps_links|escape:'quotes':'UTF-8'}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="column_class">{l s='Specific class' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <input type="text" id="column_class" name="column_class" value="" data-serializable="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="column_width">{l s='Active in mobile' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="active_mobile" name="active_mobile" class="form-control fixed-width-xl" data-serializable="true">
                                <option value="1">{l s='Yes' mod='posmegamenu'}</option>
                                <option value="0">{l s='No' mod='posmegamenu'}</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="column_active" name="column_active" value="" />
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{l s='Cancel' mod='posmegamenu'}</button>
                    <button type="submit" class="btn btn-primary">{l s='Save' mod='posmegamenu'}</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#column_type_link').change(function(){
            ColumnChangeTypeLink();
        });
        ColumnChangeTypeLink();
    });    
    function ColumnChangeTypeLink(){
        var val = $('#column_type_link').val();
        switch(val){
            case "0": // none
                $('.column_custom_link').addClass('hidden');
                $('.column_ps_link').removeClass('hidden');
                break;

            case "1": // integration
                $('.column_ps_link').addClass('hidden');
                $('.column_custom_link').removeClass('hidden');
                break;

            case "2": // js
                $('.column_ps_link, .column_custom_link').addClass('hidden');
                break;
        }
    }
</script>

