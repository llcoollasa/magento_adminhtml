<?php
class Ns_Adminsection_Model_Resource_Brand extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init("ns_adminsection/brand","id");
    }
}