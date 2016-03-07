<?php
class Bocansey_FdmsConnect_Block_Adminhtml_FdmsConnect extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_fdmsconnect';
    $this->_blockGroup = 'fdmsconnect';
    $this->_headerText = Mage::helper('fdmsconnect')->__('FdmsConnect Transactions');
    parent::__construct();
    $this->_removeButton('add');
  }
}