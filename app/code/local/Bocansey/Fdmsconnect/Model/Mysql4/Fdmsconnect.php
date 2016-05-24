<?php

class Bocansey_Fdmsconnect_Model_Mysql4_Fdmsconnect extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('fdmsconnect/fdmsconnect', 'fdmsconnect_id');
    }
}