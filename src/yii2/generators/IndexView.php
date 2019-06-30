<?php

namespace kosuha606\Generator\yii2\generators;

use kosuhin\generator\Generator;

/**
 * Class IndexView
 * @package kosuha606\Generator\yii2\generators
 */
class IndexView extends Generator
{
    /**
     * @var
     */
    public $base;

    /**
     * @var array
     */
    public $fields = [];

    /**
     * @return string
     */
    public function scenario()
    {
        $baseLower = strtolower($this->base);
        $fieldLabels = '';
        foreach ($this->fields as $field) {
            $fieldLabels .= "'$field',\n";
        }
        return <<<TEXT
<?php

use yii\\grid\\GridView;
use yii\\helpers\\Html;

?>

<?= \yii\helpers\Html::a('Создать', ['{$baseLower}/create'], ['class' => 'btn btn-primary']); ?>
<p>&nbsp;</p>
<?= GridView::widget([
    'dataProvider' => \$provider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        {$fieldLabels}
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
TEXT;

    }
}