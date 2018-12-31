<?php

namespace kosuhin\generator\yii2\generators;

use kosuhin\generator\Generator;

class Controller extends Generator
{
    public $name;

    public $model;

    public function scenario()
    {
        return <<<TEXT
<?php

namespace app\controllers;

use app\models\\{$this->model};
use app\services\\{$this->model}Service;
use kosuhin\Yii2BaseKit\Controllers\BaseCRUDController\BaseCRUDController;
use yii\\filters\\AccessControl;

class {$this->name} extends BaseCRUDController
{
    protected \$model = {$this->model}::class;

    protected \$modelService = {$this->model}Service::class;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}
TEXT;
    }
}