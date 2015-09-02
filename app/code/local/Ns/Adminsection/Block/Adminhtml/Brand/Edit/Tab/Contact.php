<?php
class Ns_Adminsection_Block_Adminhtml_Brand_Edit_Tab_Contact extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('base_form_set',
            array('legend'=>'information'));
        $fieldset->addField('name', 'text',
            array(
                'label' => 'Name',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'name',
            ));
        $fieldset->addField('age', 'text',
            array(
                'label' => 'Age',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'age',
            ));


        if ( Mage::registry('brand_data') )
        {
            $form->setValues(Mage::registry('brand_data')->getData());
        }
        return parent::_prepareForm();
    }
}