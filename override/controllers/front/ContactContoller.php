/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<?php

class ContactController extends ContactControllerCore {
    
    private $googleMapsApiKey = '';
    
    public function initContent()
    {
        parent::initContent();

        $this->registerJavascript(
           'google-maps-api',
           'https://maps.googleapis.com/maps/api/js?key='.$this->googleMapsApiKey.'&callback=myMap',
           ['server' => 'remote', 'position' => 'bottom', 'priority' => 999, 'attribute' => 'defer']
        );

        $this->registerJavascript(
           'google-map',
           'themes/TWÓJ_SZABLON/assets/js/google-map-contact.js',
           ['server' => 'remote', 'position' => 'head', 'priority' => 999]
        );         
    }      
}
