<?php
class Ns_Adminsection_Block_Adminhtml_Brand_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{


    public function __construct()
    {
        parent::__construct();
        $this->setId('adminsection_brand_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Brands');
    }

    protected function _beforeToHtml()
    {
        $this->addTab('brand_tab', array(
            'label' => 'Brand Information',
            'title' => 'Brand',
            'content' => $this->getLayout()->createBlock('ns_adminsection/adminhtml_brand_edit_tab_info')->toHtml()
        ));

        //Additional Tabs will be created here
//        $this->addTab('contact_tab2', array(
//            'label' => 'User',
//            'title' => 'User',
//            'content' => $this->getLayout()->createBlock('ns_adminsection/adminhtml_brand_edit_tab_contact')->toHtml()
//        ));


        return parent::_beforeToHtml();
    }
}