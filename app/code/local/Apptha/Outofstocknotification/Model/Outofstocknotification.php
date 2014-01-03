<?php
/**
 * @name         :  Apptha Out Of Stock Notification
 * @version      :  0.1.5
 * @since        :  Magento 1.4
 * @author       :  Apptha - http://www.apptha.com
 * @copyright    :  Copyright (C) 2011 Powered by Apptha
 * @license      :  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Creation Date:  June 20 2011
 * @Modified By  :  Bala G
 * @Modified Date:  August 7 2013
 *
 * */
?>
<?php

class Apptha_Outofstocknotification_Model_Outofstocknotification extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('outofstocknotification/outofstocknotification');
    }

    public function notifyDataInserted() {

                        $pId = (int) Mage::app()->getRequest()->getParam('pId', false);

                        //get table prefix
                        $tPrefix = (string) Mage::getConfig()->getTablePrefix();
                        $stockNotifiTable = $tPrefix . 'outofstocknotification';

                        if($pId){
                                    $read = Mage::getSingleton('core/resource')->getConnection('core_read');
                                    $email = (string)Mage::app()->getRequest()->getParam('email', false);
                                    $select = $read->select()
                                                    ->from($stockNotifiTable, 'COUNT(*) as isNotify')
                                                    ->where('product_id=' . $pId . ' AND status = 1 AND mailsend_status = "NO" AND email_id ="' . $email . '"');
                                    $data = $read->fetchAll($select);
                                    $isAlreadyNotify = intval($data[0]['isNotify']);  //check this user is already notify or not?

                                    if (!$isAlreadyNotify) { // not notify so insert in DB
                                                $newProduct = Mage::getModel('catalog/product')->load($pId);
                                                $pName = $newProduct->getName();
                                                $pUrl = base64_encode($newProduct->getUrlInStore());
                                                $date = date("M d, Y");
                                                $data = array('product_id' => $pId, 'product_name' => $pName, 'product_url' => $pUrl, 'email_id' => $email, 'mailsend_status' => 'NO', 'created_time' => $date);
                                                $model = Mage::getModel('outofstocknotification/outofstocknotification')->setData($data);
                                                    try {
                                                        $insertId = $model->save();
                                                       }
                                                    catch (Exception $e) {
                                                        echo $e->getMessage();
                                                    }

                                                return 1;
                                    } 
                                    else
                                    { // already notifided
                                    return 0;
                                    }
                        }
                        else
                            {
                            return 0;
                            }
    }

}