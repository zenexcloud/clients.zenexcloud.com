<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use MetricsCube\Database\Contracts\MigrationInterface;

class Actions implements MigrationInterface
{

	public $tableName = 'MetricsCube_Actions';

	/**
	 * @return mixed|void
	 */
	public function up($params)
	{
		if (!Capsule::schema()->hasTable($this->tableName)) {
			Capsule::schema()->create($this->tableName, function ($table) {
				$table->increments('id');
				$table->integer('parent_id');
				$table->string('action');
				$table->string('title');
			});
		}
	}

	/**
	 * @return mixed|void
	 */
	public function down()
	{
		if (Capsule::schema()->hasTable($this->tableName)) {
			Capsule::schema()->drop($this->tableName);
		}
	}

}
