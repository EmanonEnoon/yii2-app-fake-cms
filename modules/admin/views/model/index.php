<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Model;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cms', 'Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('cms', 'Create Model'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'title',
            //'extend',
            //'relation',
            // 'need_pk',
            // 'field_sort:ntext',
            // 'field_group',
            // 'attribute_list:ntext',
            // 'template_list',
            // 'template_add',
            // 'template_edit',
            // 'list_grid:ntext',
            // 'list_row',
            // 'search_key',
            // 'search_list',
            'create_time:datetime',
            // 'update_time',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Model::$statusLabels[$model->status];
                },
            ],
            // 'engine_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
