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
class Apptha_Outofstocknotification_Block_Adminhtml_Outofstocknotification extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_outofstocknotification';
    $this->_blockGroup = 'outofstocknotification';
    $this->_headerText = Mage::helper('outofstocknotification')->__('Notified Customers Grid View');
    parent::__construct();
    $this->_removeButton('add');
  }
}