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

class Apptha_Outofstocknotification_Block_Adminhtml_Outofstocknotification_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('outofstocknotification_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('outofstocknotification')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('outofstocknotification')->__('Item Information'),
          'title'     => Mage::helper('outofstocknotification')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('outofstocknotification/adminhtml_outofstocknotification_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}