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
class Tsareva_Magentweet_Block_User extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{

    public function getUser()
    {
        $nb     = $this->getData('nb');
        $link   = $this->getData('link');
        $link_a = $this->getData('link_a');
        $desa   = $this->getData('desa');

        return Mage::getModel('magentweet/user')->loading($nb, $link, $link_a, $desa);
    }

    public function getTitle()
    {
        $titre = $this->getData('titre');
        return $titre;
    }

    public function getClasses()
    {
        $class_css = $this->getData('class_css');
        return $class_css;
    }

    public function ifShowUserHeader()
    {
        $r = true;
        if ($this->getData('user_header') == "disable") {
            $r = false;
        }

        return $r;
    }

}

