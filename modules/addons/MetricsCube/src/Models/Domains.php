<?php

namespace MetricsCube\Models;

use MetricsCube\Service\Configuration;

/**
 * Class Domains
 *
 * @package MetricsCube\Models
 */
class Domains extends BaseModel
{
    /** @var bool $timestamps */
    public $timestamps = FALSE;
    /** @var array $checksum */
    public $checksum = [
        'id',
        'userid',
        'orderid',
        'type',
        'registrationdate',
        'firstpaymentamount',
        'recurringamount',
        'registrar',
        'registrationperiod',
        'expirydate',
        'subscriptionid',
        'promoid',
        'status',
        'nextduedate',
        'nextinvoicedate',
        'paymentmethod'
    ];
    /** @var string $table */
    protected $table = 'tbldomains';
    /** @var array $appends */
    protected $appends = ['tld', 'subdomain', 'domain_hash'];
    /** @var array $fillable */
    protected $fillable = [
        'id',
        'userid',
        'orderid',
        'type',
        'registrationdate',
        'domain',
        'domain_hash',
        'tld',
        'subdomain',
        'firstpaymentamount',
        'recurringamount',
        'registrar',
        'registrationperiod',
        'expirydate',
        'subscriptionid',
        'promoid',
        'status',
        'nextduedate',
        'nextinvoicedate',
        'paymentmethod',
        'dnsmanagement',
        'emailforwarding',
        'idprotection',
        'is_premium',
        'donotrenew',
        'reminders',
        'synced'
    ];
    /** @var array $hidden */
    protected $hidden = [
        'additionalnotes'
    ];

    /**
     * @return string
     */
    public function getDomainAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['domain'];
        }
        return '';
    }
}
