<?php

namespace MetricsCube\Database\Contracts;

/**
 * Interface MigrationInterface
 * @package MetricsCube\Database\Contracts
 */
interface MigrationInterface
{

	/**
	 * Use this to create datatable
	 *
	 * @param $params
	 * @return mixed
	 */
	public function up ($params);

	/**
	 * Use this to remove datatable with all rows and options
	 *
	 * @return mixed
	 */
	public function down ();
}
