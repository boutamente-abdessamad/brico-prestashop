$(document).ready(function() {
	
	var $tabcateSlideConf = $('.tab-category-container-slider');
	
	var cate_id_act = $('ul.tab_cates li.active').data('cate_id');
	
	$.ajax({
            type: 'POST',
            url: baseDir + 'module/postabcateslider/actions',
            dataType: 'json',
            data: {
                action : 'load_products',
				id: cate_id_act,
                ajax : true,
				
            },
			beforeSend: function () { 
				$(".imgSpinner").show(); 
			},
            success: function(data)
            {
                //console.log(data); 
				
				$('.pos_content_product_cate').html(data.product_cate);
				$(".imgSpinner").hide(); 
            }
        })
	$("ul.tab_cates.dropdown-menu li:first").addClass("active");	
	$("ul.tab_cates li").click(function() {
		var cate_id = $(this).data('cate_id'); 
		$("ul.tab_cates li").removeClass("active");
		$(this).addClass("active");
		$('.pos_content_product_cate ').css('opacity',0.6);  
		$.ajax({
            type: 'POST',
            url: baseDir + 'module/postabcateslider/actions',
            dataType: 'json',
            data: {
                action : 'load_products',
				id: cate_id,
                ajax : true,
				
            },
			beforeSend: function () { 
				$(".tab-category-container-slider .imgSpinner").show(); 
			},
            success: function(data)
            {
                //console.log(data); 
				$('.pos_content_product_cate ').css('opacity',1);  
				$('.pos_content_product_cate').html(data.product_cate);
				$(".tab-category-container-slider .imgSpinner").hide(); 
            }
        })
		
	});
	
	
});

