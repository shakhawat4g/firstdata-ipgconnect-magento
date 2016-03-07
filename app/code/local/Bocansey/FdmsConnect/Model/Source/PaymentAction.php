<?php
/**
 * Bocansey_FdmsConnect Connect Plugin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Bocansey
 * @package    Bocansey_FdmsConnect
 * @author     Bright Ocansey <bright.ocansey@gmail.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Bocansey_FdmsConnect_Model_Source_PaymentAction
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => Mage_FdmsConnect_Model_Redirect::ACTION_AUTHORIZE,
                'label' => Mage::helper('fdmsconnect')->__('Defer Settlement')
            ),
            array(
                'value' => Mage_FdmsConnect_Model_Redirect::ACTION_AUTHORIZE_CAPTURE,
                'label' => Mage::helper('fdmsconnect')->__('Settle Immediately')
            ),
        );
    }
}

?>
