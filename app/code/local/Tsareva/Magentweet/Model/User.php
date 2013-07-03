<?php

/**
 * Magentweet : Twitter Widget for Magento
 * by
 * Agence Dn'D - Cr�ation site e-Commerce Magento - http://www.dnd.fr/magento
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
class Tsareva_Magentweet_Model_User extends Tsareva_Magentweet_Model_Twitter
{

    protected $_urlImg;
    protected $_followers;
    protected $_following;
    protected $_name;
    protected $_tuser;
    protected $_nb;
    protected $_link;
    protected $_link_a;
    protected $_desa;
    protected $_url;

    public function loading($nb, $link, $link_a, $desa)
    {
        $this->_tuser  = Mage::getStoreConfig('magentweet_settings/config_groups/user_name');
        $this->_nb     = $nb;
        $this->_link   = $link;
        $this->_link_a = $link_a;
        $this->_desa   = $desa;

        $userData = $this->getUserShow();

        $this->_urlImg    = $userData->profile_image_url;
        $this->_followers = $userData->followers_count;
        $this->_name      = $userData->name;
        $this->_following = $userData->friends_count;
        $this->_url       = $userData->url;

        return $this;
    }

    public function getStatuses()
    {
        $statuses = $this->getUserStatuses();

        $i    = 0;
        $flux = array();

        foreach ($statuses as $status) {
            if ($i < $this->_nb) {
                if ($this->_desa == "enable") {
                    $flux[] = Mage::helper('magentweet')->transform($status->text, $this->_link, $this->_link_a);
                }
                else {
                    $flux[] = Mage::helper('magentweet')->desactivelink($status->text);
                }
            }

            $i++;
        }

        return $flux;
    }

    public function getImgUrl()
    {
        return $this->_urlImg;
    }

    public function getFollowers()
    {
        return $this->_followers;
    }

    public function getFollowing()
    {
        return $this->_following;
    }

    public function getUrl()
    {
        return $this->_url;
    }

    public function getName()
    {
        return $this->_name;
    }

}