<?php

$installer = new Mage_Catalog_Model_Resource_Eav_Mysql4_Setup('core_setup');
$installer->startSetup();

	Mage::getModel('eav/entity_type')
		->loadByCode('order')
		->setIncrementPerStore(false)
		->save();

$installer->endSetup(); 