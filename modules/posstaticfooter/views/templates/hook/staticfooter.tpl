{foreach $footerBlocks as $footerBlock}
<div class="col-md-{$footerBlock.width} links footer_block">
{if $footerBlock.active_title == 1}
	<h3 class=" hidden-sm-down">{$footerBlock.title}</h3>
	<div class="title clearfix hidden-md-up" data-target="#footer_{$footerBlock.id}" data-toggle="collapse">
		<h3>{$footerBlock.title}</h3>
		<span class="float-xs-right">
			<span class="navbar-toggler collapse-icons">
				<i class="material-icons add">keyboard_arrow_down</i>
				<i class="material-icons remove">keyboard_arrow_up</i>
			</span>
		</span>
	</div>
  {if $footerBlock.type_content == 0}
    <ul id="footer_{$footerBlock.id}" class="collapse footer_list">
      {foreach $footerBlock.links as $link}
	
        <li>
          <a
            id="{$link.id}-{$footerBlock.id}"
            class="{$link.class}"
            href="{$link.url}"
            title="{$link.description}"
            {if !empty($link.target)} target="{$link.target}" {/if}
          >
            {$link.title}
          </a>
        </li>
      {/foreach}
    </ul>
  {else}
   <div id="footer_{$footerBlock.id}" class="collapse footer_list">
    {$footerBlock.html_content nofilter}
    {if $footerBlock.module_content}
      {$footerBlock.module_content nofilter}
    {/if}
	</div>	
  {/if}
{else}
  {if $footerBlock.type_content == 0}
    <ul>
      {foreach $footerBlock.links as $link}
        <li>
          <a
            id="{$link.id}-{$footerBlock.id}"
            class="{$link.class}"
            href="{$link.url}"
            title="{$link.description}"
            {if !empty($link.target)} target="{$link.target}" {/if}
          >
            {$link.title}
          </a>
        </li>
      {/foreach}
    </ul>
  {else}
    {$footerBlock.html_content nofilter}
    {if $footerBlock.module_content}
      {$footerBlock.module_content nofilter}
    {/if}
  {/if}
{/if}
</div>
{/foreach}
