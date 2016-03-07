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
class Bocansey_FdmsConnect_ResponseController extends Mage_Core_Controller_Front_Action
{
  /**
     * @return void
     */
    public function indexAction()
    {
    	$session = Mage::getSingleton('checkout/session');
        $post = $this->getRequest()->getPost();

	    if($post){
			if (isset($post['oid'])) {
				if(Mage::getModel('fdmsconnect/redirect')->processRedirectResponse($post)){
					$session->setQuoteId($session->getFdmsConnectRedirectQuoteId());
		    	    $this->getResponse()->setBody($this->getLayout()->createBlock('fdmsconnect/redirect_success')->toHtml());
				}else{
			        $this->getResponse()->setBody($this->getLayout()->createBlock('fdmsconnect/redirect_error')->toHtml());
				}
			}
        }else{
        	//set the quote as inactive after back from First Data EMEA
	        $session->getQuote()->setIsActive(false)->save();
    	    $this->_redirect('checkout/onepage/success', array('_secure'=>true));
        }
    }

    /**
     * @return
     */
    public function failureAction(){
		$session = Mage::getSingleton('checkout/session');
        $lastQuoteId = $session->getLastQuoteId();
        $lastOrderId = $session->getLastOrderId();

        if (!$lastQuoteId || !$lastOrderId) {
            $this->_redirect('checkout/cart');
            return;
        }

        $order = Mage::getModel('sales/order')->loadByAttribute('entity_id', $lastOrderId);

       	if ($order->getId()) {
        	$order->addStatusToHistory('canceled', $session->getErrorMessage())->save();
	    }

        $this->_redirect('checkout/onepage/failure');
        return;
    }
}