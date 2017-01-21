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
 * Class Shoutout_Sms_Model_Mysql4_History
 */
class Shoutout_Sms_Model_Mysql4_History extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("sms/history", "id");
    }
}