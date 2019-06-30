<?php

namespace kosuha606\Generator\yii2\generators;

use kosuhin\generator\Generator;

/**
 * Class Controller
 * @package kosuha606\Generator\yii2\generators
 */
class Controller extends Generator
{
    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $model;

    /**
     * @return string
     */
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