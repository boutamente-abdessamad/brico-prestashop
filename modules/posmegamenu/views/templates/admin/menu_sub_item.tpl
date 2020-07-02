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

<div class="modal fade" id="submenu-item-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="submenu-item-modal-title">{l s='Submenu item configuration' mod='posmegamenu'}</h4>
            </div>
            <form class="form-horizontal form" id="submenu-item-form" onsubmit="posMegamenu.save(); return false;">
                <div class="modal-body"> 
                    <input type="hidden" name="itemform_item" value="" id="itemform_id"/>
                    <input type="hidden" name="itemform_column_id" value="" id="itemform_id_posmegamenu_submenu_column"/>
                    <div class="form-group" id="item_type_form">
                        <label class="control-label col-lg-2" for="itemform_type_link">{l s='Type Item' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="itemform_type_link" name="type_link" class="form-control fixed-width-xl" data-serializable="true" data-default="1">
                                <option value="1">{l s='Category tree' mod='posmegamenu'}</option>
                                <option value="2">{l s='PrestaShop Link' mod='posmegamenu'}</option>
                                <option value="3">{l s='Custom Link' mod='posmegamenu'}</option>
                                <!-- <option value="4">{l s='Product' mod='posmegamenu'}</option> -->
                                <option value="5">{l s='Banner image' mod='posmegamenu'}</option>
                                <option value="6">{l s='HTML Block' mod='posmegamenu'}</option>
                                <option value="7">{l s='Manufacturer logo' mod='posmegamenu'}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group type_link_category">
                        <label class="control-label col-lg-2" for="itemform_category_tree">{l s='Select a category' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="itemform_category_tree" name="category_tree" class="form-control" data-serializable="true" data-default="1">
                                {$category_links|escape:'quotes':'UTF-8'}
                            </select>
                        </div>
                    </div>
                    <div class="form-group type_link_pslinks">
                        <label class="control-label col-lg-2" for="itemform_ps_link">{l s='Prestashop link' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="itemform_ps_link" name="ps_link" class="form-control" data-serializable="true" data-default="1">
                                {$ps_links|escape:'quotes':'UTF-8'}
                            </select>
                        </div>
                    </div>
                    <div class="form-group type_link_customlink">
                        <label class="control-label col-lg-2" for="itemform_customlink_title">{l s='Title' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            {foreach from=$languages item=language}
                                {if $languages|count > 1}
                                    <div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
                                {/if}
                                <div class="col-lg-10">
                                <input type="text" id="itemform_customlink_title_{$language.id_lang|intval}" name="customlink_title_{$language.id_lang|intval}" data-serializable="true" value="" />
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
                    <div class="form-group type_link_customlink">
                        <label class="control-label col-lg-2" for="itemform_customlink_link">{l s='URL' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            {foreach from=$languages item=language}
                                {if $languages|count > 1}
                                    <div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
                                {/if}
                                <div class="col-lg-10">
                                <input type="text" id="itemform_customlink_link_{$language.id_lang|intval}" name="customlink_link_{$language.id_lang|intval}" data-serializable="true" value="" />
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
                    <div class="form-group type_link_product">
                        <label class="control-label col-lg-2" for="itemform_id_product">{l s='Product' mod='posmegamenu'}</label>
                        <div class="col-lg-6">
                            <input type="text" id="itemform_search_product" value="" placeholder="{l s='Search a product' mod='posmegamenu'}"/>
                            <i class="xbutton icon icon-times"></i>
                            <input type="hidden" id="itemform_id_product" name="id_product" value="" data-serializable="true"/>
                        </div>
                    </div>
                    <div class="form-group type_link_manufacturer">
                        <label class="control-label col-lg-2" for="itemform_id_manufacturer">{l s='Select manufacturer' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="itemform_id_manufacturer" name="id_manufacturer" class="form-control" data-serializable="true">
                                {$manufacturers|escape:'quotes':'UTF-8'}
                            </select>
                        </div>
                    </div>
                    <div class="form-group type_link_html">
                        <label class="control-label col-lg-2" for="itemform_htmlcontent">{l s='HTML content' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            
                            {foreach from=$languages item=language}
                                {if $languages|count > 1}
                                    <div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
                                {/if}
                                <div class="col-lg-11">
                                <textarea id="itemform_htmlcontent_{$language.id_lang|intval}" name="htmlcontent_{$language.id_lang|intval}" class="autoload_rte1" data-serializable="true"></textarea>
                                </div>
                                {if $languages|count > 1}
                                    <div class="col-lg-1">
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
                    
                    <div class="form-group type_link_banner">
                        <label class="control-label col-lg-2" for="itemform_image">{l s='Image source' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            
                            {foreach from=$languages item=language}
                            {if $languages|count > 1}
                            <div class="translatable-field lang-{$language.id_lang}" {if $language.id_lang != $id_language}style="display:none"{/if}>
                                {/if}
                                <div class="col-lg-7">
                                    <input type="text" id="image_{$language.id_lang|intval}" name="image_{$language.id_lang|intval}" value="" data-serializable="true"/>
                                    <a href="filemanager/dialog.php?type=1&field_id=image_{$language.id_lang|intval}" class="btn btn-default iframe-column-upload"  data-input-name="image_{$language.id_lang|intval}" type="button">{l s='Select image' mod='iqitmegamenu'} <i class="icon-angle-right"></i></a>
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
                            {/foreach}
                        </div>
                    </div>
                    <div class="form-group type_link_banner">
                        <label class="control-label col-lg-2" for="itemform_image_link">{l s='Image link' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            {foreach from=$languages item=language}
                                {if $languages|count > 1}
                                    <div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
                                {/if}
                                <div class="col-lg-11">
                                <input type="text" id="itemform_image_link_{$language.id_lang|intval}" name="image_link_{$language.id_lang|intval}" value="" data-serializable="true"/>
                                </div>
                                {if $languages|count > 1}
                                    <div class="col-lg-1">
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
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="column_width">{l s='Active in mobile' mod='posmegamenu'}</label>
                        <div class="col-lg-10">
                            <select id="itemform_active_mobile" name="active_mobile" class="form-control fixed-width-xl" data-serializable="true">
                                <option value="1">{l s='Yes' mod='posmegamenu'}</option>
                                <option value="0">{l s='No' mod='posmegamenu'}</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="itemform_active" name="active" value="" />
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
        $('.xbutton').on('click', function(){
            $('#itemform_search_product').val('');
        });
        $('#itemform_type_link').change(function(){
            SubmenuItemChangeType();
        });
        SubmenuItemChangeType();

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

    //fix mce on modal
    $(document).on('focusin', function(e) {
        if ($(event.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });

    function SubmenuItemChangeType(){
        var val = $('#itemform_type_link').val();
        switch(val){
            case "1": // link
                $('.type_link_pslinks, .type_link_customlink,.type_link_product,.type_link_html,.type_link_manufacturer,.type_link_banner,.define-show').addClass('hidden');
                $('.type_link_category').removeClass('hidden');
                break;

            case "2": // integration
                $('.type_link_category, .type_link_customlink,.type_link_product,.type_link_html,.type_link_manufacturer,.type_link_banner').addClass('hidden');
                $('.type_link_pslinks,.define-show').removeClass('hidden');
                break;

            case "3": // js
                $('.type_link_category,.type_link_pslinks,.type_link_product,.type_link_html,.type_link_manufacturer,.type_link_banner').addClass('hidden');
                $('.type_link_customlink,.define-show').removeClass('hidden');
                break;

            case "4": // callback
                $('.type_link_category,.type_link_pslinks, .type_link_customlink,.type_link_html,.type_link_manufacturer,.type_link_banner,.define-show').addClass('hidden');
                $('.type_link_product').removeClass('hidden');

                break;
            case "5": // callback
                $('.type_link_category,.type_link_pslinks, .type_link_customlink,.type_link_product,.type_link_manufacturer,.type_link_html,.define-show').addClass('hidden');
                $('.type_link_banner').removeClass('hidden');

                break;
            case "6": // callback
                $('.type_link_category,.type_link_pslinks, .type_link_customlink,.type_link_product,.type_link_manufacturer,.type_link_banner,.define-show').addClass('hidden');
                $('.type_link_html').removeClass('hidden');

                break;
            case "7": // callback
                $('.type_link_category,.type_link_pslinks, .type_link_customlink,.type_link_product,.type_link_html,.type_link_banner,.define-show').addClass('hidden');
                $('.type_link_manufacturer').removeClass('hidden');

                break;
        }
    }
    

</script>
