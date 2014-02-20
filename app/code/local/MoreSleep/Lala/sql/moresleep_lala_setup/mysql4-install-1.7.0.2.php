<?php
/**
 * @category   MoreSleep
 * @package    Lala
 * @author     Thomas Michelbach <thomas@moresleep.net>
 */

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
$installer->run(file_get_contents(dirname(__FILE__) . '/import.sql'));
$installer->endSetup();
?>