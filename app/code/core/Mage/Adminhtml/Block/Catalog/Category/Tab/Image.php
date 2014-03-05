<?php
  
    class Mage_Adminhtml_Block_Catalog_Category_Tab_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
    {
        public function render(Varien_Object $row)
        {

            $product = $row;

            $image_url = $row->getData('image');

            if($image_url && $image_url != 'no_selection')
            {
                $full_image_url = Mage::helper('catalog/image')->init($product, 'image')->resize(100);
                return '<img src="'.$full_image_url.'"/>';
            }
            else {  
                return "-- No Image --";
            }
        }
    }
   