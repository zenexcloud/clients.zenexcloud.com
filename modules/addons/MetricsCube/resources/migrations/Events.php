<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use MetricsCube\Database\Contracts\MigrationInterface;

class Events implements MigrationInterface
{

    public $tableName = 'MetricsCube_Events';

    /**
     * @return mixed|void
     */
    public function up($params)
    {
        if (!Capsule::schema()->hasTable($this->tableName)) {
            Capsule::schema()->create($this->tableName, function ($table) {
                $table->increments('id');
                $table->string('hook');
                $table->binary('data');
                $table->dateTime('date')->nullable();
                $table->timestamp('created_at')->useCurrent();
            });
        }

        if (!Capsule::schema()->hasColumn($this->tableName, 'date')) {
            Capsule::schema()->drop($this->tableName);
            Capsule::schema()->create($this->tableName, function ($table) {
                $table->increments('id');
                $table->string('hook');
                $table->binary('data');
                $table->dateTime('date')->nullable();
                $table->timestamp('created_at')->useCurrent();
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
