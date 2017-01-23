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
 * Class Shoutout_Sms_Model_Observer
 */
class Shoutout_Sms_Model_Observer
{
    /**
     * Catch order status change and direct to API functions
     *
     * @param Varien_Event_Observer $observer
     */
    public function sendSMS(Varien_Event_Observer $observer)
    {
        if ($observer->getOrder()->getOrigData('status') != $observer->getOrder()->getData('status')) {
            Mage::helper('sms/api')->send($observer->getOrder()->getData('status'), $observer->getOrder());
        }
    }

    /**
     *
     *
     * @param Varien_Event_Observer $observer
     */
    public function newOrder(Varien_Event_Observer $observer)
    {
        Mage::helper('sms/api')->send(Mage_Sales_Model_Order::STATE_NEW, $observer->getOrder());
    }

    public function dailyStatusSend()
    {
        if(!Mage::helper('sms/api')->isAdminSMSEnabled()) return;
        Mage::helper('sms/api')->sendAdmin();
    }
}
