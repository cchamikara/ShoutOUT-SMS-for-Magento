<?php

/**
 * ShoutOUT Lite (https://lite.getshoutout.com/).
 *
 * @category    Shoutout
 * @package     Shoutout_Sms
 * @author      Chamal Chamikara <chamalchamikara@gmail.com>
 * @copyright   Copyright (c) 2017 Chamal Chamikara. (http://www.learnmagento.com/)
 */
class Shoutout_Sms_Block_Backend_Page_Header extends Mage_Adminhtml_Block_Abstract implements Varien_Data_Form_Element_Renderer_Interface
{
    /**
     * Render fieldset html & scripts
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $html = '
        <div class="shoutout-config">
            <img src="'.Mage::getDesign()->getSkinBaseUrl(array('_area'=>'adminhtml')).'/images/shoutout.png"/>
            <div class="top-container">
                <h4 class="main-desc">
                    ShoutOUT SMS Extension Community Edition v1.0.0
                </h4>
                <h4>This module requires an account,
                    API Key and SMS credits with
                    <a href="https://lite.getshoutout.com" target="_blank">www.lite.getshoutout.com</a>.
                    <br>
                    To login an account
                    <a href="https://lite.getshoutout.com/login" target="_blank">click here</a>
                    <br>
                    To view instructions on how to configure this module
                </h4>
                <p>
                    Query? Feel free to contact the team by <a href="mailto:info@sqrmobile.com">Email</a>
                </p>
        </div>
                
        ';
        return $html;
    }
}