{if $enable_brand_slider && $}
<div class="left-brands">
	<h1>Our Brands</h1>
	<ul id="brand-slider"> 
	{foreach from=$manufacturers item=manufacturer name=manufacturer_list}
		<li>
			<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)}">
			<img src="img/m/{$manufacturer.id_manufacturer}.jpg"></a>
		</li>
	{/foreach}
	</ul>
</div>
{/if}