<?php
if (!defined('WHMCS')) {
    die('You cannot access this file directly');
}

/**
 * Add JavaScript to the admin area support ticket view page footer.
 *
 * Using the 'AdminAreaFooterOutput' hook ensures that our script is loaded
 * at the end of the page, after all major libraries like jQuery have been
 * initialized. This is the safest way to add custom JavaScript.
 *
 * We use the '$vars['filename']' check to ensure this script ONLY runs on
 * the support ticket view page, preventing any interference with other
 * parts of the WHMCS admin area, such as the dashboard.
 *
 * @param array $vars An array of hook parameters.
 * @return string The HTML to be output in the footer.
 */
add_hook('AdminAreaFooterOutput', 1, function($vars) {
    // Check if we are on the correct page (support ticket view).
    if (isset($vars['filename']) && $vars['filename'] == 'supporttickets' &&
        isset($_GET['action']) && $_GET['action'] == 'view') {
        
        // Return the script tag. A version number is appended for cache-busting.
        return '<script src="../modules/addons/ticket_bot/js/admin.js?v=1.5"></script>';
    }
    
    // Return an empty string for all other pages.
    return '';
}); 