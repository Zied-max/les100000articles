<?php
/**
* 2007-2015 PrestaShop
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
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaPatron
*  @copyright  2017-2019 Presta Patron
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License 
*/


if (!defined('_PS_VERSION_')) {
  exit;
}


class Ppbrandslider extends Module {
	public function __construct() {
		$this->name = 'ppbrandslider';
	    $this->tab = 'advertising_marketing';
	    $this->version = '1.0.0';
	    $this->author = 'Presta Patron';
	    $this->need_instance = 0;
	    $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
	    $this->bootstrap = true;
	 
	    parent::__construct();
	 
	    $this->displayName = $this->l('Brand Logo Slider');
	    $this->description = $this->l('This module add a gallery or slider with Brand Logos in your shop, with link on the image to directly go to manufacturer\'s page.');
	    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');	    
	}

	public function install(){

		if (Shop::isFeatureActive()) {
		    Shop::setContext(Shop::CONTEXT_ALL);
		}

		$slidersettings = $this->getModulesliderSettings();

		foreach ($slidersettings as $name => $value) {
            Configuration::updateValue($name, $value);
        }		
	
		return parent::install() && 	
			$this->registerHook('displayHome') &&
			$this->registerHook('displayAfterProductThumbs') &&
			$this->registerHook('displayProductListReviews') &&
			$this->registerHook('header');
	}

	public function uninstall() {
		$slidersettings = $this->getModulesliderSettings();

        foreach (array_keys($slidersettings) as $name) {
            Configuration::deleteByName($name);
        }	
		// All went well!
		return parent::uninstall();
	}

	protected function getModulesliderSettings() {
        $slidersettings = array(
        	'ENABLE_BRAND_SLIDER' => 1,
        	'VISIBLE_ITEMS' => '4',
            'SCROLL_ITEMS' => '1',
            'ANIMATION_SPEED' => '1500',
            'AUTOPLAY_SLIDER' => 1,
            'SHOW_ARROWS' => 1,
            'MOUSE_HOVER' => 1,
        );
        return $slidersettings;
    }


	public function getContent() {
			
		return $this->renderForm();
	}

	public function renderForm() {

		// Get default language
	    $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
	   	$this->processConfiguration();
		$this->assignConfiguration();
		 $fields_form = null;
	    // Init Fields form array
	    $fields_form[0]['form'] = array(
	        'legend' => array(
	        'title' => $this->l('Brand Logo SLider Settings'),
	        ),
	        'input' => array(
	        	array(
                    'type' => 'switch',
                    'label' => $this->l('Enable Brand Slider:'),
                    'hint' => $this->l('Enable to add logo slider on home page'),
                    'name' => 'ENABLE_BRAND_SLIDER',
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),

                array(
	                'type' => 'text',
	                'label' => $this->l('Visible Items:'),
                    'hint' => $this->l('The number of visible Items'),
                    'class'    => 'sm',
	                'name' => 'VISIBLE_ITEMS',
	            ),

	            array(
	                'type' => 'text',
	                'label' => $this->l('Scroll Items:'),
                    'hint' => $this->l('The number of scroll Items'),
                    'class'    => 'sm',
	                'name' => 'SCROLL_ITEMS',
	            ),

	            array(
	                'type' => 'text',
	                'label' => $this->l('Animation Speed:'),
                    'hint' => $this->l('The speed of animation'),
                    'class'    => 'sm',
	                'name' => 'ANIMATION_SPEED',
	            ),

	            array(
                    'type' => 'switch',
                    'label' => $this->l('Autoplay Slider:'),
                    'hint' => $this->l('Autoplay Slider'),
                    'name' => 'AUTOPLAY_SLIDER',
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),


                array(
                    'type' => 'switch',
                    'label' => $this->l('Show Arrows:'),
                    'hint' => $this->l('The left/right arrows will be added to the slider.'),
                    'name' => 'SHOW_ARROWS',
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),

                array(
                    'type' => 'switch',
                    'label' => $this->l('Pause on Mouse Hover:'),
                    'hint' => $this->l('Show slider on left or right column on category pages.'),
                    'name' => 'MOUSE_HOVER',
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),

                

	        	
	        ),
	        'submit' => array(
	            'title' => $this->l('Save'),
	            'class' => 'btn btn-default pull-right'
	        )
	    );

	    
	     
	    $helper = new HelperForm();
	     
	    // Module, token and currentIndex
	    $helper->module = $this;
	    $helper->name_controller = $this->name;
	    $helper->token = Tools::getAdminTokenLite('AdminModules');
	    $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
	     
	    // Language
	    $helper->default_form_language = $default_lang;
	    $helper->allow_employee_form_lang = $default_lang;
	     
	    // Title and toolbar
	    $helper->title = $this->displayName;
	    $helper->show_toolbar = true;        // false -> remove toolbar
	    $helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
	    $helper->submit_action = 'submit'.$this->name;
	    $helper->toolbar_btn = array(
	        'save' =>
	        array(
	            'desc' => $this->l('Save'),
	            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
	            '&token='.Tools::getAdminTokenLite('AdminModules'),
	        ),
	        'back' => array(
	            'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
	            'desc' => $this->l('Back to list')
	        )
	    );
	     
	    // Load current value
	    $helper->fields_value['ENABLE_BRAND_SLIDER'] = Configuration::get('ENABLE_BRAND_SLIDER');
	    $helper->fields_value['VISIBLE_ITEMS'] = Configuration::get('VISIBLE_ITEMS');
	    $helper->fields_value['SCROLL_ITEMS'] = Configuration::get('SCROLL_ITEMS');
	    $helper->fields_value['ANIMATION_SPEED'] = Configuration::get('ANIMATION_SPEED');
	    $helper->fields_value['AUTOPLAY_SLIDER'] = Configuration::get('AUTOPLAY_SLIDER');
	    $helper->fields_value['SHOW_ARROWS'] = Configuration::get('SHOW_ARROWS');
	    $helper->fields_value['MOUSE_HOVER'] = Configuration::get('MOUSE_HOVER');
	   
	    return $helper->generateForm($fields_form);
	}


