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
 * Class Shoutout_Sms_Adminhtml_HistoryController
 */
class Shoutout_Sms_Adminhtml_HistoryController extends Mage_Adminhtml_Controller_Action
{
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        //return Mage::getSingleton('admin/session')->isAllowed('sms/history');
        return true;
    }

    /**
     * @return $this
     */
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu("sms/history")->_addBreadcrumb(Mage::helper("adminhtml")->__("History  Manager"),
            Mage::helper("adminhtml")->__("SMS History Manager"));
        return $this;
    }

    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->_title($this->__("Sms"));
        $this->_title($this->__("Manager SMS History"));

        $this->_initAction();
        $this->renderLayout();
    }

    /**
     * Edit Action
     */
    public function editAction()
    {
        $this->_title($this->__("Sms"));
        $this->_title($this->__("History"));
        $this->_title($this->__("Edit Item"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("sms/history")->load($id);
        if ($model->getId()) {
            Mage::register("history_data", $model);
            $this->loadLayout();
            $this->_setActiveMenu("sms/history");
            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("SMS History Manager"),
                Mage::helper("adminhtml")->__("SMS History Manager"));
            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("History Description"),
                Mage::helper("adminhtml")->__("History Description"));
            $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()->createBlock("sms/adminhtml_history_edit"))->_addLeft($this->getLayout()->createBlock("sms/adminhtml_history_edit_tabs"));
            $this->renderLayout();
        } else {
            Mage::getSingleton("adminhtml/session")->addError(Mage::helper("sms")->__("Item does not exist."));
            $this->_redirect("*/*/");
        }
    }

    /**
     * New Action but disabled
     */
    public function newAction()
    {
        $this->_title($this->__("Sms"));
        $this->_title($this->__("History"));
        $this->_title($this->__("New Item"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("sms/history")->load($id);

        $data = Mage::getSingleton("adminhtml/session")->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register("history_data", $model);

        $this->loadLayout();
        $this->_setActiveMenu("sms/history");

        $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("History Manager"),
            Mage::helper("adminhtml")->__("History Manager"));
        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("History Description"),
            Mage::helper("adminhtml")->__("History Description"));

        $this->_addContent($this->getLayout()->createBlock("sms/adminhtml_history_edit"))->_addLeft($this->getLayout()->createBlock("sms/adminhtml_history_edit_tabs"));
        $this->renderLayout();
    }

    /**
     * Save Action
     */
    public function saveAction()
    {
        $post_data = $this->getRequest()->getPost();
        if ($post_data) {
            try {
                $model = Mage::getModel("sms/history")
                    ->addData($post_data)
                    ->setId($this->getRequest()->getParam("id"))
                    ->save();

                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("History was successfully saved"));
                Mage::getSingleton("adminhtml/session")->setHistoryData(false);

                if ($this->getRequest()->getParam("back")) {
                    $this->_redirect("*/*/edit", array("id" => $model->getId()));
                    return;
                }
                $this->_redirect("*/*/");
                return;
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                Mage::getSingleton("adminhtml/session")->setHistoryData($this->getRequest()->getPost());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
                return;
            }
        }
        $this->_redirect("*/*/");
    }

    /**
     * Delete Action
     */
    public function deleteAction()
    {
        if ($this->getRequest()->getParam("id") > 0) {
            try {
                $model = Mage::getModel("sms/history");
                $model->setId($this->getRequest()->getParam("id"))->delete();
                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
                $this->_redirect("*/*/");
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
            }
        }
        $this->_redirect("*/*/");
    }

    /**
     * Mass Remove Action
     */
    public function massRemoveAction()
    {
        try {
            $ids = $this->getRequest()->getPost('ids', array());
            foreach ($ids as $id) {
                $model = Mage::getModel("sms/history");
                $model->setId($id)->delete();
            }
            Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
        } catch (Exception $e) {
            Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
    }

    /**
     * Export order grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName = 'history.csv';
        $grid = $this->getLayout()->createBlock('sms/adminhtml_history_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    /**
     *  Export order grid to Excel XML format
     */
    public function exportExcelAction()
    {
        $fileName = 'history.xml';
        $grid = $this->getLayout()->createBlock('sms/adminhtml_history_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}