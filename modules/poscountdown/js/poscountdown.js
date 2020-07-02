function countdownproduct() {
	$( ".time_count_down" ).each(function( index ) {
		
		var date_y = $(this).find('.time_countdown').attr('data-date-y');
		var date_m = $(this).find('.time_countdown').attr('data-date-m');
		var date_d = $(this).find('.time_countdown').attr('data-date-d');
		var date_h = $(this).find('.time_countdown').attr('data-date-h');
		var date_mi = $(this).find('.time_countdown').attr('data-date-mi');
		var date_s = $(this).find('.time_countdown').attr('data-date-s');
		//console.log(date_y +'---'+date_m+'------'+date_d+'----'+date_h+'---'+date_mi+'-----'+date_s);
		var $countDownValue = $('.time_count_down');
		$(this).children().countdown({
			until: new Date(date_y,date_m-1,date_d,date_h,date_mi,date_s),
			labels: [$countDownValue.attr("data-years"), $countDownValue.attr("data-months"), $countDownValue.attr("data-weeks"), $countDownValue.attr("data-days"), $countDownValue.attr("data-hours"), $countDownValue.attr("data-minutes"), $countDownValue.attr("data-seconds")],
			labels1: [$countDownValue.attr("data-year"), $countDownValue.attr("data-month"), $countDownValue.attr("data-week"), $countDownValue.attr("data-day"), $countDownValue.attr("data-hour"), $countDownValue.attr("data-minute"), $countDownValue.attr("data-second")],
		});

	});
}

$(document).ready(function () { 
		countdownproduct()
});
