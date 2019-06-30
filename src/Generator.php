<?php

namespace kosuha606\Generator;

use yii\db\Exception;

/**
 * Class Generator
 * @package kosuha606\Generator
 */
abstract class Generator
{
    /** @var string */
    protected $basePath;

    /**
     * Generator constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * @throws Exception
     */
    public function init()
    {
        $this->ensureBasePath();
    }

    /**
     * @throws Exception
     */
    public function ensureBasePath()
    {
        if (empty($this->basePath) || !is_dir($this->basePath)) {
            throw new Exception('Base path not set to generator');
        }
    }

    /**
     * @return string
     */
    public function scenario()
    {
        return '';
    }

    /**
     * @param array $params
     * @return string
     */
    public static function run($params = [])
    {
        $self = new static();
        foreach ($params as $key => $value) {
            if (property_exists(get_class($self), $key)) {
                $self->$key = $value;
            }
        }
        return $self->scenario();
    }

    /**
     * @param $fileName
     * @param $content
     */
    public function createFile($fileName, $content)
    {
        try {
            file_put_contents($this->basePath.$fileName, $content);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * @param $path
     * @param int $mode
     */
    public function createDirectory($path, $mode = 0777)
    {
        try {
            mkdir($path, $mode, true);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}