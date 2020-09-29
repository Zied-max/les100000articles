{*
* 2007-2012 PrestaShop 
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*         DISCLAIMER   *
* *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
* @category   
* @package    
* @author    
* @site    
* @copyright  
* @license   
*}


{literal} 

<!-- bxSlider Javascript file --> 
<!--<script src="{/literal}{$modules_dir}{literal}os_manufacturerslider/js/jquery.slider.js"></script> -->
<!-- bxSlider CSS file -->
<link href="{/literal}{$modules_dir}{literal}os_manufacturerslider/css/jquery.slider.css" rel="stylesheet" />
<script type="text/javascript">
    $(document).ready(function(){
		$('ul#manufacturers_list').bxSlider({
	       adaptiveHeightSpeed:false ,
            adaptiveHeight: false ,
		  minSlides:1,
		  maxSlides: 4,
                    autoControls: true,
		  slideWidth:216,
		  slideMargin:26,
		  auto: true,
                  pager:false
		});
    });
    </script> 
{/literal}

{*<h2>{l s='Manufacturers'}</h2>*}
{if isset($errors) AND $errors}
	{include file="$tpl_dir./errors.tpl"}
{else}
	{*<p class="nbrmanufacturer">{strip}
		<span class="bold">
			{if $nbManufacturers == 0}{l s='There are no manufacturers.'}
			{else}
				{if $nbManufacturers == 1}
					{l s='There is %d manufacturer.' sprintf=$nbManufacturers}
				{else}
					{l s='There are %d manufacturers.' sprintf=$nbManufacturers}
				{/if}
			{/if}
		</span>{/strip}
	</p>*}
	{if $nbManufacturers > 0}
            <div class="brand-slider">
		<ul id="manufacturers_list">
		{foreach from=$manufacturers item=manufacturer name=manufacturers}
			<li class="clearfix {if $smarty.foreach.manufacturers.first}first_item{elseif $smarty.foreach.manufacturers.last}last_item{else}item{/if}"> 
				<div class="left_side">
					<!-- logo -->
					<div class="logo">
					{if $manufacturer.nb_products > 0}<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$manufacturer.name|escape:'htmlall':'UTF-8'}" class="lnk_img">{/if}
						<img  src="{$img_manu_dir}{$manufacturer.image|escape:'htmlall':'UTF-8'}.jpg" alt="" width="200px" height="75px" />
					{if $manufacturer.nb_products > 0}</a>{/if}
					</div>
					
				</div>

			</li>
		{/foreach}
		</ul>
            </div>
		{include file="$tpl_dir./pagination.tpl"}
	{/if}
{/if}
