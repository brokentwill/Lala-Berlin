<?php



$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

$installer->run("ALTER TABLE  `cms_block` ADD  `feature_img` VARCHAR( 255 ) NULL");
$installer->run("ALTER TABLE  `cms_block` ADD  `link_to` VARCHAR( 255 ) NULL");
$installer->run("ALTER TABLE  `cms_block` ADD  `position` SMALLINT( 6 ) NULL");
$installer->run("ALTER TABLE  `cms_page` ADD  `content_two` mediumtext NULL");
$installer->run("ALTER TABLE  `cms_page` ADD  `content_three` mediumtext NULL");


$installer->endSetup();