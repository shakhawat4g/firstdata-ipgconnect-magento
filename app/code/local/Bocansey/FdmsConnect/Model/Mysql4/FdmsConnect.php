<?php

class Bocansey_FdmsConnect_Model_Mysql4_FdmsConnect extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('fdmsconnect/fdmsconnect', 'fdmsconnect_id');
    }
}