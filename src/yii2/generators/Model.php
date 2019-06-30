<?php

namespace kosuha606\Generator\yii2\generators;

use kosuhin\generator\Generator;

/**
 * Class Model
 * @package kosuha606\Generator\yii2\generators
 */
class Model extends Generator
{
    /**
     * @var
     */
    public $table;

    /**
     * @var
     */
    public $name;

    /**
     * @var array
     */
    public $fields = [];

    /**
     * @return string
     */
    public function scenario()
    {
        $fieldsStr = '';
        $fieldLabels = '';
        foreach ($this->fields as $field) {
            $fieldsStr .= "'{$field}',";
            $fieldLabels .= "'$field' => '$field',\n";
        }
        $fieldsStr = rtrim($fieldsStr, ',');
        $k = 1;
        return <<<TEXT
<?php

namespace app\models;

use kosuhin\Yii2BaseKit\Models\ActiveRecord\ActiveRecord;
use Yii;

class {$this->name} extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{$this->table}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[{$fieldsStr}], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            {$fieldLabels}
        ];
    }

    public static function name()
    {
        return self::class;
    }
}
TEXT;

    }
}