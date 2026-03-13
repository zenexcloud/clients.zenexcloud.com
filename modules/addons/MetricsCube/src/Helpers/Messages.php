<?php

namespace MetricsCube\Helpers;

class Messages
{

	/** @var array */
	private $messages = [];

	public function __construct()
	{
		$path = METRICSCUBE . DS . 'config' . DS . 'messages.php';
		if (file_exists($path)) {
			$this->messages = include $path;
		}
	}

	/**
	 *
	 * @param string $key
	 * @param string $default
	 * @return array|string
	 */
	public function error($key = null, $default = null)
	{
		if (is_null($key)) {
			return $this->messages;
		}
		return $this->getMessage('errors.' . $key, $default);
	}

	/**
	 *
	 * @param string $key
	 * @param string $default
	 * @return array|string
	 */
	public function warning($key = null, $default = null)
	{
		if (is_null($key)) {
			return $this->messages;
		}
		return $this->getMessage('warnings.' . $key, $default);
	}

	/**
	 *
	 * @param string $key
	 * @param string $default
	 * @return array|string
	 */
	public function message($key = null, $default = null)
	{
		if (is_null($key)) {
			return $this->messages;
		}
		return $this->getMessage('messages.' . $key, $default);
	}

	/**
	 *
	 * @param string $key
	 * @param string $default
	 * @return array|string
	 */
	private function getMessage($key = null, $default = null)
	{

		if (is_null($key)) {
			return $this->messages;
		}
		if ($this->exists($this->messages, $key)) {
			return $this->messages[$key];
		}
		if (strpos($key, '.') === FALSE) {
			return $default;
		}
		$items = $this->messages;
		foreach (explode('.', $key) as $segment) {
			if (!is_array($items) || !$this->exists($items, $segment)) {
				return $default;
			}
			$items = &$items[$segment];
		}
		return $items;
	}

	/**
	 *
	 * @param mixed $array
	 * @param array $key
	 * @return bool
	 */
	protected function exists($array, $key)
	{
		return array_key_exists($key, $array);
	}

}


