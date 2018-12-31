<?php

namespace kosuhin\generator\yii2\generators;

use kosuhin\generator\Generator;

class Service extends Generator
{
    public $base;

    public function scenario()
    {
        return <<<TEXT
<?php

namespace app\services;

use app\models\\{$this->base};
use kosuhin\Yii2BaseKit\Services\Base\BaseModelService;
use yii\db\Query;

class {$this->base}Service extends BaseModelService
{
    protected \$modelClass = {$this->base}::class;

    public function filter(Query \$query, \$filterField, \$filterValue)
    {
        switch (\$filterField) {
            default:
                break;
        }
    }
}
TEXT;

    }
}