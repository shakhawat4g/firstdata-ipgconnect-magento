<?php

class Bocansey_FdmsConnect_Model_Mysql4_FdmsConnect_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fdmsconnect/fdmsconnect');
    }
}