<?php
/**
 * @name         :  Apptha Out Of Stock Notification
 * @version      :  0.1.5
 * @since        :  Magento 1.4
 * @author       :  Apptha - http://www.apptha.com
 * @copyright    :  Copyright (C) 2011 Powered by Apptha
 * @license      :  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Creation Date:  June 20 2011
 * @Modified By  :  Murali B
 * @Modified Date:  August 7 2013
 *
 * */
?>
<?php

class Apptha_Outofstocknotification_Helper_Data extends Mage_Core_Helper_Abstract
{
    #license key for Out of Stock Notification

    public function OutofStockKey() {
               
        $code = $this->genenrateOutofstockdomain();
        $domainKey = substr($code, 0, 25) . "CONTUS";
        $apikey = Mage::getStoreConfig('Outofstocknotification/activation/outofstock_license');
         
        if ($domainKey != $apikey) {       
            return base64_decode('PHNwYW4+UG93ZXJlZCBieSA8YSBocmVmPSJodHRwOi8vd3d3LmFwcHRoYS5jb20vY2F0ZWdvcnkvZXh0ZW5zaW9uL01hZ2VudG8vb3V0LW9mLXN0b2NrLW5vdGlmaWNhdGlvbiIgdGFyZ2V0PSJfYmxhbmsiID5PdXQgb2YgU3RvY2sgTm90aWZpY2F0aW9uPC9hPjwvc3Bhbj4=');
            
        } else {
            return ;
        }
    }

    public function domainKey($tkey) {

        $message = "EM-OSNMP0EFIL9XEV8YZAL7KCIUQ6NI5OREH4TSEB3TSRIF2SI1ROTAIDALG-JW";

        for ($i = 0; $i < strlen($tkey); $i++) {
            $key_array[] = $tkey[$i];
        }
        $enc_message = "";
        $kPos = 0;
        $chars_str = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
        for ($i = 0; $i < strlen($chars_str); $i++) {
            $chars_array[] = $chars_str[$i];
        }
        for ($i = 0; $i < strlen($message); $i++) {
            $char = substr($message, $i, 1);

            $offset = $this->getOffset($key_array[$kPos], $char);
            $enc_message .= $chars_array[$offset];
            $kPos++;
            if ($kPos >= count($key_array)) {
                $kPos = 0;
            }
        }

        return $enc_message;
    }

    public function getOffset($start, $end) {

        $chars_str = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
        for ($i = 0; $i < strlen($chars_str); $i++) {
            $chars_array[] = $chars_str[$i];
        }

        for ($i = count($chars_array) - 1; $i >= 0; $i--) {
            $lookupObj[ord($chars_array[$i])] = $i;
        }

        $sNum = $lookupObj[ord($start)];
        $eNum = $lookupObj[ord($end)];

        $offset = $eNum - $sNum;

        if ($offset < 0) {
            $offset = count($chars_array) + ($offset);
        }

        return $offset;
    }

    public function genenrateOutofstockdomain() {

        $strDomainName = $_SERVER['SERVER_NAME'];
        preg_match("/^(http:\/\/)?([^\/]+)/i", $strDomainName, $subfolder);
        preg_match("/^(https:\/\/)?([^\/]+)/i", $strDomainName, $subfolder);
        preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $subfolder[2], $matches);
        if (isset($matches['domain'])) {
            $customerurl = $matches['domain'];
        } else {
            $customerurl = "";
        }
        $customerurl = str_replace("www.", "", $customerurl);
        
        $customerurl = str_replace(".", "D", $customerurl);
        $customerurl = strtoupper($customerurl);
        if (isset($matches['domain'])) {
            $response = $this->domainKey($customerurl);
        } else {
            $response = "";
        }
        return $response;
    }
}