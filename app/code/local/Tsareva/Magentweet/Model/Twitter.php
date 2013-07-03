<?php

/**
 * Tsareva MagenTweet
 *
 * @category    Tsareva
 * @package     Tsareva_Magentweet
 * @author      Tsareva Alena <tsareva.as@gmail.com>
 */
//include Twitter OAuth library
require_once ('Tsareva/Magentweet/lib/twitteroauth.php');

class Tsareva_Magentweet_Model_Twitter extends Mage_Core_Model_Abstract
{

    const CONFIG_PATH = 'magentweet_settings/config_groups/';

    private $_connection = FALSE;
    protected $_userName;
    protected $_consumerKey;
    protected $_consumerSecret;
    protected $_oauthToken;
    protected $_oauthTokenSecret;

    public function _construct()
    {
        parent::_construct();

        //set accesss
        $this->_userName         = Mage::getStoreConfig(self::CONFIG_PATH . 'user_name');
        $this->_consumerKey      = Mage::helper('core')->decrypt(Mage::getStoreConfig(self::CONFIG_PATH . 'consumer_key'));
        $this->_consumerSecret   = Mage::helper('core')->decrypt(Mage::getStoreConfig(self::CONFIG_PATH . 'consumer_secret'));
        $this->_oauthToken       = Mage::helper('core')->decrypt(Mage::getStoreConfig(self::CONFIG_PATH . 'oauth_token'));
        $this->_oauthTokenSecret = Mage::helper('core')->decrypt(Mage::getStoreConfig(self::CONFIG_PATH . 'oauth_token_secret'));

        //set connection
        $this->_setConnection();
    }

    private function _setConnection()
    {
        if (!$this->_connection)
            $this->_connection = new TwitterOAuth($this->_consumerKey, $this->_consumerSecret, $this->_oauthToken, $this->_oauthTokenSecret);
    }

    public function getUserShow()
    {
        return $this->_connection->get('users/show', array('screen_name' => $this->_userName));
    }

    public function getUserStatuses()
    {
        return $this->_connection->get('statuses/user_timeline', array('screen_name' => $this->_userName));
    }

    public function searchTweets($searchTerm)
    {
        return $this->_connection->get('search/tweets', array('q' => $searchTerm, 'count' => 10));
    }

}
