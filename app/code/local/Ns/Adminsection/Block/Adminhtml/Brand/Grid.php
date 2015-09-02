<?php
Class Ns_Adminsection_Block_Adminhtml_Brand_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('adminsection_brand_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        /**
         * Tell Magento which collection to use to display in the grid.
         */
        $collection = Mage::getResourceModel('ns_adminsection/brand_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        /**
         * Here, we'll define which columns to display in the grid.
         */
        $this->addColumn('id',array(
                'header' => $this->__('ID'),
                'sortable' => true,
                'width' => '68px',
                'index' => 'id'

        ));

        $this->addColumn('title',array(
            'header' => $this->__('Title'),
            'sortable' => true,
            'index' => 'title'

        ));

        $this->addColumn('description',array(
            'header' => $this->__('Description'),
            'sortable' => true,
            'index' => 'description'

        ));

        $this->addExportType('*/*/exportAdminsectionCsv', Mage::helper("ns_adminsection")->__("CSV"));
        $this->addExportType('*/*/exportAdminsectionExcel', Mage::helper("ns_adminsection")->__("Excel XML"));


        return parent::_prepareColumns();
    }


    public function getRowUrl($row)
    {
        /**
         * When a grid row is clicked, this is where the user should
         * be redirected to - in our example, the method editAction of
         * BrandController.php in Adminsection module.
         */
        return $this->getUrl('adminhtml/brand/edit', array('id' => $row->getId()));
    }


    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}