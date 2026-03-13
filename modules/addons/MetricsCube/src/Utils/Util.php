<?php

namespace MetricsCube\Utils;

class Util
{

	public static function exceptionToString($e)
	{
		return sprintf('%s <br>in file %s:%d', $e->getMessage(), $e->getFile(), $e->getLine());
	}

	public static function getAdminUrl()
	{
		global $CONFIG, $customadminpath;

		return $CONFIG['SystemURL'] . '/' . $customadminpath;
	}

	public static function getSystemUrl()
	{
		return isset($GLOBALS['CONFIG']['SystemSSLURL']) ? $GLOBALS['CONFIG']['SystemSSLURL'] : $GLOBALS['CONFIG']['SystemURL'];
	}

	public static function haveArray(array $test_var)
	{
		foreach ($test_var as $key => $el) {
			if (is_array($el)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	static function isJson($string)
	{
		if (strlen($string) <= 0)
			return FALSE;
		$result = json_decode($string);

		return (json_last_error() == JSON_ERROR_NONE) && is_array($result);
	}

	public static function randomPassword($size = 8)
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%*?_~';
		$symbols = '!@#$%*?_~';
		$pass = [];
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < $size; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		$passStrong = FALSE;
		do {
			if (count(preg_grep('/[!@#\$%\^&\*\?_~]/', $pass)) >= 4) {
				$passStrong = TRUE;
			} else {
				$pass[rand(0, $alphaLength)] = $symbols[rand(0, strlen($symbols) - 1)];
			}
		} while (!$passStrong);

		return implode($pass);
	}

	public static function setWelcomeCookie($cookieName, $hours)
	{
		setcookie($cookieName, '1', (time() + $hours * 3600), '/', '', TRUE);
	}

	public static function timeDiff($time1, $time2, $precision = 2)
	{
		if ($time1 > $time2) {
			[$time1, $time2] = [$time2, $time1];
		}
		$intervals = ['year', 'month', 'day', 'hour', 'minute', 'second'];
		$diffs = [];
		foreach ($intervals as $interval) {
			$ttime = strtotime('+1 ' . $interval, $time1);
			$add = 1;
			$looped = 0;
			while ($time2 >= $ttime) {
				$add++;
				$ttime = strtotime("+" . $add . " " . $interval, $time1);
				$looped++;
			}
			$time1 = strtotime("+" . $looped . " " . $interval, $time1);
			$diffs[$interval] = $looped;
		}
		$count = 0;
		$times = [];
		foreach ($diffs as $interval => $value) {
			if ($count >= $precision) {
				break;
			}
			if ($value > 0) {
				if ($value != 1) {
					$interval .= "s";
				}
				$times[] = $value . " " . $interval;
				$count++;
			}
		}
		return implode(", ", $times);
	}
}
