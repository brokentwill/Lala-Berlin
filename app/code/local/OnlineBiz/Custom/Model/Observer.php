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


    public function initProductAfterCheckBreadcrumb($observer)
    {
        $currentStoreId = Mage::app()->getStore()->getId();
        $_product = $observer->getEvent()->getProduct();
        if(Mage::registry('current_category'))
            return $this;
        $categories = $_product->getCategoryCollection();
        $rootCat = Mage::app()->getStore()->getRootCategoryId();
        $categories->addIsActiveFilter();
        $categories->addPathsFilter('1/'. $rootCat . '/');
        $categories->addAttributeToSort('level', 'desc');
        $category = $categories->getFirstItem();
        if($category->getId()):
            $category = Mage::getModel('catalog/category')->load($category->getId());
            $_product->setCategory($category);
            Mage::register('current_category', $category);
        endif;
        return $this;
    }


}