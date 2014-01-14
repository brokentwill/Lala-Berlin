<?php

class OnlineBiz_Custom_Block_Adminhtml_Cms_Block_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

	public function __construct()
    {
        parent::__construct();
        $this->setId('block_form');
        $this->setTitle(Mage::helper('cms')->__('Block Information'));
    }


	protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

  	protected function _prepareForm()
    {

        $model = Mage::registry('cms_block');

        $form = new Varien_Data_Form(
            array('id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post', 'enctype' => 'multipart/form-data')
        );

        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('cms')->__('General Information'), 'class' => 'fieldset-wide'));

        //$fieldset->addType('image', 'OnlineBiz_Custom_Helper_Adminhtml_Helper_Image');

        if ($model->getBlockId()) {
            $fieldset->addField('block_id', 'hidden', array(
                'name' => 'block_id',
            ));
        }

        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('cms')->__('Block Title'),
            'title'     => Mage::helper('cms')->__('Block Title'),
            'required'  => true,
        ));

        $fieldset->addField('identifier', 'text', array(
            'name'      => 'identifier',
            'label'     => Mage::helper('cms')->__('Identifier'),
            'title'     => Mage::helper('cms')->__('Identifier'),
            'required'  => true,
            'class'     => 'validate-xml-identifier',
        ));
 
	    // $fieldset->addField('feature_img', 'image', array(
	    //     'name' => 'feature_img',
     //        //'multiple'  => 'multiple',
	    //     'label' => 'Feature image',
	    //     'title' => 'Feature image',
	    //     'required'  => false,
     //        'disabled'  => $isElementDisabled
	    // ));

        // $fieldset->addField('link_to', 'text', array(
        //     'name'      => 'link_to',
        //     'label'     => Mage::helper('cms')->__('Link to Page'),
        //     'title'     => Mage::helper('cms')->__('Link to Page'),
        //     'required'  => false,
        //     'class'     => 'link_to',
        // ));

        // $fieldset->addField('block_order', 'text', array(
        //     'name'      => 'block_order',
        //     'label'     => Mage::helper('cms')->__('Sort Order'),
        //     'title'     => Mage::helper('cms')->__('Sort Order'),
        //     'required'  => false,
        //     'class'     => 'block_order',
        // ));

        // $fieldset->addField('position', 'select', array(
        //     'label'     => Mage::helper('cms')->__('Select Position'),
        //     'title'     => Mage::helper('cms')->__('Select Position'),
        //     'name'      => 'position',
        //     'required'  => false,
        //     'options'   => array(
        //     	'0' => Mage::helper('cms')->__(''),
        //         '1' => Mage::helper('cms')->__('1'),
        //         '2' => Mage::helper('cms')->__('2'),
        //         '3' => Mage::helper('cms')->__('3'),
        //         '4' => Mage::helper('cms')->__('4'),
        //         '5' => Mage::helper('cms')->__('5'),
        //         '6' => Mage::helper('cms')->__('6'),
        //         '7' => Mage::helper('cms')->__('7'),
        //         '8' => Mage::helper('cms')->__('8'),
        //         '9' => Mage::helper('cms')->__('9'),
        //         '10' => Mage::helper('cms')->__('10'),
        //         '11' => Mage::helper('cms')->__('11'),
        //         '12' => Mage::helper('cms')->__('12'),
        //         '13' => Mage::helper('cms')->__('13'),
        //         '14' => Mage::helper('cms')->__('14'),
        //         '15' => Mage::helper('cms')->__('15'),
        //         '16' => Mage::helper('cms')->__('16'),
        //         '17' => Mage::helper('cms')->__('17'),
        //         '18' => Mage::helper('cms')->__('18'),
        //         '19' => Mage::helper('cms')->__('19'),
        //         '20' => Mage::helper('cms')->__('20'),
        //         '21' => Mage::helper('cms')->__('21'),
        //         '22' => Mage::helper('cms')->__('22'),
        //         '23' => Mage::helper('cms')->__('23'),
        //         '24' => Mage::helper('cms')->__('24'),
        //         '25' => Mage::helper('cms')->__('25'),
        //         '26' => Mage::helper('cms')->__('26'),
        //         '27' => Mage::helper('cms')->__('27'),
        //         '28' => Mage::helper('cms')->__('28'),
        //         '29' => Mage::helper('cms')->__('29'),
        //         '30' => Mage::helper('cms')->__('30'),
        //         '31' => Mage::helper('cms')->__('31'),
        //         '32' => Mage::helper('cms')->__('32'),
        //         '33' => Mage::helper('cms')->__('33'),
        //         '34' => Mage::helper('cms')->__('34'),
        //         '35' => Mage::helper('cms')->__('35'),
        //         '36' => Mage::helper('cms')->__('36'),
        //         '37' => Mage::helper('cms')->__('37'),
        //         '38' => Mage::helper('cms')->__('38'),
        //         '39' => Mage::helper('cms')->__('39'),
        //         '40' => Mage::helper('cms')->__('40'),
        //     ),
        // ));

        /**
         * Check is single store mode
         */
        if (!Mage::app()->isSingleStoreMode()) {
            $field =$fieldset->addField('store_id', 'multiselect', array(
                'name'      => 'stores[]',
                'label'     => Mage::helper('cms')->__('Store View'),
                'title'     => Mage::helper('cms')->__('Store View'),
                'required'  => true,
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
            $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
            $field->setRenderer($renderer);
        }
        else {
            $fieldset->addField('store_id', 'hidden', array(
                'name'      => 'stores[]',
                'value'     => Mage::app()->getStore(true)->getId()
            ));
            $model->setStoreId(Mage::app()->getStore(true)->getId());
        }

        $fieldset->addField('is_active', 'select', array(
            'label'     => Mage::helper('cms')->__('Status'),
            'title'     => Mage::helper('cms')->__('Status'),
            'name'      => 'is_active',
            'required'  => true,
            'options'   => array(
                '1' => Mage::helper('cms')->__('Enabled'),
                '0' => Mage::helper('cms')->__('Disabled'),
            ),
        ));
        if (!$model->getId()) {
            $model->setData('is_active', '1');
        }

        $fieldset->addField('content', 'editor', array(
            'name'      => 'content',
            'label'     => Mage::helper('cms')->__('Content'),
            'title'     => Mage::helper('cms')->__('Content'),
            'style'     => 'height:36em',
            'required'  => false,
            'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig()
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}