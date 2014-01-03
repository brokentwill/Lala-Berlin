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

class Apptha_Outofstocknotification_Block_Adminhtml_Outofstocknotification_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('outofstocknotification_form', array('legend'=>Mage::helper('outofstocknotification')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('outofstocknotification')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('outofstocknotification')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('outofstocknotification')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('outofstocknotification')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('outofstocknotification')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('outofstocknotification')->__('Content'),
          'title'     => Mage::helper('outofstocknotification')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getOutofstocknotificationData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getOutofstocknotificationData());
          Mage::getSingleton('adminhtml/session')->setOutofstocknotificationData(null);
      } elseif ( Mage::registry('outofstocknotification_data') ) {
          $form->setValues(Mage::registry('outofstocknotification_data')->getData());
      }
      return parent::_prepareForm();
  }
}