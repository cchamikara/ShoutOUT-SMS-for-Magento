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
 * Class Shoutout_Sms_Adminhtml_Sms_SmstemplatesController
 */
class Shoutout_Sms_Adminhtml_Sms_SmstemplatesController extends Mage_Adminhtml_Controller_Action
{
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }

    /**
     * Render Index action
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_title($this->__("SMS Templates"));
        $this->renderLayout();
    }

    /**
     * Save SMS template to shoutout_sms_templates table
     */
    public function saveTemplateAction()
    {
        $data = $this->getRequest()->getPost();
        try {
            Mage::getModel('sms/templates')
                ->loadByType($data['type'])
                ->setData('message', $data['message'])
                ->setData('active', $data['active'])
                ->setData('updated_at', date('Y-m-d H:i:s'))
                ->save();
            Mage::getSingleton('core/session')->addSuccess('SMS Template for "' . $data['title'] . '", successfully saved');
        } catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*/index');
    }
}