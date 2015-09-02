<?php

class Ns_Adminsection_Block_Adminhtml_Brand extends  Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        /**
         * The $_blockGroup property tells Magento which alias to use to
         * locate the blocks to be displayed in this grid container.
         * In our example, this corresponds to Adminsection/Block/Adminhtml.
         */
        $this->_blockGroup = "ns_adminsection";

        /**
         * $_controller is a slightly confusing name for this property.
         * This value, in fact, refers to the folder containing our
         * Grid.php and Edit.php - in our example,
         * Adminsection/Block/Adminhtml/Brand. So, we'll use 'brand'.
         */
        $this->_controller = "adminhtml_brand";

        /**
         * The title of the page in the admin panel.
         */
        $this->_headerText = Mage::helper("ns_adminsection")->__("List Brands");


        #_prepareLayout() => ns_adminsection/adminhtml_brand_grid

        parent::_construct();
    }

}