<form action="{$currentIndex}&token={$token}" method="post">
<div class="form-group">
	<div class="col-lg-1"><span class="pull-right">{include file="controllers/products/multishop/checkbox.tpl" field="category_box" type="category_box"}</span></div>
	<label class="control-label col-lg-2" for="category_block">
		{l s='Select categories'}
	</label>
	<div class="col-lg-9">
		<div id="category_block">
			{$category_tree}
		</div>
	</div>
	<div class="panel-footer">
		<button type="submit" name="submitPosTabproductSlider" class="btn btn-default pull-right"><i class="process-icon-save"></i> {l s='Save'}</button>
	</div>
</div>
</form>