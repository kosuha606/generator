<?php

namespace kosuhin\generator\yii2\generators;

use kosuhin\generator\Generator;

class CreateView extends Generator
{
    public $fields = [];

    public function scenario()
    {
        $fieldLabels = '';
        foreach ($this->fields as $field) {
            $fieldLabels .= "<?= \$form->field(\$model, '$field') ?>\n";
        }

        return <<<TEXT
<?php

use yii\\widgets\\ActiveForm;
use yii\\helpers\\Html;

/** @var \$model */

?>

<?php \$form = ActiveForm::begin([]) ?>
{$fieldLabels}
<?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end();
TEXT;

    }
}