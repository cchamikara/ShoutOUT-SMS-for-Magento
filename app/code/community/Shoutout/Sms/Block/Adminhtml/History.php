<?php
/**
 * ShoutOUT Lite (https://lite.getshoutout.com/).
 *
 * @category    Shoutout
 * @package     Shoutout_Sms
 * @author      Chamal Chamikara <chamalchamikara@gmail.com>
 * @copyright   Copyright (c) 2017 Chamal Chamikara. (http://www.learnmagento.com/)
 */

/**
 * Class Shoutout_Sms_Block_Adminhtml_History
 */
class Shoutout_Sms_Block_Adminhtml_History extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_controller = "adminhtml_history";
        $this->_blockGroup = "sms";
        $this->_headerText = Mage::helper("sms")->__("SMS History");
        $this->_addButtonLabel = Mage::helper("sms")->__("Add New Item");
        parent::__construct();
        $this->_removeButton('add');
    }
}