	public function processConfiguration(){
		$output = null;
		if (Tools::isSubmit('submit'.$this->name)) {	

			$enable_brand_slider = Tools::getValue('ENABLE_BRAND_SLIDER');
			Configuration::updateValue('ENABLE_BRAND_SLIDER', $enable_brand_slider);

	    	$visible_items = Tools::getValue('VISIBLE_ITEMS');
	    	Configuration::updateValue('VISIBLE_ITEMS', $visible_items);

	    	$scroll_items = Tools::getValue('SCROLL_ITEMS');
	    	Configuration::updateValue('SCROLL_ITEMS', $scroll_items);
	    	
	    	$animation_speed = Tools::getValue('ANIMATION_SPEED');
	    	Configuration::updateValue('ANIMATION_SPEED', $animation_speed);

	    	$autoplay_slider = Tools::getValue('AUTOPLAY_SLIDER');
	    	Configuration::updateValue('AUTOPLAY_SLIDER', $autoplay_slider);

	    	$show_arrows = Tools::getValue('SHOW_ARROWS');
	    	Configuration::updateValue('SHOW_ARROWS', $show_arrows);

	    	$mouse_hover = Tools::getValue('MOUSE_HOVER');
	    	Configuration::updateValue('MOUSE_HOVER', $mouse_hover);

	    	
	    	$output .= $this->displayConfirmation($this->l(' Settings Updated'));

		}
	}

	public function assignConfiguration() {
		$enable_brand_slider = Configuration::get('ENABLE_BRAND_SLIDER');		
		$this->context->smarty->assign('enable_brand_slider', $enable_brand_slider);


		$visible_items = Configuration::get('VISIBLE_ITEMS');
		$this->context->smarty->assign('visible_items', $visible_items);
		
		$scroll_items = Configuration::get('SCROLL_ITEMS');
		$this->context->smarty->assign('scroll_items', $scroll_items);

		$animation_speed = Configuration::get('ANIMATION_SPEED');
		$this->context->smarty->assign('animation_speed', $animation_speed);

		$autoplay_slider = Configuration::get('AUTOPLAY_SLIDER');
		$this->context->smarty->assign('autoplay_slider', $autoplay_slider);

		$show_arrows = Configuration::get('SHOW_ARROWS');
		$this->context->smarty->assign('show_arrows', $show_arrows);

		$mouse_hover = Configuration::get('MOUSE_HOVER');
		$this->context->smarty->assign('mouse_hover', $mouse_hover);

		
		Media::addJsDef(array(
    		'visible_items' =>  $visible_items,
    		'scroll_items'	=>	$scroll_items,
    		'animation_speed'	=>	$animation_speed,
    		'autoplay_slider'	=>	$autoplay_slider,
    		'show_arrows'	=>	$show_arrows,
    		'mouse_hover'	=>	$mouse_hover,
    	)); 
	}

	public function hookDisplayHeader() {	
		
		$this->context->controller->addCSS($this->_path.'views/css/ppbrandslider.css');	

		$this->context->controller->addJS($this->_path.'views/js/jquery.flexisel.js'); 

		$this->context->controller->addJS($this->_path.'views/js/ppbrandslider.js'); 
		
	}

	public function hookDisplayHome($params) {
		
		$this->processConfiguration();
		$this->assignConfiguration();

		$this->smarty->assign(array(
	       'manufacturers' => Manufacturer::getManufacturers(),
	       'link' => $this->context->link,
		));	


		return $this->display(__FILE__, 'displayHome.tpl');
	}

	
	public function hookLeftColumn($params){
		
		$this->processConfiguration();
		$this->assignConfiguration();

		 $this->smarty->assign(array(
		       'manufacturers' => Manufacturer::getManufacturers(),
		       'link' => $this->context->link,
		 ));
		
		return $this->display(__FILE__, 'leftColumn.tpl');
	}


	public function hookDisplayAfterProductThumbs($params){
		
		return $this->display(__FILE__, 'displayAfterProductThumbs.tpl');
	}

	public function hookDisplayProductListReviews($params){
		
		$id_product = (int)$params['product']['id_product'];		

		$id_manufacturer = Db::getInstance()->getValue(' select `id_manufacturer` FROM ' ._DB_PREFIX_.'product  where `id_product` =' . $id_product); 

		 $this->smarty->assign(array(
		       'id_manufacturer' => $id_manufacturer,
		      
		 ));
		
		return $this->display(__FILE__, 'displayProductListReviews.tpl');
	}
	
}