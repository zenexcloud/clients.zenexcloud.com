<?php

namespace MetricsCube\Models;

use MetricsCube\Service\Configuration;

/**
 * Class Clients
 *
 * @property $currency
 * @package MetricsCube\Models
 */
class Clients extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
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
		'phonenumber',
		'currency',
		'defaultgateway',
		'credit',
		'datecreated',
		'notes',
		'groupid',
		'status',
		'language'
	];
	/** @var array */
	protected $appends = ['email_hash'];
	/** @var string $table */
	protected $table = 'tblclients';
	/** @var array $fillable */
	protected $fillable = [
		'id',
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
		'phonenumber',
		'currency',
		'defaultgateway',
		'credit',
		'taxexempt',
		'latefeeoveride',
		'overideduenotices',
		'separateinvoices',
		'disableautocc',
		'datecreated',
		'notes',
		'billingcid',
		'groupid',
		'lastlogin',
		'status',
		'language',
		'allow_sso',
		'email_verified',
	];
	/** @var array $hidden */
	protected $hidden = [
		'uuid',
		'password',
		'authmodule',
		'authdata',
		'securityqid',
		'securityqans',
		'cardtype',
		'cardlastfour',
		'cardnum',
		'startdate',
		'expdate',
		'issuenumber',
		'bankname',
		'banktype',
		'bankcode',
		'bankacct',
		'gatewayid',
		'ip',
		'host',
		'pwresetkey',
		'emailoptout',
		'overrideautoclose',
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
