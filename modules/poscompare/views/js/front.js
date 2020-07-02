var posCompare = {
	addCompare: function(obj,id){
		$.ajax({
            type: 'POST',
            url: baseDir + 'module/poscompare/actions',
            dataType: 'json',
            data: {
                action : 'add',
                id: id,
                ajax : true
            },
            success: function(data)
            {
			
                poscompare.nbProducts++;
                $('#poscompare-nb').text(poscompare.nbProducts);
                var $notification = $('#poscompare-notification');
	            $notification.addClass('content-show');
				$.fancybox.open([
					{   src  : '#poscompare-notification',
						type: 'inline',
					}
				], {
					padding: 0
				});
            },
			error: function (jqXHR, status, err) {
				 obj.addClass('cmp_added');
			}
        })
	},
	removeCompare: function(id){
		posCompare.blockUI('#poscompare-table');
		$.ajax({
            type: 'POST',
            url: baseDir + 'module/poscompare/actions',
            dataType: 'json',
            data: {
                action : 'remove',
                id: id,
                ajax : true
            },
            success: function(data)
            {
                console.log(data);
                $('.js-poscompare-product-' + id).remove();
	            poscompare.nbProducts--;
	            $('#poscompare-nb').text(poscompare.nbProducts);

	            if (poscompare.nbProducts == 0) {
	                $('#poscompare-table').remove();
	                $('#poscompare-warning').removeClass('hidden-xs-up');
	            }
	            posCompare.unblockUI('#poscompare-table');
            }
        })

	},
	removeAllCompare: function(){
		posCompare.blockUI('#content');
		$.ajax({
            type: 'POST',
            url: baseDir + 'module/poscompare/actions',
            dataType: 'json',
            data: {
                action : 'removeAll',
                ajax : true
            },
            success: function(data)
            {
                $('#poscompare-nb').text(0);
	            $('#poscompare-table').remove();
	            $('#poscompare-warning').removeClass('hidden-xs-up');
	            posCompare.unblockUI('#content');
            }
        })
	},
	checkCompare: function(id,obj){
		$.ajax({
            type: 'POST',
            url: baseDir + 'module/poscompare/actions',
            dataType: 'json',
            data: {
                action : 'checkCompare',
				id: id,
                ajax : true,
				
            },
            success: function(data)
            {
                 obj.addClass('cmp_added');
            }
        })
	},
	blockUI: function(selector){
        $(selector).addClass('ar-blocked');
        $(selector).find('.ar-loading').remove();
        $(selector).append('<div class="ar-loading"><div class="ar-loading-inner"></div></div>');
    },
    unblockUI: function(selector){
        $(selector).find('.ar-loading').remove();
        $(selector).removeClass('ar-blocked');
    },
}
$(document).ready(function () {	
    $('#poscompare-nb').text(poscompare.nbProducts);
	$('.cmp_added').css('background-color','red');

    $('body').on('click', '.js-poscompare-remove-all', function (event) {
        posCompare.removeAllCompare();
        event.preventDefault();
    });
	
	 $(".compare .poscompare-add").each(function( index, element ) { 
		  var id_product = $(this).attr('data-id_product'); 
		  // console.log(id_product);
		   posCompare.checkCompare(id_product,$(this));
	 });
	 $(".compare .poscompare-add").click(function() {
		$(this).addClass('cmp_added');
	});
    
});
