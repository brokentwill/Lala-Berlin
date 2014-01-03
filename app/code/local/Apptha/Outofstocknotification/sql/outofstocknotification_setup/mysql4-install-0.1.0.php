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

$installer = $this;

$installer->startSetup();

$installer->run("

 DROP TABLE IF EXISTS {$this->getTable('outofstocknotification')};
CREATE TABLE IF NOT EXISTS {$this->getTable('outofstocknotification')} (
    `outofstocknotification_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(20) NOT NULL DEFAULT '',
  `product_name` varchar(100) NOT NULL DEFAULT '',
  `product_url` varchar(255) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mailsend_status` varchar(5) NOT NULL DEFAULT 'NO',
  `status` smallint(1) NOT NULL DEFAULT '1',
  `created_time` varchar(20) DEFAULT NULL ,
  `update_time` varchar(20) DEFAULT NULL ,
   PRIMARY KEY (`outofstocknotification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
