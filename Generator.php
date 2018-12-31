<?php

namespace kosuhin\generator;

use yii\db\Exception;

abstract class Generator
{
    protected $basePath;

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
        file_put_contents($this->basePath.$fileName, $content);
    }
}