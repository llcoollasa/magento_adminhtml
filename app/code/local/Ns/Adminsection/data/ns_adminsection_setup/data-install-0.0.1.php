<?php

$brands = array(
    array(
        'title' => 'Netstarter',
        'description' => 'eCommerce Agency specialising in Magento and Hybris',
    ),
    array(
        'title' => 'Salmat',
        'description' => 'Learn how Salmat helps businesses cost effectively find, grow & retain customers through innovative integrated multi-channel.',
    ),
);

foreach ($brands as $brand) {
    Mage::getModel('ns_adminsection/brand')
        ->setData($brand)
        ->save();
}