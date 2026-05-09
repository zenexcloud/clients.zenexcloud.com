<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/init.php';

use WHMCS\Database\Capsule;

$invoiceID = 942;

$invoice = Capsule::table('tblinvoices')
    ->where('id', $invoiceID)
    ->first();

$order = Capsule::table('tblorders')
    ->where('invoiceid', $invoice->id)
    ->first();

    
$client = Capsule::table('tblclients')
    ->where('id', $order->userid)
    ->first();

$tblaccount = Capsule::table('tblaccounts')
    ->where('invoiceid', $invoice->id)
    ->first();

// =============================================

$products = Capsule::table('tblinvoiceitems')
    ->select(
        'tblinvoiceitems.relid as item_relid',

        Capsule::raw("
            CASE 
                WHEN tblinvoiceitems.type IN ('DomainRegister','DomainTransfer','DomainAddonDNS') THEN 'Domain'
                ELSE tblproducts.name
            END as product_type
        "),

        Capsule::raw('SUM(tblinvoiceitems.amount) as total_amount')
    )

    // Hosting join
    ->leftJoin('tblhosting', function ($join) {
        $join->on('tblinvoiceitems.relid', '=', 'tblhosting.id')
            ->whereNotIn('tblinvoiceitems.type', [
                'DomainRegister',
                'DomainTransfer',
                'DomainAddonDNS'
            ]);
    })

    ->leftJoin('tblproducts', 'tblhosting.packageid', '=', 'tblproducts.id')

    // Domain join
    ->leftJoin('tbldomains', function ($join) {
        $join->on('tblinvoiceitems.relid', '=', 'tbldomains.id')
            ->whereIn('tblinvoiceitems.type', [
                'DomainRegister',
                'DomainTransfer',
                'DomainAddonDNS'
            ]);
    })

    ->where('tblinvoiceitems.invoiceid', $order->invoiceid)

    ->groupBy('tblinvoiceitems.relid')
    ->groupBy('product_type')

    ->get();

$client_name = ($client->firstname ?? '') . ' ' . ($client->lastname ?? '');

$payload = [
    'order_id'          => $order->id,  // r&d purpose
    
    'invoice_number'    => (float) $order->invoiceid,
    'customer_name'     => $client_name,
    'coupon_code'       => $order->promocode,
    'incoming_date'     => date('Y-m-d', strtotime($order->date)),
    'total_amount'      => (float) $tblaccount->amountin,
    'stripe_fee'        => (float) $tblaccount->fees,

    "description"       => "this is for testing purpose",
];


$productList = [];

foreach ($products as $item) {
    $amount     = (float) $item->total_amount;
    $tax        = $amount * $invoice->taxrate / 100;

    $productList[] = [
        'product_ref'    => $item->item_type ?? $item->product_type,
        'quantity'       => 1,
        'product_amount' => round($amount + $tax, 2),
    ];
}

$payload['product'] = $productList;
$payload['refund_amount'] = (float) $vars['amount'];
$payload['campaign_order_id'] = $order->id;


// $payload['debug_purpose'] = $tblaccounts;

// =============================================

header('Content-Type: application/json');
echo json_encode($payload);
exit;