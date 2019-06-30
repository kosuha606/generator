<?php

namespace kosuha606\Generator\yii2\generators;

use kosuhin\generator\Generator;

/**
 * Class CreateView
 * @package kosuha606\Generator\yii2\generators
 */
class CreateView extends Generator
{
    /**
     * @var array
     */
    public $fields = [];

    /**
     * @return string
     */
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