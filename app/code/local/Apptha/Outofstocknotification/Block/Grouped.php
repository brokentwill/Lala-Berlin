<?php
/**
 * @name         :  Apptha Out Of Stock Notification
 * @version      :  0.1.5
 * @since        :  Magento 1.4
 * @author       :  Apptha - http://www.apptha.com
 * @copyright    :  Copyright (C) 2011 Powered by Apptha
 * @license      :  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Creation Date:  June 20 2011
 * @Modified By  :  Bala G
 * @Modified Date:  August 7 2013
 *
 * */
?>
<?php

class Apptha_Outofstocknotification_Block_Grouped extends Mage_Catalog_Block_Product_View_Type_Grouped
{                                                         
    protected function _prepareLayout()
    {
        $simpleBlock  = $this->getLayout()->getBlock('product.info.simple');
        $virtualBlock = $this->getLayout()->getBlock('product.info.virtual');
        
        $groupedBlock = $this->getLayout()->getBlock('product.info.grouped');
        
        $configurableBlock = $this->getLayout()->getBlock('product.info.configurable');
        
        
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
            $groupedBlock->setTemplate('outofstocknotification/grouped.phtml');
        }

    }
}

?>
