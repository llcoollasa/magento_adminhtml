<?php
class  Ns_Adminsection_Block_Adminhtml_Brand_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{


    /**
     * Initialize form
     * Add standard buttons
     * Add "Save and Apply" button
     * Add "Save and Continue" button
     */
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_brand';
        $this->_blockGroup = "ns_adminsection";

        parent::__construct();// help

        $this->_updateButton('save', 'label', Mage::helper('ns_adminsection')->__('Save Brand'));
        $this->_updateButton('delete', 'label', Mage::helper('ns_adminsection')->__('Delete Brand'));


    }

    /**
     * Getter for form header text
     */
    public function getHeaderText()
    {
        $brand = Mage::registry('brand_data');
        if ($brand->getRuleId()) {
            return Mage::helper('ns_adminsection')->__("Edit Brand '%s'", $this->escapeHtml($brand->getTitle()));
        }
        else {
            return Mage::helper('ns_adminsection')->__('New Brand');
        }
    }
}
