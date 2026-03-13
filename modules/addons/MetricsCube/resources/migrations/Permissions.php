<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use MetricsCube\Database\Contracts\MigrationInterface;

class Permissions implements MigrationInterface
{

	public $tableName = 'MetricsCube_Permissions';

	/**
	 * @return mixed|void
	 */
	public function up($params)
	{
		if (!Capsule::schema()->hasTable($this->tableName)) {
			Capsule::schema()->create($this->tableName, function ($table) {
				$table->increments('id');
				$table->integer('admin_role_id');
				$table->integer('action_id');
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
