<?php

namespace kosuhin\generator\yii2\commands;

use kosuhin\generator\Generator;
use yii\console\Controller;

class GeneratorController extends Controller
{
    public function actionTask($scenarioFile)
    {
        $basePath = \Yii::$app->basePath;
//        echo $basePath;
        $config = require_once $basePath .'/'.$scenarioFile;
        foreach ($config as $taskNumber => $item) {
            /** @var Generator $class */
            $class = $item['class'];
            unset($item['class']);
            $class::run($item);
            $this->stdout("#{$taskNumber} was finished");
        }
    }
}