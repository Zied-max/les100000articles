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

<form enctype="multipart/form-data" action="{$server}" method="post" id="slider-form"> 

	<h2>{l s='Brands Slider' mod='as_manufacturerslider'}</h2>
	
	{if isset($save_ok) && $save_ok}
		<div class="conf">
			<img src="../img/admin/ok2.png" alt=""> {l s='Settings was updated successfully' mod='as_manufacturerslider'}
		</div>
	{/if}

	<fieldset style="margin-top:10px" class="inside-fieldset">
		<legend><div id="setting" class="icon"></div>{l s='Settings' mod='as_manufacturerslider'}</legend>
			<label>{l s='Show on mobile devices' mod='as_manufacturerslider'}:</label>
			<div class="margin-form">
				<select name="display_on_mobile" style="width: 380px">
					<option value="1" {if (isset($display_on_mobile) && $display_on_mobile=='1')} selected="selected" {/if}>{l s='Yes' mod='as_manufacturerslider'}</option>
					<option value="2" {if (isset($display_on_mobile) && $display_on_mobile=='2')} selected="selected" {/if}>{l s='No' mod='as_manufacturerslider'}</option>
				</select>
			</div>
			<label>{l s='Manufacturers in slider' mod='as_manufacturerslider'}:</label>
			<div class="margin-form">
				<input type="text" name="count" value="{if (isset($count))} {$count} {/if}" />
				<p>{l s='Leave blank for no limit' mod='as_manufacturerslider'}</p>
			</div>
                        <div class="bms_brandwrap">
                         {foreach from=$manufacturers item=manufacturer name=manufacturers}
                            <div class="bms_thmb">
                            <img  src="{$img_manu_dir}{$manufacturer.image|escape:'htmlall':'UTF-8'}.jpg" alt="" width="200px" height="75px" />
                            <input type="checkbox"  name="bms_id[]" value="{$manufacturer.id_manufacturer}" {if in_array($manufacturer.id_manufacturer,$bms_id)} checked="checked"{/if}/>
                            </div>
                         {/foreach}
                        </div>
                        
                     <p>
			<input class="button" type="submit" name="submitUpdate" value="{l s='Save configuration' mod='as_manufacturerslider'}" />
	            </p>
	</fieldset>
</form>
                {literal}
                    <style type="text/css">
     .bms_thmb{ float: left;margin-left: 5px;border: solid 1px #ccc;margin: 10px 10px 10px 10px; }
     .bms_thmb input.chk{margin-left: 70px;}
     .bms_brandwrap{width:991px;overflow: hidden;margin-bottom: 20px;}
                    
                </style>
                {/literal}