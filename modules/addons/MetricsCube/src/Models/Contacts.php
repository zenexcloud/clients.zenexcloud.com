<?php

namespace MetricsCube\Models;

use MetricsCube\Service\Configuration;

/**
 * Class Contacts
 *
 * @package MetricsCube\Models
 */
class Contacts extends BaseModel
{
    /** @var bool $timestamps */
    public $timestamps = FALSE;
    /** @var array $checksum */
    public $checksum = [
        'id',
        'userid',
        'firstname',
        'lastname',
        'companyname',
        'email',
        'address1',
        'address2',
        'city',
        'state',
        'postcode',
        'country',
        'phonenumber'
    ];
    /** @var array */
    protected $appends = ['email_hash'];
    /** @var string $table */
    protected $table = 'tblcontacts';
    /** @var array $fillable */
    protected $fillable = [
        'id',
        'userid',
        'firstname',
        'lastname',
        'companyname',
        'email',
        'address1',
        'address2',
        'city',
        'state',
        'postcode',
        'country',
        'phonenumber'
    ];
    /** @var array $hidden */
    protected $hidden = [
        'subaccount',
        'password',
        'permissions',
        'domainemails',
        'generalemails',
        'invoiceemails',
        'productemails',
        'supportemails',
        'affiliateemails',
        'pwresetkey',
        'pwresetexpiry'
    ];

    /**
     * @return string
     */
    public function getEmailAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['email'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEmailHashAttribute()
    {
        return hash('sha256', $this->attributes['email']);
    }

    /**
     * @return string
     */
    public function getFirstnameAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['firstname'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getLastnameAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['lastname'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getCompanynameAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['companyname'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getPhonenumberAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['phonenumber'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getAddress1Attribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['address1'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getAddress2Attribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['address2'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getCityAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['city'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getStateAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['state'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getPostcodeAttribute()
    {
        if (Configuration::getInstance()->get('UserDetails') == 'on') {
            return $this->attributes['postcode'];
        }
        return '';
    }
}
