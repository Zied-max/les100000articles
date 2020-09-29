{**
 * 2007-2019 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{extends file='page.tpl'}

{block name='page_header_container'}{/block}

{block name='left_column'}
<div><section id="contact-map">
    <div class="row">    
        <div class="col-12">
          <p class="test" style="
    color: #C2185B;
    font-family: 'Droid serif', serif;
    font-size: 36px;
    font-weight: 400;
    font-style: italic;
    line-height: 44px;
    margin: 0 0 12px;
    text-align: center;
">Notre localisation </p>  
          <iframe class="goomap" src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d1383.7096676301505!2d10.640210509130249!3d35.82510870928917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d35.573222799999996!2d10.404285999999999!4m5!1s0x130275759ac9d10d%3A0x698e3915682cef7d!2zU291c3NlINiz2YjYs9ip!3m2!1d35.8245029!2d10.634584!5e1!3m2!1sfr!2stn!4v1595021782471!5m2!1sfr!2stn"  
            allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
        </div>  
    </div>    
</section></div>


  

 
  <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
    {widget name="ps_contactinfo" hook='displayLeftColumn'}
  </div>
{/block}

{block name='page_content'}
  {widget name="contactform"}
{/block}

