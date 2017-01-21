<?php

class Shoutout_Sms_Block_Adminhtml_History_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId("historyGrid");
        $this->setDefaultSort("id");
        $this->setDefaultDir("DESC");
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel("sms/history")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn("id", array(
            "header" => Mage::helper("sms")->__("ID"),
            "align" => "left",
            "width" => "10px",
            "type" => "number",
            "index" => "id",
        ));

        $this->addColumn("order_id", array(
            "header" => Mage::helper("sms")->__("Order ID"),
            "index" => "order_id",
        ));

        $this->addColumn("order_status", array(
            "header" => Mage::helper("sms")->__("Order Status"),
            "index" => "order_status",
            'type'  => 'options',
            'options' => Mage::helper('sms')->orderGridStatus(),
        ));

        $this->addColumn("mobile_no", array(
            "header" => Mage::helper("sms")->__("Mobile Number"),
            "index" => "mobile_no",
        ));

        $this->addColumn("created_at", array(
            "header" => Mage::helper("sms")->__("Created At"),
            "index" => "created_at",
            'type'  => 'datetime',
            'align' => 'left',
        ));

        $this->addColumn("cost", array(
            "header" => Mage::helper("sms")->__("SMS Cost"),
            "index" => "cost",
        ));

        $this->addColumn("message", array(
            "header" => Mage::helper("sms")->__("Message"),
            "index" => "message",
        ));

        $this->addColumn("sms_status", array(
            "header" => Mage::helper("sms")->__("SMS Status"),
            "index" => "sms_status",
            'align' => 'center',
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return '#';
    }


    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('ids');
        $this->getMassactionBlock()->setUseSelectAll(true);
        $this->getMassactionBlock()->addItem('remove_history', array(
            'label' => Mage::helper('sms')->__('Remove History'),
            'url' => $this->getUrl('*/adminhtml_history/massRemove'),
            'confirm' => Mage::helper('sms')->__('Are you sure?')
        ));
        return $this;
    }


}