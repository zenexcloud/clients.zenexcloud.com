<?php

namespace MetricsCube\Models;

/**
 * Class Products
 *
 * @package MetricsCube\Models
 */
class Products extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'type',
		'gid',
		'name',
		'paytype',
		'servertype',
		'servergroup',
		'recurringcycles',
		'tax',
		'order',
		'retired',
		'is_featured'
	];
	/** @var string $table */
	protected $table = 'tblproducts';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'type',
		'gid',
		'name',
		'hidden',
		'showdomainoptions',
		'welcomeemail',
		'stockcontrol',
		'qty',
		'proratabilling',
		'proratadate',
		'proratachargenextmonth',
		'paytype',
		'allowqty',
		'subdomain',
		'autosetup',
		'servertype',
		'servergroup',
		'freedomain',
		'freedomainpaymentterms',
		'freedomaintlds',
		'recurringcycles',
		'autoterminatedays',
		'autoterminateemail',
		'configoptionsupgrade',
		'billingcycleupgrade',
		'upgradeemail',
		'overagesenabled',
		'overagesdisklimit',
		'overagesbwlimit',
		'overagesdiskprice',
		'overagesbwprice',
		'tax',
		'affiliateonetime',
		'affiliatepaytype',
		'affiliatepayamount',
		'order',
		'retired',
		'is_featured'
	];
	/** @var array $hidden */
	protected $hidden = [
		'description',
		'configoption1',
		'configoption2',
		'configoption3',
		'configoption4',
		'configoption5',
		'configoption6',
		'configoption7',
		'configoption8',
		'configoption9',
		'configoption10',
		'configoption11',
		'configoption12',
		'configoption13',
		'configoption14',
		'configoption15',
		'configoption16',
		'configoption17',
		'configoption18',
		'configoption19',
		'configoption20',
		'configoption21',
		'configoption22',
		'configoption23',
		'configoption24',
	];
}
