<?php

namespace kosuhin\generator;

use yii\db\Exception;

abstract class Generator
{
    protected $basePath;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->ensureBasePath();
    }

    public function ensureBasePath()
    {
        if (empty($this->basePath) || !is_dir($this->basePath)) {
            throw new Exception('Base path not set to generator');
        }
    }

    public function scenario()
    {
        return '';
    }

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

    public function createFile($fileName, $content)
    {
        try {
            file_put_contents($this->basePath.$fileName, $content);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function createDirectory($path, $mode = 0777)
    {
        try {
            mkdir($path, $mode, true);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

    }
}