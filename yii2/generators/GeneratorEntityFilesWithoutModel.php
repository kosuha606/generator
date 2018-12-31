<?php

namespace kosuhin\generator\yii2\generators;

use kosuhin\generator\Generator;

class GeneratorEntityFilesWithoutModel extends Generator
{
    public $base = '';

    public $fields = [];

    public function scenario()
    {
        $controllerTemplate = Controller::run([
            'name' => $this->base . 'Controller',
            'model' => $this->base,
        ]);
        $serviceTemplate = Service::run([
            'base' => $this->base,
        ]);
        $createTemplate = CreateView::run([
            'fields' => $this->fields,
        ]);
        $indexTemplate = IndexView::run([
            'fields' => $this->fields,
            'base' => $this->base,
        ]);

        $lowerBase = strtolower($this->base);
        $this->createFile('services/'.$this->base.'Service.php', $serviceTemplate);
        $this->createFile('controllers/'.$this->base.'Controller.php', $controllerTemplate);
        $this->createFile('views/'.$lowerBase.'/index.php', $indexTemplate);
        $this->createFile('views/'.$lowerBase.'/create.php', $createTemplate);
    }
}