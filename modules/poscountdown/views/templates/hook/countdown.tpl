{if $enddate!=null && $enddate >0 }
	<div class="countdown" >
		<div class="title_countdown">{l s='Hurry Up! Offer ends in:' mod='poscountdown'} </div>
		<div class='time_count_down' 
		data-years="{l s='Years' mod='poscountdown'}"
		data-year="{l s='Year' mod='poscountdown'}"
		data-months="{l s='Months' mod='poscountdown'}"
		data-month="{l s='Month' mod='poscountdown'}"
		data-weeks="{l s='Weeks' mod='poscountdown'}"
		data-week="{l s='Week' mod='poscountdown'}"
		data-days="{l s='Days' mod='poscountdown'}"
		data-day="{l s='Day' mod='poscountdown'}"
		data-hours="{l s='Hours' mod='poscountdown'}"
		data-hour="{l s='Hour' mod='poscountdown'}"
		data-minutes="{l s='Mins' mod='poscountdown'}"
		data-minute="{l s='Min' mod='poscountdown'}"
		data-seconds="{l s='Secs' mod='poscountdown'}"
		data-second="{l s='Sec' mod='poscountdown'}"
	>
		<span class="future_date_{$id_cate}_{$id_product_time} time_countdown"  data-date-y ='{$enddate|date_format:"%Y"}' data-date-m ='{$enddate|date_format:"%m"}' data-date-d='{$enddate|date_format:"%d"}' data-date-h = '{$enddate|date_format:"%H"}' data-date-mi = '{$enddate|date_format:"%M"}' data-date-s= '{$enddate|date_format:"%S"}' >  </span>
	 </div>
	</div>


{/if}
