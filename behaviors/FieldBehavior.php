<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/11
 * Time: 20:39
 */

namespace app\behaviors;


use app\models\Attribute;
use app\models\Model;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * Class FieldBehavior
 * 字段行为
 *
 * Insert 后，新建对应数据模型的数据表
 * Update 后，更新对应数据模型的数据表字段
 * Delete 后，删除对应数据模型的数据表字段
 *
 *
 * @package app\behaviors
 */
class FieldBehavior extends Behavior
{
    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'addField',
            ActiveRecord::EVENT_AFTER_UPDATE => 'updateField',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteField',
        ];
    }

    protected function getTableName()
    {
        /** @var Attribute $owner */
        $owner = $this->owner;
        return Yii::$app->db->tablePrefix . Model::EXTEND_DOCUMENT_PREFIX . $owner->model->name;
    }

    /**
     * 增加数据模型对应的数据表字段
     * TODO: 已经可以增加表字段，待完成根据表单增加准确字段
     */
    public function addField()
    {
        /** @var Attribute $owner */
        $owner = $this->owner;
        $str = Yii::$app->db->queryBuilder->addColumn($this->getTableName(), $owner->name, 'string');

        Yii::$app->db->createCommand($str)->execute();
    }

    /**
     * 更新数据模型对应的数据表字段
     */
    protected function updateField()
    {

    }

    /**
     * 删除数据模型对应的数据表字段
     */
    protected function deleteField()
    {

    }
}