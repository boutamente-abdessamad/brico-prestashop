$(function() {
	$('input.star').rating();
	$('.auto-submit-star').rating();
	$(".open-comment-form").click(function() { 
			$("#myModal").modal('show');
	});

	$('button.usefulness_btn').click(function() {
		var id_product_comment = $(this).data('id-product-comment');
		var is_usefull = $(this).data('is-usefull');
		var parent = $(this).parent();

		$.ajax({
			url: productcomments_controller_url + '?rand=' + new Date().getTime(),
			data: {
				id_product_comment: id_product_comment,
				action: 'comment_is_usefull',
				value: is_usefull
			},
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			success: function(result){
				parent.fadeOut('slow', function() {
					parent.remove();
				});
			}
		});
	});

	$('span.report_btn').click(function() {
		if (confirm(confirm_report_message))
		{
			var idProductComment = $(this).data('id-product-comment');
			var parent = $(this).parent();

			$.ajax({
				url: productcomments_controller_url + '?rand=' + new Date().getTime(),
				data: {
					id_product_comment: idProductComment,
					action: 'report_abuse'
				},
				type: 'POST',
				headers: { "cache-control": "no-cache" },
				success: function(result){
					parent.fadeOut('slow', function() {
						parent.remove();
					});
				}
			});
		}
	});

	$('#submitNewMessage').click(function(e) {
		
			
		// Kill default behaviour
		e.preventDefault();

		// Form element

        url_options = '?';
        if (!productcomments_url_rewrite)
            url_options = '&';

		$.ajax({
			url: productcomments_controller_url + url_options + 'action=add_comment&secure_key=' + secure_key + '&rand=' + new Date().getTime(),
			data: $('#id_new_comment_form').serialize(),
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			dataType: "json",
			success: function(data){
				if (data.result)
				{
				
					$("#myModal").modal('hide'); 
					$("#result_comment").modal('show');
				
				}
				else
				{
					$('#new_comment_form_error ul').html('');
					$.each(data.errors, function(index, value) {
						$('#new_comment_form_error ul').append('<li>'+value+'</li>');
					});
					$('#new_comment_form_error').slideDown('slow');
				}
			}
		});
		return false;
	});
});
// productcomments
$(document).on('click','#product_comments_block_extra ul.comments_advices a', function(e){
	$('*[class^="tab-pane"]').removeClass('active');
	$('*[class^="tab-pane"]').removeClass('in');
	$('div#idTab5').addClass('active');
	$('div#idTab5').addClass('in');

	$('ul.nav-tabs a[href^="#"]').removeClass('active');
	$('a[href="#idTab5"]').addClass('active');
});
(function(){
	$(window).on("load",function(){
		
		/* Page Scroll to id fn call */
		$("#product_comments_block_extra ul.comments_advices a.reviews ").mPageScroll2id({
			highlightSelector:"#product_comments_block_extra ul.comments_advices a.reviews ",
			offset:100,
		});
	});
})(jQuery); 
