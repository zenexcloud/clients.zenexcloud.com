<?php

use WHMCS\Database\Capsule;

add_hook('ManualRefund', 1, function($vars) {
    
    // $vars['transid'] __eta hocche 'tblaccounts' er id

    $tblacc = Capsule::table('tblaccounts')
        ->where('id', $vars['transid'])
        ->first();

    $invoiceID = $tblacc->invoiceid;

    $invoice = Capsule::table('tblinvoices')
        ->where('id', $invoiceID)
        ->first();

    $order = Capsule::table('tblorders')
        ->where('invoiceid', $invoice->id)
        ->first();
        
    $payload['campaign_order_id'] = (string) $order->id;
    $payload['refund_date'] = date('Y-m-d');
    $payload['refund_amount'] = (float) $vars['amount'];
    $payload['refund_reason'] = "Cancellation from WHMCS";
    
    writeLogManualRefund($payload);
});


function writeLogManualRefund(array $payload)
{
    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL            => 'https://erp.betopiagroup.com/api/campaign/sale/refund',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'x-api-key: 7db5c6a77484173c66d9829320fb97a25c70bba58d4de36fb49fbee8778835ee'
        ],
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_TIMEOUT        => 30,
    ]);

    $response = curl_exec($ch);
    $error    = curl_error($ch);

    curl_close($ch);
}
