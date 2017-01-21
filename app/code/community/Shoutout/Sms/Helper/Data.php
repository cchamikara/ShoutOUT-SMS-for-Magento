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
 * Class Shoutout_Sms_Helper_Data
 */
class Shoutout_Sms_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Return all available order status
     *
     * @return array
     */
    public function getOrderStatus()
    {
        $status = array(
            'new' => 'When a New Order is Placed',
            'pending_payment' => 'When Order is in Pending Payment Status',
            'processing' => 'When Order is in Processing Status',
            'complete' => 'When Order Complete',
            'closed' => 'When Order Closed',
            'canceled' => 'When Order Canceled',
            'holded' => 'When Order Holded',
            'payment_review' => 'When Order is in Payment Review'
        );
        return $status;
    }
    
    /**
     * Return all possible customer attributes with the span wrapper as a string array
     *
     * @return array|string
     */
    public function getCustomerAttributesHtml($className)
    {
        $attributes = array(
            '{customer_id}' => '123',
            '{customer_email}' => 'test@test.com',
            '{customer_company}' => 'ShoutOUT',
            '{customer_lastname}' => 'Target',
            '{customer_firstname}' => 'Jhone',
            '{customer_address}' => 'Jhone Target, 30th St, New York, New York, 10450, US',
            '{customer_postcode}' => '12345',
            '{customer_city}' => 'Colombo',
            '{customer_country}' => 'Sri Lanka',
            '{customer_state}' => 'NWP',
            '{customer_phone}' => '0771234567',
            '{customer_vat_number}' => 'XX1234567',
            /*'{customer_invoice_company}' => 'ShoutOUT',
            '{customer_invoice_lastname}' => 'Target',
            '{customer_invoice_firstname}' => 'Jhone',
            '{customer_invoice_address}' => 'Street name 44',
            '{customer_invoice_postcode}' => '345',
            '{customer_invoice_city}' => 'Kurunegala',
            '{customer_invoice_country}' => 'Sri Lanka',
            '{customer_invoice_state}' => '21121',
            '{customer_invoice_phone}' => '0771234567',
            '{customer_invoice_vat_number}' => 'AWS989'*/
        );
        $helperHook = [];
        foreach ($attributes as $attr => $value){
            $helperHook[] = '<span class="'.$className.'" title="'.$value.'">'.$attr.'</span>';
        }
        return $helperHook;
    }

    /**
     * Return all possible shop attributes with the span wrapper as a string array
     *
     * @param $className
     * @return array
     */
    public function getShopAttributesHtml($className)
    {
        $attributes = array(
            '{shop_email}' => 'contact@shop.com',
            '{shop_phone}' => '0771234567',
        );
        $helperHook = [];
        foreach ($attributes as $attr => $value){
            $helperHook[] = '<span class="'.$className.'" title="'.$value.'">'.$attr.'</span>';
        }
        return $helperHook;
    }

    /**
     * Return all possible Order attributes with the span wrapper as a string array
     *
     * @param $className
     * @return array
     */
    public function getOrderAttributesHtml($className)
    {
        $attributes = array(
            '{order_id}' => '100000199',
            '{order_total_paid}' => '456.32',
            '{order_currency}' => 'Rs',
            '{order_date}' => 'May 25, 2013 12:12:11 AM',
            '{carrier_name}' => 'DHL'
        );
        $helperHook = [];
        foreach ($attributes as $attr => $value){
            $helperHook[] = '<span class="'.$className.'" title="'.$value.'">'.$attr.'</span>';
        }
        return $helperHook;
    }

    /**
     * For status filter in SMS History Grid
     *
     * @return array
     */
    public function orderGridStatus()
    {
        $status = array(
            'new' => 'New / Pending',
            'pending_payment' => 'Pending Payment',
            'processing' => 'Processing',
            'complete' => 'Complete',
            'closed' => 'Closed',
            'canceled' => 'Canceled',
            'holded' => 'Holded',
            'payment_review' => 'Payment Review'
        );
        return $status;
    }
}
	 