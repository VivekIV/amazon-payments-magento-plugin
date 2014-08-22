<?php
/**
 * Amazon Payments
 *
 * @category    Amazon
 * @package     Amazon_Payments
 * @copyright   Copyright (c) 2014 Amazon.com
 * @license     http://opensource.org/licenses/Apache-2.0  Apache License, Version 2.0
 */

class Amazon_Payments_Block_Button extends Mage_Core_Block_Template
{
    /**
     * Return URL to use for checkout
     */
    public function getCheckoutUrl()
    {
        return $this->helper('amazon_payments')->getCheckoutUrl();
    }

    /**
     * Return onepage checkout URL
     */
    public function getOnepageCheckoutUrl()
    {
        return $this->helper('amazon_payments')->getOnepageCheckoutUrl();
    }

    /**
     * Return CSS identifier to use for Amazon button
     */
    public function getAmazonPayButtonId() {
        return $this->getNameInLayout();
    }

    /**
     * Return seller ID
     */
    public function getSellerId()
    {
        return $this->helper('amazon_payments')->getSellerId();
    }

    /**
     * Get login auth URL
     */
    public function getLoginAuthUrl()
    {
         return $this->getUrl('amazon_payments/checkout/authorize', array('_forced_secure'=>true));
    }

    /**
     * Get additional login scope
     */
    public function getAdditionalScope()
    {
         return $this->helper('amazon_login')->getAdditionalScope();
    }

    /**
     * Is Disabled?
     *
     * @return bool
     */
    public function isDisabled()
    {
        return !Mage::getSingleton('checkout/session')->getQuote()->validateMinimumAmount();
    }
    /**
     * Is Amazon Login enabled?
     *
     * @return bool
     */
    public function isAmazonLoginEnabled()
    {
        return $this->helper('amazon_login')->isEnabled();
    }


    /**
     * Is button enabled?
     *
     * @return bool
     */
    public function isAmazonPayButtonEnabled()
    {
        return (!Mage::getSingleton('amazon_payments/config')->isCheckoutOnepage() || Mage::getSingleton('amazon_payments/config')->showPayOnCart());
    }

    /**
     * Is popup window?
     *
     * @return bool
     */
    public function isPopup()
    {
        return ($this->helper('amazon_login')->isPopup());
    }

}
