<?php
class Ns_Adminsection_Adminhtml_BrandController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
       // $this->_redirect('*/*/grid');

//        $this->_title(Mage::helper("ns_adminsection")->__('Sales'))->_title(Mage::helper("ns_adminsection")->__('Brand'));
//        $this->loadLayout();
//        $this->_setActiveMenu('ns_adminsection/adminsection_brand');
//        $this->_addContent($this->getLayout()->createBlock('ns_adminsection/adminhtml_brand'));
//        $this->renderLayout();

    }

    public function listAction()
    {
        $this->_getSession()->setFormData(array());
        $this->_title($this->__('catalog'));
        $this->loadLayout();
        $this->_setActiveMenu('adminsection/adminsection_brand');
        $this->_addBreadcrumb($this->__('Catalog'),$this->__('Catalog'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');

//        $this->loadLayout();
//        $this->_addContent($this->getLayout()->createBlock('form/adminhtml_form_edit'))
//            ->_addLeft($this->getLayout()->createBlock('form/adminhtml_form_edit_tabs'));
//        $this->renderLayout();
    }

    public function editAction()
    {
        $brandId = $this->getRequest()->getParam('id');
        $brandModel = Mage::getModel('ns_adminsection/brand')->load($brandId);
        if ($brandModel->getId() || $brandId == 0)
        {
            Mage::register('brand_data', $brandModel);
            $this->loadLayout();
//            $this->getLayout()->getBlock('head')
//                ->setCanLoadExtJs(true);
//            $this->_addContent($this->getLayout()
//                ->createBlock('ns_adminsection/adminhtml_brand_edit'))
//                ->_addLeft($this->getLayout()
//                    ->createBlock('ns_adminsection/adminhtml_brand_edit_tabs')
//                );
            $this->renderLayout();
        }
        else
        {
            Mage::getSingleton('adminhtml/session')
                ->addError('Test does not exist');
            $this->_redirect('*/*/');
        }
    }


    public function saveAction()
    {
        if($data=$this->getRequest()->getPost()){

            $this->_getSession()->setFormData($data);
            $model = Mage::getModel('ns_adminsection/brand');
            $id = $this->getRequest()->getParam('id');

            try{
                if($id){
                    $model->load($id);
                }
                $model->setData($data);
                $model->save();
                $this->_getSession()->addSuccess($this->__('Brand was successfully saved.'));
                $this->_getSession()->setFormData(false);

                if($this->getRequest()->getParam('back')){
                    $params = array('id'=>$model->getId());
                    $this->_redirect('*/*/news',$params);
                }else {
                    $this->_redirect('*/*/');
                }

            }catch (Exception $e){
                $this->_getSession()->addError($e->getMessage());
                if($model && $model->getId()){
                    $this->_redirect('*/*/edit',array(
                        'id'=>$model->getId()
                    ));
                }else{
                    $this->_redirect('*/*/new');
                }
            }
            return;
        }

        $this->_getSession()->addError($this->__('No data found to save'));
        $this->_redirect('*/*');

    }

    public function deleteAction()
    {
        if($this->getRequest()->getParam('id') > 0)
        {
            try
            {
                $testModel = Mage::getModel('ns_adminsection/brand');
                $testModel->setId($this->getRequest()
                    ->getParam('id'))
                    ->delete();
                Mage::getSingleton('adminhtml/session')
                    ->addSuccess('successfully deleted');
                $this->_redirect('*/*/');
            }
            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')
                    ->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }


    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('adminsection/adminsection_brand');
    }

    public function gridAction()
    {
        $this->loadLayout();
//        $this->getResponse()->setBody(
//            $this->getLayout()->createBlock('ns_adminsection/adminhtml_brand_grid')->toHtml()
//        );
        $this->loadLayout()->renderLayout();
    }

    public function exportAdminsectionCsvAction()
    {
        $fileName = 'brands.csv';
        $grid = $this->getLayout()->createBlock('ns_adminsection/adminhtml_brand_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportAdminsectionExcelAction()
    {
        $fileName = 'brands.xml';
        $grid = $this->getLayout()->createBlock('ns_adminsection/adminhtml_brand_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}