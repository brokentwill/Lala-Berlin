<?php
require_once 'abstract.php';

class Mage_Shell_Lala extends Mage_Shell_Abstract{

	public function run(){
		$command = reset(array_keys($this->_args));
		if($command == "export") Mage::getModel('lala/export')->run();;
		if($command == "import") Mage::getModel('lala/import')->run();
		if($command == "stock") Mage::getModel('lala/import')->updateStock();
	}

}

$shell = new Mage_Shell_Lala();
$shell->run();
?>