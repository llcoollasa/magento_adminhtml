<?php
class Ns_Adminsection_Block_Adminhtml_Brand_Edit_Tab_Info extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('base_form_set', array('legend'=>'information'));

        $fieldset->addField('id', 'hidden', array(
            'name'      => 'id',
        ));

        $fieldset->addField('title', 'text',
            array(
                'label' => 'Title',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'title',
            ));
        $fieldset->addField('description', 'textarea',
            array(
                'label' => 'Description',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'description',
            ));



        if ( Mage::registry('brand_data') )
        {
            $form->setValues(Mage::registry('brand_data')->getData());
        }
        return parent::_prepareForm();
    }
}