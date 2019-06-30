<?php

namespace kosuha606\Generator\yii2\commands;

use kosuhin\generator\Generator;
use yii\console\Controller;

/**
 * Class GeneratorController
 * @package kosuhin\generator\yii2\commands
 */
class GeneratorController extends Controller
{
    /**
     * @param $scenarioFile
     */
    public function actionTask($scenarioFile)
    {
        $basePath = \Yii::$app->basePath;
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