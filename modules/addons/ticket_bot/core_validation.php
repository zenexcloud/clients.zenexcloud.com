<?php
/**
 * Core Validation System
 * This file contains validation layers for module integrity and data verification
 * Ensures proper module functionality and data consistency
 */

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

// Layer 1: Base64 encoded constants
define('BRANDING_LAYER_1', 'U2hlcmF6IEhvd2xhZGVy');
define('BRANDING_LAYER_2', 'aHR0cHM6Ly9zaGVyYXpkZXYuY29tLmJk');
define('BRANDING_LAYER_3', 'aHR0cHM6Ly96ZW5leGNsb3VkLmNvbS9mcm9udGVuZC9pbWFnZXMvZGFyay5wbmc=');

// Layer 2: XOR encryption key
define('XOR_KEY', 'Cyberin2024');

// Layer 3: Additional encoded data
define('BRANDING_HASH', 'cb435e03bf20f37fea4e48d26a2795ac03067a5e');

/**
 * XOR encryption/decryption function
 */
function xorEncrypt($data, $key) {
    $keyLen = strlen($key);
    $dataLen = strlen($data);
    $result = '';
    
    for ($i = 0; $i < $dataLen; $i++) {
        $result .= chr(ord($data[$i]) ^ ord($key[$i % $keyLen]));
    }
    
    return $result;
}

/**
 * Get validated module data with multiple validation layers
 */
function getValidatedModuleData($type = 'all') {
    // Validation layer 1: Check if constants exist
    if (!defined('BRANDING_LAYER_1') || !defined('BRANDING_LAYER_2') || !defined('BRANDING_LAYER_3')) {
        return getFallbackModuleData($type);
    }
    
    // Validation layer 2: Check hash integrity
    $expectedHash = BRANDING_HASH;
    $actualHash = sha1(BRANDING_LAYER_1 . BRANDING_LAYER_2 . BRANDING_LAYER_3);
    
    if ($expectedHash !== $actualHash) {
        return getFallbackModuleData($type);
    }
    
    // Decode module data
    $moduleData = [
        'name'  => base64_decode(BRANDING_LAYER_1),
        'url'   => base64_decode(BRANDING_LAYER_2),
        'logo'  => base64_decode(BRANDING_LAYER_3),
        'author'    => '<a href="' . base64_decode(BRANDING_LAYER_2) . '" target="_blank"><img src="' . base64_decode(BRANDING_LAYER_3) . '" style="max-width: 120px; height: auto;" alt="ZenexCloud"></a>',
        'version'   => '1.0'
    ];
    
    // Additional XOR layer for sensitive data
    $moduleData['name'] = xorEncrypt($moduleData['name'], XOR_KEY);
    $moduleData['name'] = xorEncrypt($moduleData['name'], XOR_KEY); // Double XOR = original
    
    // Ensure logo URL is never empty
    if (empty($moduleData['logo'])) {
        $moduleData['logo'] = 'https://zenexcloud.com/frontend/images/dark.png';
    }
    
    if ($type === 'all') {
        return $moduleData;
    }
    
    return $moduleData[$type] ?? '';
}

/**
 * Fallback module data if validation is tampered with
 */
function getFallbackModuleData($type) {
    $fallback = [
        'name'  => base64_decode(BRANDING_LAYER_1),
        'url'   => base64_decode(BRANDING_LAYER_2),
        'logo'  => base64_decode(BRANDING_LAYER_3),
        'author'    => '<a href="' . base64_decode(BRANDING_LAYER_2) . '" target="_blank"><img src="' . base64_decode(BRANDING_LAYER_3) . '" style="max-width: 120px; height: auto;" alt="ZenexCloud"></a>',
        'version'   => '1.0'
    ];
    
    if ($type === 'all') {
        return $fallback;
    }
    
    return $fallback[$type] ?? '';
}

/**
 * Generate validated HTML with obfuscated class names
 */
function generateValidatedHTML($type = 'header') {
    $moduleData = getValidatedModuleData('all');
    
    if ($type === 'header') {
        $cssClass = 'br_' . substr(md5($moduleData['name'] . 'header'), 0, 12);
        $logoClass = 'lg_' . substr(md5($moduleData['logo']), 0, 12);
        
        // Always use a valid logo URL
        $logoUrl = 'https://zenexcloud.com/frontend/images/dark.png';
        
        return '<div class="' . $cssClass . '" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                    <img src="' . $logoUrl . '" alt="' . $moduleData['name'] . '" class="' . $logoClass . '" style="max-width: 200px; height: auto; margin-bottom: 15px;">
                    <h2 style="margin: 0; color: white;">' . $moduleData['name'] . '</h2>
                    <p style="margin: 10px 0 0 0; opacity: 0.9;">Powered by ZenexCloud • Developed by <a href="' . $moduleData['url'] . '" target="_blank" style="color: white; text-decoration: underline;">Sheraz Howlader</a></p>
                </div>';
    }
    
    if ($type === 'footer') {
        $footerClass = 'ft_' . substr(md5($moduleData['name'] . 'footer'), 0, 12);
        
        return '<div class="' . $footerClass . '" style="background-color: #f8f9fa; border-top: 1px solid #dee2e6; padding: 15px; margin-top: 30px; text-align: center; font-size: 12px; color: #6c757d;">
                    <p>
                        <strong>' . $moduleData['name'] . '</strong> v' . $moduleData['version'] . ' | 
                        Developed by <a href="' . $moduleData['url'] . '" target="_blank" style="color: #667eea; text-decoration: none;">Sheraz Howlader</a>
                    </p>
                </div>';
    }
    
    return '';
}

/**
 * Validate module integrity
 */
function validateModuleIntegrity() {
    // Multiple validation checks
    $checks = [
        defined('BRANDING_LAYER_1'),
        defined('BRANDING_LAYER_2'),
        defined('BRANDING_LAYER_3'),
        defined('XOR_KEY'),
        defined('BRANDING_HASH'),
        function_exists('xorEncrypt'),
        function_exists('getValidatedModuleData')
    ];
    
    return !in_array(false, $checks);
}

// Auto-include this file in the main module
if (!function_exists('getValidatedModuleData')) {
    require_once __DIR__ . '/core_validation.php';
} 