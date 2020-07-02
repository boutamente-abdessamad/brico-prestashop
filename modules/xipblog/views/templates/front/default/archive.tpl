{extends file='page.tpl'}
{block name="page_content"}
{if isset($xipblogpost) && !empty($xipblogpost)}
<section class="kr_blog_post_area">
	<div class="kr_blog_post_inner">
		{foreach from=$xipblogpost item=xpblgpst}
			<article id="blog_post" class="blog_post blog_post_{$xpblgpst.post_format} clearfix">
				<div class="blog_post_content row">
					<div class="blog_post_content_top col-xs-12 col-md-3">
						<div class="post_thumbnail">
						{block name="xipblog_post_thumbnail"}
							{if $xpblgpst.post_format == 'video'}
								{assign var="postvideos" value=','|explode:$xpblgpst.video}
								{if $postvideos|@count > 1 }
									{assign var="class" value='carousel'}
								{else}
									{assign var="class" value=''}
								{/if}
								{include file="module:xipblog/views/templates/front/default/post-video.tpl" postvideos=$postvideos width='870' height="482" class=$class}
							{elseif $xpblgpst.post_format == 'audio'}
								{assign var="postaudio" value=','|explode:$xpblgpst.audio}
								{if $postaudio|@count > 1 }
									{assign var="class" value='carousel'}
								{else}
									{assign var="class" value=''}
								{/if}
								{include file="module:xipblog/views/templates/front/default/post-audio.tpl" postaudio=$postaudio class=$class}
							{elseif $xpblgpst.post_format == 'gallery'}
								{if $xpblgpst.gallery_lists|@count > 1 }
									{assign var="class" value='carousel'}
								{else}
									{assign var="class" value=''}
								{/if}
								{include file="module:xipblog/views/templates/front/default/post-gallery.tpl" gallery_lists=$xpblgpst.gallery_lists imagesize="large" class=$class}
							{else}
								<img class="img-responsive" src="{$xpblgpst.post_img_large}" alt="{$xpblgpst.post_title}">
								
							{/if}
						{/block}
						</div>
					</div>
					<div class="post_content col-xs-12 col-md-9">
						<h4 class="post_title"><a href="{$xpblgpst.link}">{$xpblgpst.post_title}</a></h4> 
						<div class="post_meta clearfix">
							<p class="meta_author">
								{l s='Posted by ' mod='xipblog'}
								<span>{$xpblgpst.post_author_arr.firstname} {$xpblgpst.post_author_arr.lastname}</span>
							</p>
							<p class="meta_date">
								{$xpblgpst.post_date|date_format:"%b %dTH, %Y"}
							</p>
							<p class="meta_category">
									<a href="{$xpblgpst.category_default_arr.link}">{$xpblgpst.category_default_arr.name}</a>
							</p>
						</div>
						<div class="post_description">
							{if isset($xpblgpst.post_excerpt) && !empty($xpblgpst.post_excerpt)}
								<p>{$xpblgpst.post_excerpt|truncate:500:'...'|escape:'html':'UTF-8'}</p>
							{else}
								<p>{$xpblgpst.post_content|truncate:400:'...'|escape:'html':'UTF-8'}</p>
							{/if}
						</div>
						<div class="read_more">
							<a class="more" href="{$xpblgpst.link}">{l s='Continue' mod='xipblog'} <i class="arrow_right"></i></a>
						</div>
					</div>
				</div>
			</article>
		{/foreach}
	</div>
</section>
{/if}
{include file="module:xipblog/views/templates/front/default/pagination.tpl"}
{/block}
{block name='breadcrumb'}
<div class="breadcrumb_container">
	<div class="container">
  <nav data-depth="{$breadcrumb.count+2}" class="breadcrumb">
    <ol itemscope itemtype="http://schema.org/BreadcrumbList">
      {foreach from=$breadcrumb.links item=path name=breadcrumb}
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="{$path.url}">
            <span itemprop="name">{$path.title}</span>
          </a>
          <meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration}">
        </li>
      {/foreach}
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<span itemprop="name">{l s='Blog' mod='xipblog'}</span>
		</li>
    </ol>
  </nav>
    	</div>
</div>
{/block}