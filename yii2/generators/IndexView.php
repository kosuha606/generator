<?php

namespace kosuhin\generator\yii2\generators;

use kosuhin\generator\Generator;

class IndexView extends Generator
{
    public $base;

    public $fields = [];

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