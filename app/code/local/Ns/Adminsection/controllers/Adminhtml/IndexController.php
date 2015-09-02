<?php
class Ns_Adminsection_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();

//        $this->loadLayout();
//        $this->_addContent($this->getLayout()->createBlock('core/template')->setTemplate('ns/adminsection/index.phtml'));
//        $this->renderLayout();
    }
}