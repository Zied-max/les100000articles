
<style type="text/css">
	.nbs-flexisel-nav-left, .nbs-flexisel-nav-right {
		display: none ;
	}
</style>


<h1> Nos Réferences </h1>
<ul id="logo-slider"> 
{foreach from=$manufacturers item=manufacturer name=manufacturer_list}
	<li>
		<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)}">
		<img src="/prestashop/img/su/{$manufacturer.id_manufacturer}.jpg"></a>
	</li>
{/foreach}


</ul>
<style type="text/css">
	.nbs-flexisel-nav-left, .nbs-flexisel-nav-right {
		display: none ;
	}
</style>


<h1> Nos Réferences </h1>
<ul id="logo-slider"> 
{foreach from=$manufacturers item=manufacturer name=manufacturer_list}
	<li>
		<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)}">
		<img src="/prestashop/img/m/{$manufacturer.id_manufacturer}.png"></a>
	</li>
{/foreach}


</ul>
