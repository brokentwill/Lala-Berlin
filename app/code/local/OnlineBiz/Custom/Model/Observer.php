<?php
 
class OnlineBiz_Custom_Model_Observer
{
    public function cmsField($observer)
    {
        
        $model = Mage::registry('cms_page');
        
        $form = $observer->getForm();

        $fieldset = $form->addFieldset('custom_content_fieldset', array('legend'=>Mage::helper('cms')->__('Custom Content'),'class'=>'fieldset-wide'));

        $fieldset->addField('content-two', 'editor', array(
            'name'      => 'content-two',
            'label'     => Mage::helper('cms')->__('Custom Content'),
            'title'     => Mage::helper('cms')->__('Custom Content'),
            'disabled'  => false,
            'value'     => $model->getContentCustom()
        ));
 
    }
}