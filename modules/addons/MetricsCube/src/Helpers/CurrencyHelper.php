<?php

namespace MetricsCube\Helpers;

use WHMCS\Database\Capsule;

/**
 *
 */
class CurrencyHelper
{
	/**
	 * @param $amount
	 * @param $clientID
	 * @return string
	 */
	public static function formatByClient($amount, $clientID)
	{
		if (is_null($clientID)) {
			return $amount;
		}
		if (is_numeric($clientID)) {
			/** @var \MetricsCube\Models\Clients $client */
			$client = Capsule::table('tblclients')->where('id', $clientID)->first();
			if (is_null($client)) {
				return $amount;
			}
		}
		if ($client->currency == 0) {
			$currency = Capsule::table('tblcurrencies')->where('default', 1)->first();
		} else {
			$currency = Capsule::table('tblcurrencies')->where('id', $client->currency)->first();
		}
		if (is_null($currency)) {
			return $amount;
		}
		return self::formatByCurrency($amount, (array)$currency);
	}

	/**
	 * @param $amount
	 * @param $currency
	 * @return string
	 */
	public static function formatByCurrency($amount, $currency)
	{
		if (is_null($currency)) {
			return $amount;
		}
		$format_dm = "2";
		$format_dp = ".";
		$format_ts = "";
		if ($currency["format"] == 2) {
			$format_ts = ",";
		} else {
			if ($currency["format"] == 3) {
				$format_dp = ",";
				$format_ts = ".";
			} else {
				if ($currency["format"] == 4) {
					$format_dm = "0";
					$format_dp = "";
					$format_ts = ",";
				}
			}
		}
		$formattedAmount = number_format($amount, $format_dm, $format_dp, $format_ts);
		return sprintf('%s%s%s', $currency["prefix"], $formattedAmount, $currency["suffix"]);
	}

	public static function getCurrencyPrefixSuffixByCode($currencyCode)
	{
		$currency = Capsule::table('tblcurrencies')->where('code', $currencyCode)->first();
		if (is_null($currency)) {
			return ['prefix' => $currencyCode, 'suffix' => ''];
		}
		return ['prefix' => $currency->prefix, 'suffix' => $currency->suffix];
	}

	/**
	 * @param $clientID
	 * @return array|string[]F
	 */
	public static function getCurrencyPrefixSuffixByClient($clientID)
	{
		if (is_null($clientID)) {
			return ['prefix' => '', 'suffix' => ''];
		}
		if (is_numeric($clientID)) {
			/** @var \MetricsCube\Models\Clients $client */
			$client = Capsule::table('tblclients')->where('id', $clientID)->first();
			if (is_null($client)) {
				return ['prefix' => '', 'suffix' => ''];
			}
		}
		if ($client->currency == 0) {
			$currency = Capsule::table('tblcurrencies')->where('default', 1)->first();
		} else {
			$currency = Capsule::table('tblcurrencies')->where('id', $client->currency)->first();
		}
		return ['prefix' => $currency->prefix, 'suffix' => $currency->suffix];
	}
}