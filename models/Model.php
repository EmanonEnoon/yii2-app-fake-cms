<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%attribute}}".
 * 数据模型表
 *
 * document 为 基础文档模型，article 和 download 继承 基础文档模型
 * document 与 article 的关系为一对一
 * document 与 download 的关系也为一对一
 *
 * 基础文档模型包含了常见的字段，如：
 * 标题、分类、封面、可见性、浏览量、评论、状态等
 *
 * 若需要新建的模型会用到这些字段，可以在`新增模型`时选择`模型类型`为`文档模型`
 * 反之，则选择`独立模型`
 *
 * 由于在数据库创建数据表需要至少一个字段，所以在成功新建模型后，并不会在数据库创建数据表
 * 实际的数据表创建过程在新增 @see Attribute 时才会创建数据表
 *
 *
 * @property string $id
 * @property string $name
 * @property string $title
 * @property string $extend
 * @property string $relation
 * @property integer $need_pk
 * @property string $field_sort
 * @property string $field_group
 * @property string $attribute_list
 * @property string $template_list
 * @property string $template_add
 * @property string $template_edit
 * @property string $list_grid
 * @property integer $list_row
 * @property string $search_key
 * @property string $search_list
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property string $engine_type
 */
class Model extends \yii\db\ActiveRecord
{
    const EXTEND_DOCUMENT_PREFIX = 'document_';

    const MODEL_INDEPENDENCE = 0;
    const MODEL_DOCUMENT = 1;
    public static $modelLabels = [
        self::MODEL_INDEPENDENCE => '独立模型',
        self::MODEL_DOCUMENT => '文档模型',
    ];

    const ENGINE_TYPE_MYISAM = 'MyISAM';
    const ENGINE_TYPE_INNODB = 'InnoDB';
    const ENGINE_TYPE_MEMORY = 'MEMORY';
    const ENGINE_TYPE_BLACKHOLE = 'BLACKHOLE';
    const ENGINE_TYPE_MRG_MYISAM = 'MRG_MYISAM';
    const ENGINE_TYPE_ARCHIVE = 'ARCHIVE';
    public static $engineTypeLabels = [
        self::ENGINE_TYPE_MYISAM => 'MyISAM',
        self::ENGINE_TYPE_INNODB => 'InnoDB',
        self::ENGINE_TYPE_MEMORY => 'MEMORY',
        self::ENGINE_TYPE_BLACKHOLE => 'BLACKHOLE',
        self::ENGINE_TYPE_MRG_MYISAM => 'MRG_MYISAM',
        self::ENGINE_TYPE_ARCHIVE => 'ARCHIVE',
    ];

    const NEED_PK_N = 0;
    const NEED_PK_Y = 1;
    public static $needPkLabels = [
        self::NEED_PK_N => '是',
        self::NEED_PK_Y => '否',
    ];

    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;
    public static $statusLabels = [
        self::STATUS_DISABLED => '禁用',
        self::STATUS_ACTIVE => '正常',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%model}}';
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'extend', 'engine_type', 'need_pk'], 'required'],
            [['extend', 'need_pk', 'list_row', 'status'], 'integer'],
            [['field_sort', 'attribute_list', 'list_grid'], 'default', 'value' => ''],
            [['field_sort', 'attribute_list', 'list_grid'], 'required', 'skipOnEmpty' => true],
            [['field_sort', 'attribute_list', 'list_grid'], 'string'],
            [['name', 'title', 'relation'], 'string', 'max' => 30],
            [['field_group', 'search_list'], 'string', 'max' => 255],
            [['template_list', 'template_add', 'template_edit'], 'string', 'max' => 100],
            [['search_key'], 'string', 'max' => 50],
            [['engine_type'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '模型ID'),
            'name' => Yii::t('app', '模型标识'),
            'title' => Yii::t('app', '模型名称'),
            'extend' => Yii::t('app', '继承的模型'),
            'relation' => Yii::t('app', '继承与被继承模型的关联字段'),
            'need_pk' => Yii::t('app', '新建表时是否需要主键字段'),
            'field_sort' => Yii::t('app', '表单字段排序'),
            'field_group' => Yii::t('app', '表单显示分组'),
            'attribute_list' => Yii::t('app', '属性列表（表的字段）'),
            'template_list' => Yii::t('app', '列表模板'),
            'template_add' => Yii::t('app', '新增模板'),
            'template_edit' => Yii::t('app', '编辑模板'),
            'list_grid' => Yii::t('app', '列表定义'),
            'list_row' => Yii::t('app', '列表数据长度'),
            'search_key' => Yii::t('app', '默认搜索字段'),
            'search_list' => Yii::t('app', '高级搜索的字段'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '更新时间'),
            'status' => Yii::t('app', '状态'),
            'engine_type' => Yii::t('app', '数据库引擎'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'template_list' => '自定义的列表模板，放在 modules\admin\views 下，不写则使用默认模板',
            'template_add' => '自定义的列表模板，放在 modules\admin\views 下，不写则使用默认模板',
            'template_edit' => '自定义的列表模板，放在 modules\admin\views 下，不写则使用默认模板',
            'list_row' => '默认列表模板的分页属性',
            'field_group' => '用于表单显示的分组，以及设置该模型表单排序的显示',
            'list_grid' => '默认列表模板的展示规则',
            'search_key' => '默认列表模板的默认搜索项',
            'search_list' => '默认列表模板的高级搜索项',
            'name' => '请输入文档模型标识',
            'title' => '请输入模型的名称',
            'extend' => '目前支持独立模型和文档模型',
        ];
    }
}
