
<div class="home_blog_post_area {$xipbdp_designlayout}">
	<div class=" pos_title">
		{if isset($xipbdp_title)}
			<h2>
				{$xipbdp_title}
			
			</h2>
		{/if}
		{if isset($xipbdp_subtext)}
		<div class=" desc_title">
			{$xipbdp_subtext}
		</div>
		{/if}
	</div>

	<div class="home_blog_post_inner">
	{if (isset($xipblogposts) && !empty($xipblogposts))}
		<div class="row pos_content">
		<div class="blog_slider owl-carousel">
			{foreach from=$xipblogposts item=xipblgpst name=myLoop}
				{if $smarty.foreach.myLoop.index % 1 == 0 || $smarty.foreach.myLoop.first }
				<div class="item">
				{/if}
			
					<article class="blog_post">
						<div class="blog_post_content_top">
							<div class="post_thumbnail">
								{if $xipblgpst.post_format == 'video'}
									{assign var="postvideos" value=','|explode:$xipblgpst.video}
									{if $postvideos|@count > 1 }
										{include file="module:xipblogdisplayposts/views/templates/front/post-video.tpl" videos=$postvideos width='370' height="256" class="carousel"}
									{else}
										{include file="module:xipblogdisplayposts/views/templates/front/post-video.tpl" videos=$postvideos width='370' height="316" class=""}
									{/if}
								{elseif $xipblgpst.post_format == 'audio'}
									{assign var="postaudio" value=','|explode:$xipblgpst.audio}
									{if $postaudio|@count > 1 }
										{include file="module:xipblogdisplayposts/views/templates/front/post-audio.tpl" audios=$postaudio width='370' height="316" class="carousel"}
									{else}
										{include file="module:xipblogdisplayposts/views/templates/front/post-audio.tpl" audios=$postaudio width='370' height="316" class=""}
									{/if}
								{elseif $xipblgpst.post_format == 'gallery'}
									{if $xipblgpst.gallery_lists|@count > 1 }
										{include file="module:xipblogdisplayposts/views/templates/front/post-gallery.tpl" gallery=$xipblgpst.gallery_lists imagesize="home_default" class="carousel"}
									{else}
										{include file="module:xipblogdisplayposts/views/templates/front/post-gallery.tpl" gallery=$xipblgpst.gallery_lists imagesize="home_default" class=""}
									{/if}
								{else}
									<a href="{$xipblgpst.link}" class="img_content"><img class="xipblog_img img-responsive" src="{$xipblgpst.post_img_home_default}" alt="{$xipblgpst.post_title}"></a>									
								{/if}
							</div>
						</div>
						<div class="post_content">
							<div class="content-inner">	
								<div class="meta_category">
										<a href="{$xipblgpst.category_default_arr.link}">{$xipblgpst.category_default_arr.name}</a>
								</div>
								<h4  class="post_title"><a href="{$xipblgpst.link}">{$xipblgpst.post_title}</a></h4>
								<div class="post_meta clearfix">
									<p class="meta_author">
										{l s='Posted by ' mod='xipblogdisplayposts'}
										<span>{$xipblgpst.post_author_arr.firstname} {$xipblgpst.post_author_arr.lastname}</span>
									</p>
									<p class="meta_date">
										{$xipblgpst.post_date|date_format:"%b %d, %Y"}
									</p>
									
								</div>										
								<p class="post_description">
									{if isset($xipblgpst.post_excerpt) && !empty($xipblgpst.post_excerpt)}
										{$xipblgpst.post_excerpt|truncate:100:' ...'|escape:'html':'UTF-8'}
									{else}
										{$xipblgpst.post_content|truncate:100:' ...'|escape:'html':'UTF-8'}
									{/if}
								</p>
								<div  class="read_more"><a href="{$xipblgpst.link}">{l s='Read More' mod='xipblogdisplayposts'}</a></div>	
							</div>
						</div>
					</article>
				{if $smarty.foreach.myLoop.iteration % 1 == 0 || $smarty.foreach.myLoop.last  }
				</div>
				{/if}
			{/foreach}
		</div>
		</div>
	{else}
		<p>{l s='No Blog Post Found' mod='xipblogdisplayposts'}</p>
	{/if}
	</div>
</div>
