<?php

class Bocansey_Fdmsconnect_Model_Fdmsconnect extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fdmsconnect/fdmsconnect');
    }    
}