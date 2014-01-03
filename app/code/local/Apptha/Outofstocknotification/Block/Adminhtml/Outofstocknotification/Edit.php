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

class Apptha_Outofstocknotification_Block_Adminhtml_Outofstocknotification_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'outofstocknotification';
        $this->_controller = 'adminhtml_outofstocknotification';
        
        $this->_updateButton('save', 'label', Mage::helper('outofstocknotification')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('outofstocknotification')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('outofstocknotification_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'outofstocknotification_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'outofstocknotification_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('outofstocknotification_data') && Mage::registry('outofstocknotification_data')->getId() ) {
            return Mage::helper('outofstocknotification')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('outofstocknotification_data')->getTitle()));
        } else {
            return Mage::helper('outofstocknotification')->__('Add Item');
        }
    }
}