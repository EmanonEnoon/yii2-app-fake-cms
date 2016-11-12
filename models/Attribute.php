<?php

namespace app\models;

use app\behaviors\FieldBehavior;
use app\behaviors\TableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%attribute}}".
 * 字段属性表
 *
 * 所有通过后台新增的属性都会记录在此数据表中
 *
 * @property string $id
 * @property string $name
 * @property string $title
 * @property string $field
 * @property string $type
 * @property string $value
 * @property string $remark
 * @property integer $is_show
 * @property string $extra
 * @property string $model_id
 * @property integer $is_must
 * @property integer $status
 * @property string $update_time
 * @property string $create_time
 * @property string $validate_rule
 * @property integer $validate_time
 * @property string $error_info
 * @property string $validate_type
 * @property string $auto_rule
 * @property integer $auto_time
 * @property string $auto_type
 *
 * @property Model $model
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * 字段类型
     */
    const TYPE_NUM = 'num';
    const TYPE_STRING = 'string';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_DATETIME = 'datetime';
    const TYPE_BOOL = 'bool';
    const TYPE_SELECT = 'select';
    const TYPE_RADIO = 'radio';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_EDITOR = 'editor';
    const TYPE_PICTURE = 'picture';
    const TYPE_FILE = 'file';
    public static $typeRules = [
        self::TYPE_NUM => 'int(10) UNSIGNED NOT NULL',
        self::TYPE_STRING => 'varchar(255) NOT NULL',
        self::TYPE_TEXTAREA => 'text NOT NULL',
        self::TYPE_DATETIME => 'int(10) NOT NULL',
        self::TYPE_BOOL => 'tinyint(2) NOT NULL',
        self::TYPE_SELECT => 'char(50) NOT NULL',
        self::TYPE_RADIO => 'char(10) NOT NULL',
        self::TYPE_CHECKBOX => 'varchar(100) NOT NULL',
        self::TYPE_EDITOR => 'text NOT NULL',
        self::TYPE_PICTURE => 'int(10) UNSIGNED NOT NULL',
        self::TYPE_FILE => 'int(10) UNSIGNED NOT NULL',
    ];
    public static $typeLabels = [
        self::TYPE_NUM => '数字',
        self::TYPE_STRING => '字符串',
        self::TYPE_TEXTAREA => '文本框',
        self::TYPE_DATETIME => '时间',
        self::TYPE_BOOL => '布尔',
        self::TYPE_SELECT => '枚举',
        self::TYPE_RADIO => '单选',
        self::TYPE_CHECKBOX => '多选',
        self::TYPE_EDITOR => '编辑器',
        self::TYPE_PICTURE => '上传图片',
        self::TYPE_FILE => '上传附件',
    ];

    /**
     * 是否在表单显示
     */
    const IS_SHOW_OP_BOTH = 1;
    const IS_SHOW_OP_INSERT = 2;
    const IS_SHOW_OP_UPDATE = 3;
    const IS_SHOW_OP_NONE = 0;
    public static $isShowLabels = [
        self::IS_SHOW_OP_BOTH => '始终显示',
        self::IS_SHOW_OP_INSERT => '新增显示',
        self::IS_SHOW_OP_UPDATE => '编辑显示',
        self::IS_SHOW_OP_NONE => '不显示',
    ];

    /**
     * 是否必填项
     */
    const IS_MUST_N = 0;
    const IS_MUST_Y = 1;
    public static $isMustLabels = [
        self::IS_MUST_N => '否',
        self::IS_MUST_Y => '是',
    ];

    /**
     *
     */
    const STATUS_ACTIVE = 1;
    public static $statusLabels = [
        self::STATUS_ACTIVE => '可用',
    ];

    /**
     * 验证类型
     */
    const VALIDATE_TYPE_REGEX = 'regex';
    const VALIDATE_TYPE_FUNCTION = 'function';
    const VALIDATE_TYPE_UNIQUE = 'unique';
    const VALIDATE_TYPE_LENGTH = 'length';
    const VALIDATE_TYPE_IN = 'in';
    const VALIDATE_TYPE_NOT_IN = 'not_in';
    const VALIDATE_TYPE_BETWEEN = 'between';
    public static $validateTypeLabels = [
        self::VALIDATE_TYPE_REGEX => '正则验证',
        self::VALIDATE_TYPE_FUNCTION => '函数验证',
        self::VALIDATE_TYPE_UNIQUE => '唯一验证',
        self::VALIDATE_TYPE_LENGTH => '长度验证',
        self::VALIDATE_TYPE_IN => '验证在范围内',
        self::VALIDATE_TYPE_NOT_IN => '验证不在范围内',
        self::VALIDATE_TYPE_BETWEEN => '区间验证',
    ];

    /**
     * 验证时间
     */
    const VALIDATE_TIME_OP_ALL = 4;
    const VALIDATE_TIME_OP_INSERT = 2;
    const VALIDATE_TIME_OP_UPDATE = 1;
    public static $validateTimeLabels = [
        self::VALIDATE_TIME_OP_ALL => '始终',
        self::VALIDATE_TIME_OP_INSERT => '新增',
        self::VALIDATE_TIME_OP_UPDATE => '编辑',
    ];

    /**
     * 自动完成类型
     */
    const auto_type_function = 'function';
    const auto_type_field = 'field';
    const auto_type_string = 'string';
    public static $autoTypeLabels = [
        self::auto_type_function => '函数',
        self::auto_type_field => '字段',
        self::auto_type_string => '字符串',
    ];

    /**
     * 自动完成时间
     */
    const AUTO_TIME_OP_ALL = 3;
    const AUTO_TIME_OP_INSERT = 2;
    const AUTO_TIME_OP_UPDATE = 1;
    public static $autoTimeLabels = [
        self::AUTO_TIME_OP_ALL => '始终',
        self::AUTO_TIME_OP_INSERT => '新增',
        self::AUTO_TIME_OP_UPDATE => '编辑',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
            ],
            TableBehavior::className(),
            FieldBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            [['is_show', 'model_id', 'is_must', 'status', 'validate_time', 'auto_time'], 'integer'],
            [['validate_rule', 'error_info', 'auto_rule'], 'default', 'value' => ''],
            [['validate_time', 'validate_type', 'auto_time', 'auto_type'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['title', 'field', 'value', 'remark', 'error_info', 'auto_rule'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20],
            [['extra', 'validate_rule'], 'string', 'max' => 255],
            [['validate_type', 'auto_type'], 'string', 'max' => 25],
            [['name'], 'filter', 'filter' => 'strtolower'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '字段名'),
            'title' => Yii::t('app', '字段注释'),
            'field' => Yii::t('app', '字段定义'),
            'type' => Yii::t('app', '数据类型'),
            'value' => Yii::t('app', '字段默认值'),
            'remark' => Yii::t('app', '备注'),
            'is_show' => Yii::t('app', '是否显示'),
            'extra' => Yii::t('app', '参数'),
            'model_id' => Yii::t('app', '模型id'),
            'is_must' => Yii::t('app', '是否必填'),
            'status' => Yii::t('app', '状态'),
            'update_time' => Yii::t('app', '更新时间'),
            'create_time' => Yii::t('app', '创建时间'),
            'validate_rule' => Yii::t('app', '验证规则'),
            'validate_time' => Yii::t('app', '验证时间'),
            'error_info' => Yii::t('app', '出错提示'),
            'validate_type' => Yii::t('app', '验证方式'),
            'auto_rule' => Yii::t('app', '自动完成规则'),
            'auto_time' => Yii::t('app', '自动完成时间'),
            'auto_type' => Yii::t('app', '自动完成方式'),
        ];
    }

    public function attributeHints()
    {
        return [
            'name' => Yii::t('cms', '请输入字段名 英文字母开头，长度不超过30'),
            'title' => Yii::t('cms', '请输入字段标题，用于表单显示'),
            'type' => Yii::t('cms', '用于表单中的展示方式'),
            'field' => Yii::t('cms', '字段属性的sql表示'),
            'extra' => Yii::t('cms', '布尔、枚举、多选字段类型的定义数据'),
            'value' => Yii::t('cms', '字段的默认值'),
            'remark' => Yii::t('cms', '用于表单中的提示'),
            'is_show' => Yii::t('cms', '是否显示在表单中'),
            'is_must' => Yii::t('cms', '用于自动验证'),
            'validate_rule' => Yii::t('cms', '根据验证方式定义相关验证规则'),
            'auto_rule' => Yii::t('cms', '根据完成方式订阅相关规则'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id']);
    }
}
