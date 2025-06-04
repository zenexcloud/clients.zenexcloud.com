<?php

use WHMCS\View\Menu\Item as MenuItem;

add_hook('ClientAreaPrimaryNavbar', 1, function (MenuItem $primaryNavbar) {
    // Check if the "Home" menu item exists
    if (!is_null($primaryNavbar->getChild('Home'))) {
        // Set a custom URL for the "Home" menu item
        $primaryNavbar->getChild('Home')->setUri('https://zenexcloud.com');
    }
});
