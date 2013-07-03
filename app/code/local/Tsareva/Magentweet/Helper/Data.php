<?php

class Tsareva_Magentweet_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function transform($ret, $color, $colora)
    {
        $ret = preg_replace("#(^|[\n ])\#([^ \"\t\n\r<]*)#ise", "'\\1<a target=\"blank\" href=\"http://www.twitter.com/search?q=\\2\" rel=\"nofollow\">#\\2</a>'", $ret);
        $ret = preg_replace("#(^|[\n ])@([^ \"\t\n\r<]*)#ise", "'\\1<a target=\"blank\" style=\"color:$colora;\" href=\"http://www.twitter.com/\\2\" >@\\2</a>'", $ret);
        $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t<]*)#ise", "'\\1<a target=\"blank\" style=\"color:$color;\" href=\"\\2\" >\\2</a>'", $ret);
        $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#ise", "'\\1<a target=\"blank\" style=\"color:$color;\" href=\"http://\\2\" >\\2</a>'", $ret);

        return $ret;
    }

    public function desactivelink($ret)
    {
        $ret = preg_replace("#(^|[\n ])\#([^ \"\t\n\r<]*)#ise", "'\\1#\\2'", $ret);
        $ret = preg_replace("#(^|[\n ])@([^ \"\t\n\r<]*)#ise", "'\\1@\\2'", $ret);
        $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t<]*)#ise", "", $ret);
        $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#ise", "", $ret);

        return $ret;
    }

}

