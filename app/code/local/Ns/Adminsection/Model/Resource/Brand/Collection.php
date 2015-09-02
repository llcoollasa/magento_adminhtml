<?php
class Ns_Adminsection_Model_Resource_Brand_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('ns_adminsection/brand');
    }
}