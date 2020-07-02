<div id="_desktop_contact_link">
  <div class="contact-link">
	{if $contact_infos.phone}
	<div class="data phone">
		<a href="tel:{$contact_infos.phone}">{$contact_infos.phone}</a> 
	</div>
	{/if}
	{if $contact_infos.email}
	<div class="data email">
	 <a href="mailto:{$contact_infos.email}">{$contact_infos.email}</a>
	</div>
	{/if}
  </div>
</div>