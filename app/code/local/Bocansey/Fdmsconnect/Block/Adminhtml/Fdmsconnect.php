<?php
class Bocansey_Fdmsconnect_Block_Adminhtml_Fdmsconnect extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_fdmsconnect';
    $this->_blockGroup = 'fdmsconnect';
    $this->_headerText = Mage::helper('fdmsconnect')->__('FDMS Connect Transactions');
    parent::__construct();
    $this->_removeButton('add');
  }
}