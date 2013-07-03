<?php

/**
 * Magentweet : Twitter Widget for Magento
 * by
 * Agence Dn'D - Creation site e-Commerce Magento - http://www.dnd.fr/magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * Available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   Widget
 * @package    Dnd_Magentweet
 * @copyright  Copyright (c) 2010 Agence Dn'D (http://www.dnd.fr)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Tsareva_Magentweet_Model_Lang
{

    public function toOptionArray()
    {
        $lang  = Mage::app()->getLocale()->getOptionLocales();
        $nlang = array(
            'All' => "All"
                ) + $lang;

        return $nlang;
    }

}