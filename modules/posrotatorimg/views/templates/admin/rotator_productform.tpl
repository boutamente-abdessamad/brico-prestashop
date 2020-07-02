<link href="{$module_dir}views/css/admin_product.css" rel="stylesheet" type="text/css"/>
<div class="alert alert-info" role="alert">
    <p class="alert-text">{l s='Click on one image below to set it as the rotator image. The cover image is not showing on the list.' mod='posrotatorimg'}</p>
</div>
<div id="product-images-container-sthoverimage" class="m-b-2">
    <div id="product-images-dropzone-sthoverimage" class="panel dropzone ui-sortable col-md-12 dz-started" data-max-size="8">
        {foreach $images as $image}
        <div class="dz-preview dz-image-preview">
            <div class="dz-image bg" data-id="{$image.id}" style="background-image: url('{$image.base_image_url}-home_default.{$image.format}');"></div>
            <div class="isRotator{if !$image['rotator']} hide{/if}">{l s='Rotator' mod='posrotatorimg'}</div>
        </div>
        {/foreach}
    </div>
</div>
<script type="text/javascript">
jQuery(function($){
    var module_url = '{$current_url}';
    {literal}
    $('#product-images-dropzone-sthoverimage .dz-image').click(function(){
        var _this = $(this);
        $.getJSON(module_url+'&ajax=1&action=update_hover&id_image='+_this.data('id'), function(json){
            if (json.r) {
                $('#product-images-dropzone-sthoverimage').find('.isRotator').hide();
                
                if (_this.parent().find('.isRotator').hasClass('hide')) {
                    _this.parent().find('.isRotator').removeClass('hide').show(); 
                } else {
                    _this.parent().find('.isRotator').addClass('hide').hide();    
                }
                
            }
        });
    });
    {/literal}
});
</script>