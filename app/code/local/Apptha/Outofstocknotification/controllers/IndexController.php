<?php
/**
 * @name         :  Apptha Out Of Stock Notification
 * @version      :  0.1.5
 * @since        :  Magento 1.4
 * @author       :  Apptha - http://www.apptha.com
 * @copyright    :  Copyright (C) 2011 Powered by Apptha
 * @license      :  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Creation Date:  June 20 2011
 * @Modified By  :  Murali B
 * @Modified Date:  August 7 2013
 *
 * */
?>
<?php
class Apptha_Outofstocknotification_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();     
	$this->renderLayout();
	
    }
    /* insert notify email record and display the success message */
    public function storeNotificationProductDataAction(){
        
        header('Access-Control-Allow-Origin: *');
    	$notifySuccessMes =  Mage::getStoreConfig('Outofstocknotification/general/activate_apptha_outofstock_notify_success_mes');
    	//get current server
        
        $currentUrl = Mage::app()->getFrontController()->getRequest()->getHttpHost();
        $arrVal = parse_url($this->getRequest()->getServer('HTTP_REFERER'));
        $previousUrl = str_replace(array(",","www."),"",$arrVal["host"]);
        //check domain
        
        $domain = strstr($currentUrl, $previousUrl );
        
      
        if(!empty ($domain))
        {
        $statusOfInsert = Mage::getModel('outofstocknotification/outofstocknotification')->notifyDataInserted();
           	
    	if($statusOfInsert){ echo $notifySuccessMes; } else   {	echo "okay"; }
        }
        else
        {
        print $this->__('Error');
        }
        
    }
}