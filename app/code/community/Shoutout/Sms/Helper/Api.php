<?php
/**
 * ShoutOUT Lite (https://lite.getshoutout.com/).
 *
 * @category    Shoutout
 * @package     Shoutout_Sms
 * @author      Chamal Chamikara <chamalchamikara@gmail.com>
 * @copyright   Copyright (c) 2017 Chamal Chamikara. (http://www.learnmagento.com/)
 */

require Mage::getBaseDir('lib') . '/ShoutOUT/vendor/autoload.php';

/**
 * Class Shoutout_Sms_Helper_Api
 */
class Shoutout_Sms_Helper_Api extends Mage_Core_Helper_Abstract
{
    /**
     * ShoutOUT API key config
     */
    const SHOUTOUT_API_KEY_CONFIG = 'shoutout/api/api_key';

    /**
     * ShoutOUT sender ID config
     */
    const SHOUTOUT_SENDER_ID_CONFIG = 'shoutout/api/sender_id';

    /**
     * ShoutOUT log config
     */
    const SHOUTOUT_LOG_CONFIG = 'shoutout/api/enable_logs';

    /**
     * ShoutOUT SSL config
     */
    const SHOUTOUT_SSL_CONFIG = 'shoutout/api/enable_ssl';

    /**
     * ShoutOUT country code
     */
    const SHOUTOUT_COUNTRY_CODE_CONFIG = 'shoutout/api/country_code';

    /**
     * Default country code
     */
    const DEFAULT_COUNTRY_CODE = '94';


    /**
     * Get ShoutOUT API key
     *
     * @return mixed
     */
    public function getAPIKey()
    {
        return Mage::getStoreConfig(self::SHOUTOUT_API_KEY_CONFIG);
    }

    /**
     * get ShoutOUT Sender ID
     *
     * @return mixed
     */
    public function getSenderId()
    {
        return Mage::getStoreConfig(self::SHOUTOUT_SENDER_ID_CONFIG);
    }

    /**
     * get ShoutOUT log settings
     *
     * @return mixed
     */
    public function getLogSettings()
    {
        return Mage::getStoreConfig(self::SHOUTOUT_LOG_CONFIG);
    }

    /**
     * get ShoutOUT SSL config
     *
     * @return mixed
     */
    public function getSSLConfig()
    {
        return Mage::getStoreConfig(self::SHOUTOUT_SSL_CONFIG);
    }

    /**
     * get Country code
     *
     * @return mixed|string
     */
    public function getCountryCode()
    {
        if(Mage::getStoreConfig(self::SHOUTOUT_COUNTRY_CODE_CONFIG)){
            return Mage::getStoreConfig(self::SHOUTOUT_COUNTRY_CODE_CONFIG);
        }
        return self::DEFAULT_COUNTRY_CODE;
    }

    /**
     * Generate real message which ready to send
     *
     * @param $template
     * @param $order
     * @return mixed
     */
    public function generateMessage($template, $order)
    {
        // Order Customer Data
        $customer_id = $order->getCustomerId();
        $customer_email = $order->getCustomerEmail();
        $customer_company = $order->getShippingAddress()->getCompany() ? $order->getShippingAddress()->getCompany() : '';
        $customer_firstname = $order->getCustomerFirstname();
        $customer_lastname = $order->getCustomerLastname();
        $customer_address = $order->getCustomerName().', '.$order->getShippingAddress()->getStreet()[0].', '.$order->getShippingAddress()->getCity().', '.$order->getShippingAddress()->getRegion().', '.$order->getShippingAddress()->getPostcode().', '.$order->getShippingAddress()->getCountry();
        $customer_postcode = $order->getShippingAddress()->getPostcode();
        $customer_city = $order->getShippingAddress()->getCity();
        $customer_country = $order->getShippingAddress()->getCountry();
        $customer_state = $order->getShippingAddress()->getRegion();
        $customer_phone = $order->getShippingAddress()->getTelephone();
        $customer_vat_number = $order->getCustomerTaxvat() ? $order->getCustomerTaxvat() : '';

        // Shop Data
        $shop_email = Mage::getStoreConfig('trans_email/ident_general/email');
        $shop_phone = Mage::getStoreConfig('general/store_information/phone');

        // Order Data
        $order_id = $order->getIncrementId();
        $order_total_paid = Mage::helper('core')->currency($order->getGrandTotal(), true, false);
        $order_currency = $order->getBaseCurrencyCode();
        $order_date = $order->getCreatedAt();
        $carrier_name = $order->getShippingDescription();

        $attributes = array(
            '{customer_id}',
            '{customer_email}',
            '{customer_company}',
            '{customer_lastname}',
            '{customer_firstname}',
            '{customer_address}',
            '{customer_postcode}',
            '{customer_city}',
            '{customer_country}',
            '{customer_state}',
            '{customer_phone}',
            '{customer_vat_number}',
            '{shop_email}',
            '{shop_phone}',
            '{order_id}',
            '{order_total_paid}',
            '{order_currency}',
            '{order_date}',
            '{carrier_name}'
        );

        $possibleVariables = array(
            $customer_id,
            $customer_email,
            $customer_company,
            $customer_lastname,
            $customer_firstname,
            $customer_address,
            $customer_postcode,
            $customer_city,
            $customer_country,
            $customer_state,
            $customer_phone,
            $customer_vat_number,
            $shop_email,
            $shop_phone,
            $order_id,
            $order_total_paid,
            $order_currency,
            $order_date,
            $carrier_name
        );
        $message = str_replace($attributes, $possibleVariables, $template);

        return $message;
    }

