<?php
/*
* 2007-2014 PrestaShop 
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
* @category   Opensum
* @package    opensumManufacturerSlider
* @author    vivek kumar tripathi <vivek@opensum.com>
* @site    http://opensum.com
* @copyright  Copyright (c) 2010 - 2012 BelVG LLC. (http://www.opensum.com)
*/
class OS_manufacturerslider extends Module
{
	private $_html;
	 public function __construct(){
		$this->name = 'os_manufacturerslider';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'vivek kumar tripathi';
	//	$this->need_instance = 0;
		parent::__construct();
		$this->bootstrap = true;
		$this->displayName = $this->l('Manufacturer/Brands Slider');
		$this->description = $this->l('Display slider with manufacturers/Brand on your site.');
                $this->confirmUninstall = $this->l('Uninstalling Brand slider from the customer');
	}

	 public function install()
                 {
		      if (!parent::install() OR
			!Configuration::updateValue('BMS_DISPLAY_ON_MOBILE', 1) OR 
			!Configuration::updateValue('BMS_COUNT', '20') OR 
			!Configuration::updateValue('BMS_SBRAND', '1') OR 
			!$this->registerHook('home') OR
			!$this->registerHook('header')
		) {
			return false;
		}
		$this->updatePosition(Hook::get('home'), 0, 1);
		return true;
	        }
	
	public function uninstall(){
		if (!parent::uninstall())
			return false;
		return true;
	}
	
	function hookHeader(){
		if(Configuration::get('BMS_DISPLAY_ON_MOBILE') && $this->checkMobileDevice()){
			return false;
		}
		$this->context->controller->addJS(__PS_BASE_URI__ . 'modules/os_manufacturerslider/js/jcarousellite.js');
		$this->context->controller->addCSS(__PS_BASE_URI__ . 'modules/os_manufacturerslider/css/skin.css');
	}
	
	function hookHome($params){ 
		global $smarty, $cookie;
		
		if(Configuration::get('BMS_DISPLAY_ON_MOBILE') && $this->checkMobileDevice()){
			return false;
		}
		
		$only_active = TRUE;
		$n = 0;
		$p = Configuration::get('BMS_COUNT') ? Configuration::get('BMS_COUNT') : 999;
		$manufacturers=Manufacturer::getManufacturers(true, $cookie->id_lang, $only_active, $n, $p);
                $unselect_br=unserialize(Configuration::get('BMS_SBRAND'));
                foreach( $manufacturers as $key =>$value ){
              $h=$value['id_manufacturer'];
              if(in_array($h,$unselect_br)){}
                else {unset ($manufacturers[$key]);}
                }
                
		foreach ($manufacturers AS &$row){
			$row['image'] = (!file_exists(_PS_MANU_IMG_DIR_.'/'.$row['id_manufacturer'].'-medium_default.jpg')) ? Language::getIsoById((int)$cookie->id_lang).'-default' : $row['id_manufacturer'];
                }
		$smarty->assign(array(
			'manufacturers' => $manufacturers,
			'img_manu_dir' => _THEME_MANU_DIR_,
			'nbManufacturers' => count($manufacturers),
			'mediumSize' => Image::getSize('medium'),
		));
            return $this->display(__FILE__, '/tpl/front/slider.tpl');		
	}
	
	public function getContent(){
                
		global $smarty ;
		if(Tools::isSubmit('submitUpdate')) {
                    $select_br=serialize(Tools::getValue('bms_id'));
                   	Configuration::updateValue('BMS_SBRAND',$select_br);
                    	Configuration::updateValue('BMS_DISPLAY_ON_MOBILE', Tools::getValue('display_on_mobile'));
			Configuration::updateValue('BMS_COUNT', Tools::getValue('count'));
			
			$smarty->assign(array(
				'save_ok' => true
			));
		}
		$this->_html .= $this->_displayForm();
		return $this->_html;
	}
	
	private function _displayForm(){
		global $smarty , $cookie;
		$only_active = TRUE;
		$n = 0;
                $p = Configuration::get('BMS_COUNT') ? Configuration::get('BMS_COUNT') : 999;
                $manufacturers=Manufacturer::getManufacturers(true, $cookie->id_lang, $only_active, $n, $p);
                foreach ($manufacturers AS &$row){
		$row['image'] = (!file_exists(_PS_MANU_IMG_DIR_.'/'.$row['id_manufacturer'].'-medium_default.jpg')) ? Language::getIsoById((int)$cookie->id_lang).'-default' : $row['id_manufacturer'];
                }
                
                $unselect_br=unserialize(Configuration::get('BMS_SBRAND'));
                
		$smarty->assign(array(
			'quickview_module_dir' => dirname(__FILE__),
			'display_on_mobile' => Configuration::get('BMS_DISPLAY_ON_MOBILE'),
			'count' => Configuration::get('BMS_COUNT'),
                        'manufacturers' => $manufacturers,
			'img_manu_dir' => _THEME_MANU_DIR_,
			'mediumSize' => Image::getSize('medium'),
                        'bms_id'=>$unselect_br
		));

		return $this->display(__FILE__, 'tpl/admin/content.tpl');
	}
	
	public function checkMobileDevice(){
		if (preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipaq|ipod|j2me|java|midp|mini|mmp|mobi\s|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|zte)/i', $_SERVER['HTTP_USER_AGENT'], $out))
			return true;
	}
}
