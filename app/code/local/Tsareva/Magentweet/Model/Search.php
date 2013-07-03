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
class Tsareva_Magentweet_Model_Search extends Tsareva_Magentweet_Model_Twitter
{

    protected $_keyw;
    protected $_nb;
    protected $_link;
    protected $_link_a;
    protected $_desa;
    protected $_slang;

    public function loading($keyw, $nb, $link, $link_a, $desa, $slang)
    {
        $this->_keyw   = $keyw;
        $this->_nb     = $nb;
        $this->_link   = $link;
        $this->_link_a = $link_a;
        $this->_desa   = $desa;
        $this->_slang  = $slang;

        return $this;
    }

    public function getResults()
    {

        $tweets = $this->searchTweets($this->_keyw);

        $i = 0;
        if ($tweets->statuses) {
            $flux = array();
            foreach ($tweets->statuses as $tweet) {
                if ($i < $this->_nb) {
                    if ($this->_desa == "enable") {
                        $flux[$i]['content'] = Mage::helper('magentweet')->transform($tweet->text, $this->_link, $this->_link_a);
                        $flux[$i]['img']     = $tweet->user->profile_image_url;
                    }
                    else {
                        $flux[$i]['content'] = Mage::helper('magentweet')->desactivelink($tweet->text);
                        $flux[$i]['img']     = $tweet->user->profile_image_url;
                    }
                }
                $i++;
            }
        }
        else {
            $flux = "No result";
        }

        return $flux;
    }

}