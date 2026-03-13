<?php

namespace MetricsCube\Utils;

use const DS;
use const METRICSCUBE;

/**
 * Class Logs
 * @package MetricsCube\Utils
 */
class Logs
{
    /** @var string $path */
    private $path = METRICSCUBE . DS . 'logs' . DS;
    /** @var string $fileName */
    private $fileName = 'mclog.log.php';
    /** @var string $filePath */
    private $filePath;
    /** @var int $filePermissions */
    private $filePermissions = 0600;
    /** @var int $maxFileSize */
    private $maxFileSize = 1048576;
    /** @var string $maxFilesLimit */
    private $maxFilesLimit = 5;
    /** @var string $date */
    private $date;
    /** @var string $method */
    private $method = 'UNDEFINED';
    /** @var bool $isReady */
    private $isReady = FALSE;

    /**
     * Logs constructor.
     * @param null $method
     */
    public function __construct($method = null)
    {
        $this->date = date('Y-m-d H:i:s');
        $this->filePath = $this->path . $this->fileName;
        if (!is_null($method)) {
            $this->method = strtoupper($method);
        }
        if (!file_exists($this->path) || !is_writable($this->path)) {
            return;
        }
        if (!file_exists($this->filePath)) {
            if ($this->createFile() === FALSE) {
                return;
            }
        }
        if (!is_writable($this->filePath)) {
            return;
        }
        if (filesize($this->filePath) > $this->maxFileSize) {
            $ignoreFiles = [
                '.', '..', '.htaccess', 'index.php'
            ];
            $files = [];
            foreach (scandir($this->path) as $file) {
                if (!in_array($file, $ignoreFiles)) {
                    $files[] = str_replace($this->fileName, '', $file);
                }
            }
            sort($files, SORT_NUMERIC);
            $modifications = [];
            foreach ($files as $index => $file) {
                if ($index < $this->maxFilesLimit - 1) {
                    $modifications[$this->fileName . $file] = $this->fileName . (($file == '') ? 2 : $file + 1);
                } else {
                    $modifications[$this->fileName . $file] = 'delete';
                }
            }
            foreach (array_reverse($modifications) as $file => $action) {
                if ($action == 'delete') {
                    @unlink($this->path . $file);
                } else {
                    @rename($this->path . $file, $this->path . $action);
                }
            }
            if ($this->createFile() === FALSE) {
                return;
            }
        }
        $this->isReady = TRUE;
    }

    /**
     * @return bool
     */
    private function isReady()
    {
        return $this->isReady;
    }

    /**
     * @return false
     */
    private function createFile()
    {
        $result = @file_put_contents($this->filePath, "<?php die(); ?>\r\n" . $this->prepareDescription('internal', 'A new log file has been created.'), FILE_APPEND);
        if ($result === FALSE) {
            return FALSE;
        }
        chmod($this->filePath, $this->filePermissions);
    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        if ($this->isReady()) {
            $this->saveToFile($this->prepareDescription($name, $arguments[0]));
        }
    }

    /**
     * @param $type
     * @param $text
     * @return string
     */
    private function prepareDescription($type, $text)
    {
        return sprintf("%s %s\t (%s) %s\r\n", $this->date, strtoupper($type), $this->method, $text);
    }

    /**
     * @param $text
     */
    private function saveToFile($text)
    {
        @file_put_contents($this->filePath, $text, FILE_APPEND);
    }

}


