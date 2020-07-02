var posMegamenu = {
	_getFormData: function(){
        var params = [];
        $('#submenu-item-form [data-serializable="true"]').each(function(){
            params.push({
                name: $(this).attr('name'),
                value: $(this).val()
            });
        });
        return params;
    },
    add: function(id_column){
        $('#submenu-item-modal').modal('show');
        posMegamenu.reloadmce();
        $('#itemform_id_posmegamenu_submenu_column').val(id_column);
    },
    populateForm: function(data){
        $.each(data, function(i){
            var fieldId = '#itemform_' + i;
            if (typeof data[i] == 'object'){
                if (data[i] != null){
                    $.each(data[i], function(id_lang){
                        if(i == 'image'){
                            $('#'+i + '_' + id_lang).val(data[i][id_lang]);
                        }else if(i == 'htmlcontent'){
                            $(fieldId + '_' + id_lang).html(data[i][id_lang]);
                        }else{
                            $(fieldId + '_' + id_lang).val(data[i][id_lang]);
                        }
                    });    
                }
            }else{
                $(fieldId).val(data[i]);  
                $('#itemform_search_product').val(data[i]);
            }
        });
        SubmenuItemChangeType();
    },
    toggle: function(id){
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'switch',
                id: id,
                ajax : true
            },
            success: function(data)
            {
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
	edit: function(id){
        posMegamenu.blockUI('#posmegamenu-submenu');
        $.ajax({
            type: 'GET',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'edit',
                ajax : true,
                id: id
            },
            success: function(data)
            {   
                console.log(data);
                posMegamenu.unblockUI('#posmegamenu-submenu');
                $('#submenu-item-modal').modal();
                posMegamenu.populateForm(data);
                posMegamenu.reloadmce();
                
            }
        }).fail(function(){
            posMegamenu.unblockUI('#posmegamenu-submenu');
            (posMegamenu.errorMessage);
        });
    },
    save: function(){
        var params = posMegamenu._getFormData();
        console.log(params);
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'save',
                ajax : true,
                data: params,
                id: $('#itemform_id').val(),
                id_column: $('#itemform_id_posmegamenu_submenu_column').val(),
            },
            success: function(data)
            {      
                $('#submenu-item-modal').modal('hide');
                showSuccessMessage(posMegamenu.successSaveMessage);
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
    remove: function(id){
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'delete',
                ajax : true,
                id: id,
            },
            success: function(data)
            {      
                showSuccessMessage(posMegamenu.successDeleteMessage);
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
    reload: function(){
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'reload',
                ajax : true,
                id_posmegamenu_item: $('#id_posmegamenu_item').val()
            },
            success: function(data)
            {
                $('#posmegamenu-submenu').replaceWith(data.content);
                posMegamenu.autocompleteProduct();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
    reloadmce: function(){
        tinySetup({
            editor_selector :"autoload_rte1",
            setup : function(ed) {
                ed.on('change', function(ed, e) {
                    tinyMCE.triggerSave();
                });
                ed.on('blur', function(ed) {
                    tinyMCE.triggerSave();
                });
            }
        });

        
    },
    _getFormDataColumn: function(){
        var params = [];
        $('#submenu-column-form [data-serializable="true"]').each(function(){
            params.push({
                name: $(this).attr('name'),
                value: $(this).val()
            });
        });
        return params;
    },
    populateFormColumn: function(data){
        $.each(data, function(i){
            if (typeof data[i] == 'object'){
                if (data[i] != null){
                    $.each(data[i], function(id_lang){
                       $('#column_'+i+ '_' + id_lang).val(data[i][id_lang]);
                    });    
                }
            }else{
                $('#column_'+i).val(data[i]);
            }
        });
        ColumnChangeTypeLink();
    },
    addColumn: function(id_row){
        $('#submenu-column-modal').modal('show');
        $('#column_id_row').val(id_row);
    },
    editColumn: function(id){
        posMegamenu.blockUI('#posmegamenu-submenu');
        $.ajax({
            type: 'GET',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'editColumn',
                ajax : true,
                id: id
            },
            success: function(data)
            {   console.log(data);
                $('#submenu-column-modal').modal(); 
                posMegamenu.populateFormColumn(data);              
                posMegamenu.unblockUI('#posmegamenu-submenu');
            }
        }).fail(function(){
            posMegamenu.unblockUI('#posmegamenu-submenu');;
            (posMegamenu.errorMessage);
        });
    },
    saveColumn: function(){
        var params = posMegamenu._getFormDataColumn();
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'saveColumn',
                ajax : true,
                data: params,
                id: $('#column_id').val(),
                id_row: $('#column_id_row').val(),
            },
            success: function(data)
            {      
                $('#submenu-column-modal').modal('hide');
                showSuccessMessage(posMegamenu.successSaveMessage);
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
    removeColumn: function(id_column){
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'deleteColumn',
                ajax : true,
                id: id_column,
            },
            success: function(data)
            {      
                showSuccessMessage(posMegamenu.successDeleteMessage);
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
//functions for rows
    _getFormDataRow: function(){
        var params = [];
        $('#submenu-row-form [data-serializable="true"]').each(function(){
            params.push({
                name: $(this).attr('name'),
                value: $(this).val()
            });
        });
        return params;
    },
    populateFormRow: function(data){
        $.each(data, function(i){
            if(i =='id'){
                $('#row_'+i+'_row').val(data[i]);
            }else{
                $('#row_'+i).val(data[i]);
            }
            
        });
    },
    addRow: function(id){
        $('#submenu-row-modal').modal('show');
        $('#row_id_posmegamenu_item').val(id);
    },
    editRow: function(id){
        posMegamenu.blockUI('#posmegamenu-submenu');
        $.ajax({
            type: 'GET',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'editRow',
                ajax : true,
                id: id
            },
            success: function(data)
            {   console.log(data);
                $('#submenu-row-modal').modal(); 
                posMegamenu.populateFormRow(data);              
                posMegamenu.unblockUI('#posmegamenu-submenu');
            }
        }).fail(function(){
            posMegamenu.unblockUI('#posmegamenu-submenu');
            (posMegamenu.errorMessage);
        });
    },
    toggleRow: function(id){
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'switchRow',
                id: id,
                ajax : true
            },
            success: function(data)
            {
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
    saveRow: function(){
        var params = posMegamenu._getFormDataColumn();
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'saveRow',
                ajax : true,
                data: params,
                id: $('#row_id_row').val(),
                id_posmegamenu_item: $('#row_id_posmegamenu_item').val(),
            },
            success: function(data)
            {      
                $('#submenu-row-modal').modal('hide');
                showSuccessMessage(posMegamenu.successSaveMessage);
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
    removeRow: function(id_column){
        $.ajax({
            type: 'POST',
            url: posMegamenu.ajaxUrl,
            dataType: 'json',
            data: {
                controller : 'AdminPosmegamenu',
                action : 'deleteRow',
                ajax : true,
                id: id_column,
            },
            success: function(data)
            {      
                showSuccessMessage(posMegamenu.successDeleteMessage);
                posMegamenu.reload();
            }
        }).fail(function(){
            showErrorMessage(posMegamenu.errorMessage);
        });
    },
    blockUI: function(selector){
        $(selector).addClass('ar-blocked');
        $(selector).find('.ar-loading').remove();
        $(selector).append('<div class="ar-loading"><div class="ar-loading-inner">Loading...</div></div>');
    },
    unblockUI: function(selector){
        $(selector).find('.ar-loading').remove();
        $(selector).removeClass('ar-blocked');
    },
    autocompleteProduct: function(){
        $('#itemform_search_product').autocomplete('ajax_products_list.php?excludeIds=', {
            minChars: 1,
            autoFill: true,
            max:20,
            matchContains: true,
            mustMatch:true,
            scroll:false,
            cacheLength:0,
            extraParams:{ excludeIds:getMenuProductsIds()},
            formatItem: function(item) {
                if (item.length == 2) {
                  return item[1]+' - '+item[0];  
                } else {
                    return '--';
                }
            }
        }).result(function(event, data, formatted) {
            if (data == null || data.length != 2)
                return false;
            var productId = data[1];
            var productName = data[0];

            var divProductName = $('#itemform_id_product');
            divProductName.val(productId);

            $('#itemform_search_product').setOptions({
                extraParams: {excludeIds : getMenuProductsIds()}
            });
        });
    }
};
$(document).ready(function(){
    posMegamenu.autocompleteProduct();
})
var getMenuProductsIds = function()
{
    if (!$('#inputMenuProducts').val())
        return '-1';
    return $('#inputMenuProducts').val().replace(/\-/g,',');
}