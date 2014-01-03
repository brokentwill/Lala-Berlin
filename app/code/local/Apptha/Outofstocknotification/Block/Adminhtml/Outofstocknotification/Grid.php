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

class Apptha_Outofstocknotification_Block_Adminhtml_Outofstocknotification_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
  	
      parent::__construct();
      $this->setId('outofstocknotificationGrid');
      $this->setDefaultSort('outofstocknotification_id');
      $this->setDefaultDir('DESC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('outofstocknotification/outofstocknotification')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
  	?>

  	<?php 
  	 $this->addColumn('outofstocknotification_id', array(
          'header'    => Mage::helper('outofstocknotification')->__('ID'),
          'align'     =>'center',
          'width'     => '50px',
          'index'     => 'outofstocknotification_id',
      ));

      $this->addColumn('product_id', array(
          'header'    => Mage::helper('outofstocknotification')->__('Product ID'),
          'align'     =>'center',
          'width'     => '50px',
          'index'     => 'product_id',
      ));

	  
      $this->addColumn('product_name', array(
			'header'    => Mage::helper('outofstocknotification')->__('Product Name'),
                        'align'     =>'left',
			'width'     => '200px',	
			'index'     => 'product_name',
      ));
      $this->addColumn('email_id', array(
			'header'    => Mage::helper('outofstocknotification')->__('Customer Email Id'),
                        'align'     =>'left',
                        'width'     => '50px',
			'index'     => 'email_id',
      ));
	  $this->addColumn('mailsend_status', array(
			'header'    => Mage::helper('outofstocknotification')->__('Mail Status'),
			'width'     => '50px',
			'index'     => 'mailsend_status',
	   		'align'     =>'center',
      ));
      $this->addColumn('Notify Added', array(
			'header'    => Mage::helper('outofstocknotification')->__('Notify Added'),
			'width'     => '50px',
			'index'     => 'created_time',
	   		'align'     =>'left',
      ));
      $this->addColumn('Notify Updated', array(
			'header'    => Mage::helper('outofstocknotification')->__('Notify Updated'),
			'width'     => '50px',
			'index'     => 'update_time',
	   		'align'     =>'left',
      ));

 
		$this->addExportType('*/*/exportCsv', Mage::helper('outofstocknotification')->__('CSV'));
		
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('outofstocknotification_id');
        $this->getMassactionBlock()->setFormFieldName('outofstocknotification');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('outofstocknotification')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('outofstocknotification')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('outofstocknotification/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
       
        return $this;
    }

  public function getRowUrl($row)
  {
  
  }

}
?>
