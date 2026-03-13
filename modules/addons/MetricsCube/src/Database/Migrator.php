<?php

namespace MetricsCube\Database;

use MetricsCube\Database\Contracts\MigrationInterface;
use Symfony\Component\HttpFoundation\File\File;
use function Couchbase\defaultDecoder;

/**
 * Class Migrator
 * @package MetricsCube\Database
 */
class Migrator
{

    private $migrationFiles = [];
    private $moduleDir = '';

    /**
     * Migrator constructor.
     *
     * @param null $moduleDir
     * @throws \Exception
     */
    public function __construct($moduleDir = null)
    {
        if (!empty($moduleDir)) {
            $this->moduleDir = $moduleDir;
        }
        $this->loadMigrationFiles();
    }

    /**
     * @throws \Exception
     */
    private function loadMigrationFiles()
    {
        $path = realpath($this->moduleDir . DS . 'resources' . DS . 'migrations');
        if (!is_dir($path)) {
            return;
        }
        foreach (scandir($path) as $filename) {
            if (!in_array($filename, ['.', '..', 'index.php'])) {
                $this->migrationFiles[] = $path . DS . $filename;
            }
        }
    }

    /**
     * Performs creating module tables in db
     * @param array $params
     */
    public function runMigrationsUp($params = [])
    {
        $this->includeFiles();
        foreach ($this->migrationFiles as $file) {
            $migration = $this->createMigration($file);
            if ($migration === FALSE) {
                continue;
            }
            try {
                $migration->up($params);
            } catch (\Exception $e) {
                echo '<pre>';
                var_dump($e);
                die;
            }
        }
    }

    /**
     * include all files from migration dir
     */
    private function includeFiles()
    {
        foreach ($this->migrationFiles as $file) {
            require_once $file;
        }
    }

    /**
     * @param $filepath
     * @return bool|MigrationInterface
     */
    private function createMigration($filepath)
    {
        $file = new File($filepath);
        $classname = str_replace('.' . $file->getExtension(), '', $file->getFilename());

        $migration = new $classname();

        return ($migration instanceof MigrationInterface) ? $migration : FALSE;
    }

    /**
     * Performs dropping module tables in db
     */
    public function runMigrationsDown()
    {
        $this->includeFiles();
        foreach ($this->migrationFiles as $file) {
            $migration = $this->createMigration($file);
            if ($migration === FALSE) {
                continue;
            }

            try {
                $migration->down();
            } catch (\Exception $e) {

            }
        }
    }

}

