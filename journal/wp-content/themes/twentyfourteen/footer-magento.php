<?php
/**
 * The template for displaying the footer
 *
 */
if(class_exists('Mage')){
    // Instantiate session and generate needed cookie
    Mage::getSingleton('core/session', array('name' => 'frontend'));
    $Block = Mage::getSingleton('core/layout');
    // And the footer's HTML as well
    $footer = $Block->createBlock('Page/Html_Footer');
    $footer->setTemplate('page/html/footer.phtml');
}
?>
         <?php
            // Display the Footer HTML
            echo (class_exists('Mage')) ? $footer->toHTML() : '' ;
        ?>
    </div>
</div>
</body>
