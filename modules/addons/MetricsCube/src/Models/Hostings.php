<?php

namespace MetricsCube\Models;

use MetricsCube\Service\Configuration;

/**
 * Class Hostings
 *
 * @package MetricsCube\Models
 */
class Hostings extends BaseModel
{
    /** @var bool $timestamps */
    public $timestamps = FALSE;
    /** @var array $checksum */
    public $checksum = [
        'id',
        'userid',
        'orderid',
        'packageid',
        'server',
        'regdate',
        'paymentmethod',
        'firstpaymentamount',
        'amount',
        'billingcycle',
        'nextduedate',
        'nextinvoicedate',
        'domainstatus',
        'promoid'
    ];
    /** @var string $table */
    protected $table = 'tblhosting';
    /** @var array $appends */
    protected $appends = ['tld', 'subdomain', 'domain_hash'];
    /** @var array $fillable */
    protected $fillable = [
        'id',
        'userid',
        'orderid',
        'packageid',
        'server',
        'domain',
        'regdate',
        'domain_hash',
        'tld',
        'subdomain',
        'paymentmethod',
        'firstpaymentamount',
        'amount',
        'billingcycle',
        'nextduedate',
        'nextinvoicedate',
        'termination_date',
        'completed_date',
        'domainstatus',
        'promoid',
        'diskusage',
        'disklimit',
        'bwusage',
        'bwlimit',
        'lastupdate'
    ];
    /** @var array $hidden */
    protected $hidden = [
        'username',
        'password',
        'notes',
        'subscriptionid',
        'suspendreason',
        'overideautosuspend',
        'overidesuspenduntil',
        'dedicatedip',
        'assignedips',
        'ns1',
        'ns2'
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
