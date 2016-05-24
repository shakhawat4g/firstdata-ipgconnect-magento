<?php
/**
 * Bocansey_Fdmsconnect Connect Plugin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Bocansey
 * @package    Bocansey_Fdmsconnect
 * @author     Bright Ocansey <bright.ocansey@gmail.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Bocansey_Fdmsconnect_RedirectController extends Mage_Core_Controller_Front_Action
{
    /**
     * Order instance
     */
    protected $_order;
    
    /**
     * Get one page checkout model
     *
     * @return Mage_Checkout_Model_Type_Onepage
     */
    public function getOnepage()
    {
        return Mage::getSingleton('checkout/type_onepage');
    }
    
    /**
     *  Get order
     *
     *  @param    none
     *  @return	  Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        if ($this->_order == null) {
        }
        return $this->_order;
    }

    /**
     * Get singleton with First Data EMEA Connect Redirect order transaction information
     *
     * @return Mage_Fdmsconnect_Model_Redirect
     */
    public function getRedirect()
    {
        return Mage::getSingleton('fdmsconnect/redirect');
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        $session = Mage::getSingleton('checkout/session');
        $session->setFdmsconnectRedirectQuoteId($session->getQuoteId());
        $session->unsQuoteId();
        
        $this->loadLayout();
        $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('fdmsconnect/redirect_redirect'));
        $this->renderLayout();
    }

    /**
     * @return void
     */
    public function cancelAction()
    {
        $session = Mage::getSingleton('checkout/session');

        // cancel order
        if ($session->getLastRealOrderId()) {
            $order = Mage::getModel('sales/order')->loadByIncrementId($session->getLastRealOrderId());
            if ($order->getId()) {
                $session->addNotice($this->__('Your Order has been declined. Please try again or contact us.'));
                $order->cancel()->save();
            }
        }

        $this->_redirect('checkout/cart');
    }
    
    /**
     * Order success action
     */
    public function successAction()
    {
		$session = Mage::getSingleton('checkout/session');
        $post = $this->getRequest()->getPost();

	    if($post){
			if (isset($post['oid'])) {
				if(Mage::getModel('fdmsconnect/redirect')->processRedirectResponse($post)){
					$session->setQuoteId($session->getFdmsconnectRedirectQuoteId());
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

    public function failureAction()
    {
        $lastQuoteId = $this->getOnepage()->getCheckout()->getLastQuoteId();
        $lastOrderId = $this->getOnepage()->getCheckout()->getLastOrderId();

        if (!$lastQuoteId || !$lastOrderId) {
            $this->_redirect('checkout/cart');
            return;
        }

        $this->loadLayout();
        $this->renderLayout();
    }

}