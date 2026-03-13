<?php

namespace MetricsCube\Helpers;

use DateInterval;
use WHMCS\Database\Capsule;

class TimeHelper
{
	/**
	 * @param $fromDate
	 * @param $toDate
	 * @return false|DateInterval
	 */
	public static function calculateDiff($fromDate, $toDate = null)
	{
		if (is_null($toDate)) {
			$toDate = date('Y-m-d');
		}
		$datetime1 = date_create($fromDate);
		$datetime2 = date_create($toDate);
		return date_diff($datetime2, $datetime1);
	}

	/**
	 * @param $fromDate
	 * @param $toDate
	 * @return string
	 */
	public static function getTimeDiffFormatted($fromDate, $toDate = null)
	{
		$diff = self::calculateDiff($fromDate, $toDate);
		if ($diff instanceof DateInterval) {
			$diffName = '';
			$y = FALSE;
			$m = FALSE;
			$d = FALSE;
			if ($diff->y==0 && $diff->m==0 && $diff->d==0){
				return '0 days';
			}
			if ($diff->y > 0) {
				$y = $diff->y . ($diff->y > 1 ? ' years ' : ' year ');
			}
			if ($diff->m > 0) {
				$m = $diff->m . ($diff->m > 1 ? ' months ' : ' month ');
			}
			if ($diff->d > 0) {
				$d = $diff->d . ($diff->d > 1 ? ' days ' : ' day ');
			}
			if ($y !== FALSE && $m === FALSE && $d === FALSE) {
				//only year
				$diffName .= $y;
			} elseif ($y === FALSE && $m !== FALSE && $d === FALSE) {
				//only month
				$diffName .= $m;
			} elseif ($y === FALSE && $m === FALSE && $d !== FALSE) {
				//only day
				$diffName .= $d;
			} elseif ($y !== FALSE && $m !== FALSE && $d === FALSE) {
				//year and month
				$diffName .= $y . ' and ' . $m;
			} elseif ($y !== FALSE && $m === FALSE && $d !== FALSE) {
				//year and day
				$diffName .= $y . ' and ' . $d;
			} elseif ($y === FALSE && $m !== FALSE && $d !== FALSE) {
				//month and day
				$diffName .= $m . ' and ' . $d;
			} else {
				//all
				$diffName .= $y . ', ' . $m . ' and ' . $d;
			}

			return trim($diffName);

		}
		return '';
	}

	/**
	 * @param $regdate
	 * @return string
	 */
	public static function formatForAdmin($regdate)
	{
		$format = Capsule::table('tblconfiguration')->where('setting', 'DateFormat')->first();
		if (is_null($format)) {
			return $regdate;
		}
		switch ($format->value) {
			case 'DD/MM/YYYY';
				return date('d/m/y', strtotime($regdate));
				break;
			case 'DD.MM.YYYY';
				return date('d.m.y', strtotime($regdate));
				break;
			case 'DD-MM-YYYY';
				return date('d-m-y', strtotime($regdate));
				break;
			case 'MM/DD/YYYY';
				return date('m/d/y', strtotime($regdate));
				break;
			case 'YYYY/MM/DD';
				return date('y/m/d', strtotime($regdate));
				break;
			case 'YYYY-MM-DD';
				return date('y-m-d', strtotime($regdate));
				break;
			default:
				break;
		}
		return $regdate;
	}
}