    /**
     * Format Telephone Number
     *
     * @param $phoneNumber
     * @return string
     */
    protected function formatTelephoneNumber($phoneNumber)
    {
        $numberWithoutPrefix = substr($phoneNumber, -9);
        return $this->getCountryCode().$numberWithoutPrefix;
    }

    /**
     * Return Shipping telephone number or billing telephone number
     *
     * @param $order
     * @return bool|string
     */
    public function getCustomerPhoneNumber($order)
    {
        $shippingPhoneNumber = $order->getShippingAddress()->getTelephone();
        if($shippingPhoneNumber) return $this->formatTelephoneNumber($shippingPhoneNumber);
        $billingPhoneNumber = $order->getBillingAddress()->getTelephone();
        if($billingPhoneNumber) return $this->formatTelephoneNumber($billingPhoneNumber);
        return false;
    }

    /**
     * Send SMS through ShoutOUT SDK
     *
     * @param $sms
     * @param $order
     * @param $status
     * @internal param $message
     */
    public function shoutOUTSendSMS($sms, $order, $status)
    {
        $apiKey = $this->getAPIKey();
        $customerPhone = $this->getCustomerPhoneNumber($order);
        if($customerPhone){
            $config = Swagger\Client\Configuration::getDefaultConfiguration();
            $config->setApiKey('Authorization',$apiKey);
            $config->setApiKeyPrefix('Authorization', 'Apikey');
            if($this->getSSLConfig()) $config->setSSLVerification(true);
            if($this->getLogSettings()) $config->getDebug();

            $apiInstance = new Swagger\Client\Api\DefaultApi();
            $message = new Swagger\Client\Model\Message(array(
                'source' => $this->getSenderId(),
                'destinations' => [$customerPhone],
                'content' => array(
                    'sms' => $sms
                ),
                'transports' => ['SMS']
            ));
            try{
                $result = $apiInstance->messagesPost($message,$config);
                try{
                    Mage::getModel('sms/history')
                        ->setData('order_id', $order->getIncrementId())
                        ->setData('order_status', $status)
                        ->setData('mobile_no', $customerPhone)
                        ->setData('created_at', date('Y-m-d H:i:s'))
                        ->setData('cost', $result->getCost())
                        ->setData('message', $sms)
                        ->setData('sms_status', $result->getStatus())
                        ->save()
                    ;
                }catch (Exception $e){
                    Mage::getSingleton('core/session')->addError($e->getMessage());
                }
                Mage::getSingleton('core/session')->addSuccess($this->__('SMS sent successfully'));
            }catch (Exception $e){
                if($this->getLogSettings()) Mage::log($e->getMessage(), null, 'shoutout.log');
                Mage::getSingleton('core/session')->addError($this->__('Something went wrong when sending order status SMS, please check log files for more details'));
            }
        }
    }

    /**
     * Handle SMS sending
     *
     * @param $status
     * @param $order
     */
    public function send($status, $order)
    {
        $template = Mage::getModel('sms/templates')
            ->getCollection()
            ->addFieldToFilter('type', $status)
            ->getFirstItem()
            ->getMessage();
        if($template){
            $message = $this->generateMessage($template, $order);
            if($message){
                $this->shoutOUTSendSMS($message, $order, $status);
            }
        }
    }
}