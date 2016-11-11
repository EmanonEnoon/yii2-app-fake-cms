<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/11
 * Time: 20:39
 */

namespace app\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;

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
            ActiveRecord::EVENT_AFTER_INSERT => 'addField',
            ActiveRecord::EVENT_AFTER_UPDATE => 'updateField',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteField',
        ];
    }

    /**
     * 增加数据模型对应的数据表字段
     */
    protected function addField()
    {

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