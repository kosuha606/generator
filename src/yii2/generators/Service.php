<?php

namespace kosuha606\Generator\yii2\generators;

use kosuhin\generator\Generator;

/**
 * Class Service
 * @package kosuha606\Generator\yii2\generators
 */
class Service extends Generator
{
    /**
     * @var
     */
    public $base;

    /**
     * @return string
     */
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