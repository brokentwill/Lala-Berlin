<?php

$installer = new Mage_Catalog_Model_Resource_Eav_Mysql4_Setup('core_setup');
$installer->startSetup();


if (!$installer->getAttributeId(Mage_Catalog_Model_Product::ENTITY, 'msn')) {
	$setup->addAttribute('catalog_product', 'msn', array(
	    'group'                      	=> 'General',
	    'type'                          => 'text',
	    'input'                         => 'textarea',
	    'label'                         => 'Model Size Note',
	    'global'                       	=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
	    'visible'                       => 1,
	    'required'                    	=> 0,
	    'visible_on_front'        		=> 1,
	    'is_html_allowed_on_front'  	=> 1,
	    'used_in_product_listing'  		=> false
	));
}

$installer->endSetup(); 