<?php

class Bocansey_FdmsConnect_Model_FdmsConnect extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fdmsconnect/fdmsconnect');
    }    
}