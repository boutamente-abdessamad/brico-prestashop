{if $homeslider.slides}
<div class="slideshow_container" data-speed="{$homeslider.speed}" data-time="{$homeslider.time}" data-nav="{$homeslider.nav}" data-pag="{$homeslider.pag}" data-pausehover="{$homeslider.pause_on_hover}">
	<div class="pos-slideshow">
		<div class="flexslider ma-nivoslider">
			<div class="pos-loading"><span></span><img src="{$homeslider.first_load_image}" alt="" /></div>
			<div id="pos-slideshow-home" class="slides">
				
				{$count=0}
				{foreach from=$homeslider.slides key=key item=slide}
					<a href="{$slide.url}" title="{$slide.title}" ><img style="display:none" src="{$slide.image_url}"  data-thumb="{$slide.image_url}"  alt="" title="#htmlcaption{$slide.id_slide}"  /> </a>
			   {/foreach}
			</div>
			{if $homeslider.show_caption != 0}
				{$count_id=0}
				{foreach from=$homeslider.slides key=key item=slide}
					<div id="htmlcaption{$slide.id_slide}" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst {$homeslider.time}ms ease-in-out;
								-moz-animation: myfirst {$homeslider.time}ms ease-in-out;
								-ms-animation: myfirst {$homeslider.time}ms ease-in-out;
								animation: myfirst {$homeslider.time}ms ease-in-out;
							
							">
							</div>
							{if $slide.cap_position == 1}
								{assign var='position_slide' value='position_left'}
							{elseif $slide.cap_position == 2}
								{assign var='position_slide' value='position_center'}					
							{else}
								{assign var='position_slide' value='position_right'} 
							{/if}
							{if $slide.description}
							<div class="banner7-des">
								<div class="container">
									<div class="desc_slideshow desc_slideshow_{$count_id} {$position_slide}">
									<div class="info">
										{$count_transition=0}
										{foreach from=$slide.description item=description}
											{if $description.animation == 0}
												{assign var='animation_class' value='bounceIn'}
											{elseif $description.animation == 1}
												{assign var='animation_class' value='bounceInDown'}
											{elseif $description.animation == 2}
												{assign var='animation_class' value='bounceInLeft'}
											{elseif $description.animation == 3}
												{assign var='animation_class' value='bounceInRight'}
											{elseif $description.animation == 4}
												{assign var='animation_class' value='bounceInUp'}
											{elseif $description.animation == 5}
												{assign var='animation_class' value='fadeIn'}
											{elseif $description.animation == 6}
												{assign var='animation_class' value='fadeInDown'}
											{elseif $description.animation == 7}
												{assign var='animation_class' value='fadeInLeft'}
											{elseif $description.animation == 8}
												{assign var='animation_class' value='fadeInRight'}
											{elseif $description.animation == 9}
												{assign var='animation_class' value='fadeInUp'}
											{elseif $description.animation == 10}
												{assign var='animation_class' value='zoomIn'}
											{elseif $description.animation == 11}
												{assign var='animation_class' value='zoomInDown'}
											{elseif $description.animation == 12}
												{assign var='animation_class' value='zoomInLeft'}
											{elseif $description.animation == 13}
												{assign var='animation_class' value='zoomInRight'}
											{elseif $description.animation == 14}
												{assign var='animation_class' value='zoomInUp'}
											{elseif $description.animation == 15}
												{assign var='animation_class' value='rotateIn'}
											{elseif $description.animation == 16}
												{assign var='animation_class' value='rotateInDownLeft'}
											{elseif $description.animation == 17}
												{assign var='animation_class' value='rotateInDownRight'}
											{elseif $description.animation == 18}
												{assign var='animation_class' value='rotateInUpLeft'}
											{elseif $description.animation == 19}
												{assign var='animation_class' value='rotateInUpRight'}
											{elseif $description.animation == 20}
												{assign var='animation_class' value='pulse'}
											{elseif $description.animation == 21}
												{assign var='animation_class' value='flipInX'}	
											{elseif $description.animation == 22}
												{assign var='animation_class' value='jackInTheBox'}
											{else}
												{assign var='animation_class' value='rollIn'} 
											{/if}
											
											{if $description.display == 0}
												<h2 data-animation="animated {$animation_class} " class="transition_slide_{$count_transition}">{$description.title}</h2>
											{elseif $description.display == 1}
												<h3 data-animation="animated {$animation_class} " class="transition_slide_{$count_transition}">{$description.title}</h3>
											{elseif $description.display == 2}
												<h4 data-animation="animated {$animation_class} " class="transition_slide_{$count_transition}">{$description.title}</h4>
											{elseif $description.display == 3}
												<h5 data-animation="animated {$animation_class} " class="transition_slide_{$count_transition}">{$description.title}</h5>											
											{elseif $description.display == 4}
												<p data-animation="animated {$animation_class} " class="transition_slide_{$count_transition}">{$description.title}</p>
											{else}
												<a href="{$slide.url}" data-animation="animated {$animation_class}" class="readmore transition_slide_{$count_transition}">{$description.title}</a>
											{/if}
									
											{$count_transition= $count_transition+1}
										{/foreach}
									</div>
									</div>
								</div> 
							</div>
							{/if}
					</div>
					{$count_id=$count_id+1}
				 {/foreach}
			 {/if}
		</div>
	</div>
</div>

{/if}
 <script type="text/javascript">
 $(document).ready(function() {
	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	//Variables on page load 
	var $myCarousel = $('.ma-nivoslider'),
		$firstAnimatingElems = $myCarousel.find('.nivo-caption').find("[data-animation ^= 'animated']");
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);

});
</script>