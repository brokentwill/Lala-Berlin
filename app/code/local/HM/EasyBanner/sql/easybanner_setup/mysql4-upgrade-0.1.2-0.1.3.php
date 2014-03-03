<?php
	$installer = $this;

	$installer->startSetup();

	$installer->run("ALTER TABLE {$this->getTable('easy_banner_item')} ADD `title_color` int(11) default 0;");
	$installer->endSetup();
?>