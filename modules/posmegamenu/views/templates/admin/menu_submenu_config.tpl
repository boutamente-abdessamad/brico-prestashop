<div class="panel container">

	<h3><i class="icon-cog"></i> {l s='Submenu settings' mod='posmegamenu'}</h3>
	<form id="module_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&amp;configure=posmegamenu&amp;token={Tools::getAdminTokenLite('AdminModules')|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data" novalidate="">
		<input type="hidden" name="id_posmegamenu_item" value="{$id_posmegamenu_item}" />
		<div class="panel">
			<div class="form-wrapper">
				<div class="form-group">
                    <label class="control-label col-lg-2" for="submenu_width">{l s='Submenu width' mod='posmegamenu'}</label>
                    <div class="col-lg-10">
                        <select id="submenu_width" name="submenu_width" class="form-control fixed-width-xl">	
							<option value="12" {if $submenu_info.submenu_width == 12}selected="selected"{/if}>12/12</option>
							<option value="11" {if $submenu_info.submenu_width == 11}selected="selected"{/if}>11/12</option>
							<option value="10" {if $submenu_info.submenu_width == 10}selected="selected"{/if}>10/12</option>
							<option value="9" {if $submenu_info.submenu_width == 9}selected="selected"{/if}>9/12</option>
							<option value="8" {if $submenu_info.submenu_width == 8}selected="selected"{/if}>8/12</option>
							<option value="7" {if $submenu_info.submenu_width == 7}selected="selected"{/if}>7/12</option>
							<option value="6" {if $submenu_info.submenu_width == 6}selected="selected"{/if}>6/12</option>
							<option value="5" {if $submenu_info.submenu_width == 5}selected="selected"{/if}>5/12</option>
							<option value="4" {if $submenu_info.submenu_width == 4}selected="selected"{/if}>4/12</option>
							<option value="3" {if $submenu_info.submenu_width == 3}selected="selected"{/if}>3/12</option>
							<option value="2" {if $submenu_info.submenu_width == 2}selected="selected"{/if}>2/12</option>
							<option value="1" {if $submenu_info.submenu_width == 1}selected="selected"{/if}>1/12</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
	                <label class="control-label col-lg-2" for="submenu_class">{l s='Specific class' mod='posmegamenu'}</label>
	                <div class="col-lg-6">
	                    <input class="" name="submenu_class" value="{if $submenu_info.submenu_class}{$submenu_info.submenu_class}{/if}" id="submenu_class" type="text">
	                </div>
	            </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="submenu_bg">{l s='Background type' mod='posmegamenu'}</label>
                    <div class="col-lg-10">
                        <select id="submenu_bg" name="submenu_bg" class="form-control fixed-width-xl">
                            <option value="1" {if $submenu_info.submenu_bg == 1}selected="selected"{/if}>None</option>
                            <option value="2" {if $submenu_info.submenu_bg == 2}selected="selected"{/if}>Color</option>
                            <option value="3" {if $submenu_info.submenu_bg == 3}selected="selected"{/if}>Image</option>
                        </select>
                    </div>
                </div>
                <div class="form-group bg-type-color {if $submenu_info.submenu_bg == 1 || $submenu_info.submenu_bg == 3}hidden{/if}">
		            <label class="control-label col-lg-2" for="submenu_bg_color">{l s='Background color' mod='posmegamenu'}</label>
		            <div class="col-lg-10">
		                <div class="input-group fixed-width-xl">
		                    <input data-hex="true" class="color mColorPickerInput mColorPicker" name="submenu_bg_color" value="{if $submenu_info.submenu_bg_color}{$submenu_info.submenu_bg_color}{/if}" id="submenu_bg_color" type="color">
		                </div>
		            </div>
		        </div>
		        <div class="form-group bg-type-image {if $submenu_info.submenu_bg == 1 || $submenu_info.submenu_bg == 2}hidden{/if}">
                    <label class="control-label col-lg-2" for="submenu_bg_image">{l s='Image source' mod='posmegamenu'}</label>
                    <div class="col-lg-10">
                        <div class="col-lg-7">
                            <input type="text" id="submenu_bg_image" name="submenu_bg_image" value="{if $submenu_info.submenu_bg_image}{$submenu_info.submenu_bg_image}{/if}"/>
                            <a href="filemanager/dialog.php?type=1&field_id=submenu_bg_image" class="btn btn-default iframe-column-upload"  data-input-name="submenu_bg_image" type="button">{l s='Select image' mod='posmegamenu'} <i class="icon-angle-right"></i></a>
                            {if $submenu_info.submenu_bg_image}<img src="{$submenu_info.submenu_bg_image}" style="display: block; max-width: 200px;"/>{/if}
                        </div>
                    </div>
                </div>
                <div class="form-group bg-type-image {if $submenu_info.submenu_bg == 1 || $submenu_info.submenu_bg == 2}hidden{/if}">
                    <label class="control-label col-lg-2" for="submenu_bg_repeat">{l s='Background repeat' mod='posmegamenu'}</label>
                    <div class="col-lg-10">
                        <select id="submenu_bg_repeat" name="submenu_bg_repeat" class="form-control fixed-width-xl">
                            <option value="1" {if $submenu_info.submenu_bg_repeat == 1}selected="selected"{/if}>No repeat</option>
                            <option value="2" {if $submenu_info.submenu_bg_repeat == 2}selected="selected"{/if}>Repeat X</option>
                            <option value="3" {if $submenu_info.submenu_bg_repeat == 3}selected="selected"{/if}>Repeat Y</option>
                            <option value="4" {if $submenu_info.submenu_bg_repeat == 4}selected="selected"{/if}>Repeat XY</option>
                        </select>
                    </div>
                </div>
                <div class="form-group bg-type-image {if $submenu_info.submenu_bg == 1 || $submenu_info.submenu_bg == 2}hidden{/if}">
                    <label class="control-label col-lg-2" for="submenu_bg_position">{l s='Background position' mod='posmegamenu'}</label>
                    <div class="col-lg-10">
                        <select id="submenu_bg_position" name="submenu_bg_position" class="form-control fixed-width-xl">
                            <option value="1" {if $submenu_info.submenu_bg_position == 1}selected="selected"{/if}>center bottom</option>
                            <option value="2" {if $submenu_info.submenu_bg_position == 2}selected="selected"{/if}>center center</option>
                            <option value="3" {if $submenu_info.submenu_bg_position == 3}selected="selected"{/if}>center top</option>
                            <option value="4" {if $submenu_info.submenu_bg_position == 4}selected="selected"{/if}>right bottom</option>
                            <option value="5" {if $submenu_info.submenu_bg_position == 5}selected="selected"{/if}>right center</option>
                            <option value="6" {if $submenu_info.submenu_bg_position == 6}selected="selected"{/if}>right top</option>
                            <option value="7" {if $submenu_info.submenu_bg_position == 7}selected="selected"{/if}>left bottom</option>
                            <option value="8" {if $submenu_info.submenu_bg_position == 8}selected="selected"{/if}>left center</option>
                            <option value="9" {if $submenu_info.submenu_bg_position == 9}selected="selected"{/if}>left top</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
		            <label class="control-label col-lg-2" for="submenu_title_color">{l s='Title color' mod='posmegamenu'}</label>
		            <div class="col-lg-10">
		                <div class="input-group fixed-width-xl">
		                    <input data-hex="true" class="color mColorPickerInput mColorPicker" name="submenu_title_color" value="{if $submenu_info.submenu_title_color}{$submenu_info.submenu_title_color}{/if}" id="submenu_title_color" type="color">
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
		            <label class="control-label col-lg-2" for="submenu_title_colorh">{l s='Title color hover' mod='posmegamenu'}</label>
		            <div class="col-lg-10">
		                <div class="input-group fixed-width-xl">
		                    <input data-hex="true" class="color mColorPickerInput mColorPicker" name="submenu_title_colorh" value="{if $submenu_info.submenu_title_colorh}{$submenu_info.submenu_title_colorh}{/if}" id="submenu_title_colorh" type="color">
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
	                <label class="control-label col-lg-2" for="submenu_title_fontsize">{l s='Title tont size' mod='posmegamenu'}</label>
	                <div class="col-lg-10">
	                    <div class="input-group fixed-width-md">
	                        <input class="" data-default="" name="submenu_title_fontsize" value="{if $submenu_info.submenu_title_fontsize}{$submenu_info.submenu_title_fontsize}{/if}" id="submenu_title_fontsize" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="control-label col-lg-2" for="submenu_title_lineheight">{l s='Title line height' mod='posmegamenu'}</label>
	                <div class="col-lg-10">
	                    <div class="input-group fixed-width-md">
	                        <input class="" data-default="" name="submenu_title_lineheight" value="{if $submenu_info.submenu_title_lineheight}{$submenu_info.submenu_title_lineheight}{/if}" id="submenu_title_lineheight" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
			        <label class="control-label col-lg-2" for="submenu_title_transform">{l s='Title text transform' mod='posmegamenu'}</label>
			        <div class="col-lg-10">
			            <select id="submenu_title_transform" name="submenu_title_transform" class="form-control fixed-width-xl" data-default="0">
			                <option value="0" {if $submenu_info.submenu_title_transform == 0}selected="selected"{/if}>{l s='none' mod='posmegamenu'}</option>
			                <option value="1" {if $submenu_info.submenu_title_transform == 1}selected="selected"{/if}>{l s='UPPERCASE' mod='posmegamenu'}</option>
			                <option value="2" {if $submenu_info.submenu_title_transform == 2}selected="selected"{/if}>{l s='Capitalize' mod='posmegamenu'}</option>
			            </select>
			        </div>
			    </div>
		        <div class="form-group">
		            <label class="control-label col-lg-2" for="submenu_link_color">{l s='Link color' mod='posmegamenu'}</label>
		            <div class="col-lg-10">
		                <div class="input-group fixed-width-xl">
		                    <input data-hex="true" class="color mColorPickerInput mColorPicker" name="submenu_link_color" value="{if $submenu_info.submenu_link_color}{$submenu_info.submenu_link_color}{/if}" id="submenu_link_color" type="color">
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
		            <label class="control-label col-lg-2" for="submenu_link_color">{l s='Link color hover' mod='posmegamenu'}</label>
		            <div class="col-lg-10">
		                <div class="input-group fixed-width-xl">
		                    <input data-hex="true" class="color mColorPickerInput mColorPicker" name="submenu_link_colorh" value="{if $submenu_info.submenu_link_colorh}{$submenu_info.submenu_link_colorh}{/if}" id="submenu_link_colorh" type="color">
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
	                <label class="control-label col-lg-2" for="submenu_link_fontsize">{l s='Link font size' mod='posmegamenu'}</label>
	                <div class="col-lg-10">
	                    <div class="input-group fixed-width-md">
	                        <input class="" data-default="" name="submenu_link_fontsize" value="{if $submenu_info.submenu_link_fontsize}{$submenu_info.submenu_link_fontsize}{/if}" id="submenu_link_fontsize" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="control-label col-lg-2" for="submenu_link_lineheight">{l s='Link line height' mod='posmegamenu'}</label>
	                <div class="col-lg-10">
	                    <div class="input-group fixed-width-md">
	                        <input class="" data-default="" name="submenu_link_lineheight" value="{if $submenu_info.submenu_link_lineheight}{$submenu_info.submenu_link_lineheight}{/if}" id="submenu_link_lineheight" type="text">
	                        <span class="input-group-addon">px</span>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group">
			        <label class="control-label col-lg-2" for="submenu_link_transform">{l s='Link text transform' mod='posmegamenu'}</label>
			        <div class="col-lg-10">
			            <select id="submenu_link_transform" name="submenu_link_transform" class="form-control fixed-width-xl" data-default="0">
			                <option value="0" {if $submenu_info.submenu_link_transform == 0}selected="selected"{/if}>{l s='none' mod='posmegamenu'}</option>
			                <option value="1" {if $submenu_info.submenu_link_transform == 1}selected="selected"{/if}>{l s='UPPERCASE' mod='posmegamenu'}</option>
			                <option value="2" {if $submenu_info.submenu_link_transform == 2}selected="selected"{/if}>{l s='Capitalize' mod='posmegamenu'}</option>
			            </select>
			        </div>
			    </div>
			</div>
		</div>
		<div class="panel-footer">
			<a href="index.php?controller=AdminModules&amp;configure=posmegamenu&amp;token={$token|escape:'html':'UTF-8'}" class="btn btn-default">
			<i class="process-icon-back"></i> Back to list</a>
			<button type="submit" value="1" id="module_form_submit_btn" name="submitSubmenu" class="btn btn-default pull-right">
				<i class="process-icon-save"></i> Save
			</button>
		</div>
	</form>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#submenu_bg').change(function(){
	            SubmenuChangeType();
	        });
		})
		function SubmenuChangeType(){
	        var val = $('#submenu_bg').val();
	        switch(val){
	            case "1": // link
	                $('.bg-type-color, .bg-type-image').addClass('hidden');
	                break;

	            case "2": // integration
	                $('.bg-type-image').addClass('hidden');
	                $('.bg-type-color').removeClass('hidden');
	                break;

	            case "3": // js
	                $('.bg-type-color').addClass('hidden');
	                $('.bg-type-image').removeClass('hidden');
	                break;
	        }
	    }
	</script>
</div>