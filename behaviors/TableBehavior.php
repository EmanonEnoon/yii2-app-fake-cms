<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/11
 * Time: 20:55
 */

namespace app\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class TableBehavior
 * 数据表行为
 *
 * Attribute 表发生 Insert 动作时
 * 建立数据模型是否存在对应的数据表
 *
 * @package app\behaviors
 */
class TableBehavior extends Behavior
{
    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'createTable',
        ];
    }

    /**
     * 创建数据模型对应的数据表
     * 若已存在或者成功创建，返回 true
     * @return bool
     */
    protected function createTable()
    {

    }
}