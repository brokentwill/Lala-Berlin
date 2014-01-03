<?php

$installer = new Mage_Catalog_Model_Resource_Eav_Mysql4_Setup('core_setup');
$installer->startSetup();


if (!$installer->getAttributeId(Mage_Catalog_Model_Product::ENTITY, 'care')) {
	$setup->addAttribute('catalog_product', 'care', array(
	    'group'                      	=> 'General',
	    'type'                          => 'text',
	    'input'                         => 'textarea',
	    'label'                         => 'Care',
	    'global'                       	=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
	    'visible'                       => 1,
	    'required'                    	=> 0,
	    'visible_on_front'        		=> 1,
	    'is_html_allowed_on_front'  	=> 1,
	    'used_in_product_listing'  		=> false
	));
}

if (!$installer->getAttributeId(Mage_Catalog_Model_Product::ENTITY, 'delivery')) {
	$setup->addAttribute('catalog_product', 'delivery', array(
	    'group'                      	=> 'General',
	    'type'                          => 'text',
	    'input'                         => 'textarea',
	    'label'                         => 'Delivery',
	    'global'                       	=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
	    'visible'                       => 1,
	    'required'                    	=> 0,
	    'visible_on_front'        		=> 1,
	    'is_html_allowed_on_front'  	=> 1,
	    'used_in_product_listing'  		=> false
	));
}

if (!$installer->getAttributeId(Mage_Catalog_Model_Product::ENTITY, 'colour')) {
	$setup->addAttribute('catalog_product', 'colour', array(
	    'group'                      	=> 'General',
	    'type'                          => 'text',
	    'input'                         => 'text',
	    'label'                         => 'Colour',
	    'global'                       	=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
	    'visible'                       => 1,
	    'required'                    	=> 0,
	    'visible_on_front'        		=> 1,
	    'is_html_allowed_on_front'  	=> 1,
	    'used_in_product_listing'  		=> false
	));
}

$installer->endSetup(); 