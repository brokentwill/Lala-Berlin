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

class Apptha_Outofstocknotification_Block_View extends Mage_Catalog_Block_Product_View
{
    protected function _prepareLayout()
    {   
        $enableOutOfStock = Mage::getStoreConfig('Outofstocknotification/general/activate_apptha_outofstock_enable');
        $enableOutOfStock = intval($enableOutOfStock);
        if($enableOutOfStock == 0){
        return ;
        }
        
        $simpleBlock  = $this->getLayout()->getBlock('product.info.simple');
        $virtualBlock = $this->getLayout()->getBlock('product.info.virtual');
        
        $groupedBlock = $this->getLayout()->getBlock('product.info.grouped');
        $configurableBlock = $this->getLayout()->getBlock('product.info.configurable');

        //Mage_Downloadable_Block_Catalog_Product_View_Type
        if ($simpleBlock) {
            $simpleBlock->setTemplate('outofstocknotification/view.phtml');
        }
        else if ($virtualBlock) {
            $virtualBlock->setTemplate('outofstocknotification/view.phtml');
        }
        else if($configurableBlock){
            $configurableBlock->setTemplate('outofstocknotification/view.phtml');
           
        }
        else if($groupedBlock){
            
            $groupedBlock->setTemplate('outofstocknotification/view.phtml');
        }
        
    }
}

?>
