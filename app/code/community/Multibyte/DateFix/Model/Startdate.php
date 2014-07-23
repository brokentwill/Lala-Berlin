<?php

class Multibyte_DateFix_Model_Startdate extends Mage_Catalog_Model_Product_Attribute_Backend_Startdate
{

    protected function _getValueForSave( $object )
    {
        $attributeName = $this->getAttribute()->getName();
        $startDate     = $object->getData( $attributeName );
        if ( $startDate === false )
        {
            return false;
        }
        if ( $startDate == '' && $object->getSpecialPrice() && $attributeName == 'special_price_from' )
        {
            $startDate = Mage::app()->getLocale()->date();
        }

        return $startDate;
    }

}