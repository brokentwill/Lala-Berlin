<?php
require_once 'abstract.php';

class Mage_Shell_Lala extends Mage_Shell_Abstract{
		
	public function run(){
		Mage::getModel('lala/import')->run();
	}

}

$shell = new Mage_Shell_Lala();
$shell->run();
?>