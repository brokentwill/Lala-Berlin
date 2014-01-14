<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Cms
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Cms page content block
 *
 * @category   Mage
 * @package    Mage_Cms
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class OnlineBiz_Custom_Block_Page extends Mage_Cms_Block_Page
{


    /**
     * Prepare HTML content
     *
     * @return string
     */
    protected function _toHtml()
    {
        /* @var $helper Mage_Cms_Helper_Data */
        $helper = Mage::helper('cms');
        $processor = $helper->getPageTemplateProcessor();
        if (!$this->getPage()->getContentThree()) {
            $html = $processor->filter($this->getPage()->getContent());
            $html = $html . $processor->filter($this->getPage()->getContentTwo());
        } else {
            $html = $processor->filter($this->getPage()->getContent());
            $html .= '<div class="col2-set">
                        <div class="col-1">' . 
                            $processor->filter($this->getPage()->getContentTwo()) . 
                        '</div>
                        <div class="col-2">' .
                            $processor->filter($this->getPage()->getContentThree()) .  
                        '</div>
                    </div>';
        }
        
        $html = $this->getMessagesBlock()->toHtml() . $html;
        return $html;
    }
}
