<?php

use WHMCS\Database\Capsule;

add_hook('AcceptOrder', 1, function ($vars) {

    $orderId = $vars['orderid'];

    $order = Capsule::table('tblorders')
        ->where('id', $orderId)
        ->first();

    if (!$order) {
        return;
    }
    
    $invoice = Capsule::table('tblinvoices')
        ->where('id', $order->invoiceid)
        ->first();
        
    $client = Capsule::table('tblclients')
        ->where('id', $order->userid)
        ->first();
    
    $tblaccount = Capsule::table('tblaccounts')
        ->where('invoiceid', $invoice->id)
        ->first();
        
    $tblaccounts = Capsule::table('tblaccounts')
        ->where('invoiceid', $invoice->id)
        ->orderBy('id', 'desc')
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

    AcceptOrderSendToExternalApp($payload);
});


function AcceptOrderSendToExternalApp(array $payload)
{
    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL            => 'https://erp.betopiagroup.com/api/campaign/sale',
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

    logActivity(
        $error
            ? "External App Error: $error"
            : "External App Response: " . $response
    );
}
