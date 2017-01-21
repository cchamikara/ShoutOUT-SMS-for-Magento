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
 * Class Shoutout_Sms_Model_Templates
 */
class Shoutout_Sms_Model_Templates extends Mage_Core_Model_Abstract
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init("sms/templates");
    }

    /**
     * @param $type
     * @return $this|Mage_Core_Model_Abstract
     */
    public function loadByType($type)
    {
        $matches = $this->getResourceCollection()
            ->addFieldToFilter('type', $type);
        foreach ($matches as $match) {
            return $this->load($match->getId());
        }
        return $this->setData('type', $type);
    }
}
	 