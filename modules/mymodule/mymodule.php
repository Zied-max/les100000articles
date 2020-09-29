<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('_PS_VERSION_')) {
    exit;
}
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
class MyModule extends Module implements WidgetInterface {
      
    public function __construct()
	{       
		$this->name = 'MyModule';
		$this->version = '1.0.0';
		$this->author = 'Zied';
		$this->need_instance = 0;

                $this->bootstrap = true;
                parent::__construct();

                $this->displayName = $this->trans('Mymodule', array(), 'Modules.Mymodule.Admin');
                $this->description = $this->trans('Displays a Mymodule on your shop.', array(), 'Modules.Mymodule.Admin');
                $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
                $this->templateFile = 'module:mymodule/mymodule.tpl';
        }     
    public function install()
    {
            return (parent::install() &&
            $this->registerHook('displayHome')&&
            $this->registerHook('actionObjectLanguageAddAfter') 
            );
    }
    public function uninstall()
    {
        Configuration::deleteByName('BANNER_IMG');
        Configuration::deleteByName('BANNER_LINK');
        Configuration::deleteByName('BANNER_DESC');

        return parent::uninstall();
    }
    public function hookdisplayHome()
    {
        return $this->display(__FILE__,'test.html') ; 
    }

    public function getWidgetVariables($hookName, array $configuration) {
        
    }

    public function renderWidget($hookName, array $configuration) 
    {
        if (!$this->isCached($this->templateFile, $this->getCacheId('MyModule'))) {
            $this->smarty->assign($this->getWidgetVariables($hookName, $params));
        }

        return $this->fetch($this->templateFile, $this->getCacheId('MyModule'));
    }        

}



        