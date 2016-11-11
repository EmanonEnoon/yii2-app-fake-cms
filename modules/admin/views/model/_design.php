<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/10
 * Time: 17:55
 */

use app\models\Model;
use kartik\sortable\Sortable;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

?>

<div class="form-group field-model-field_sort">
    <label class="control-label" for="model-field_sort">字段排序</label>
    <div>
        <?= Html::a(Yii::t('cms', 'Create'), ['/admin/attribute/create', 'model_id' => $model->id], ['target' => '_blank']) ?>
        <?= Html::a(Yii::t('cms', 'Management'), ['/admin/attribute/index', 'model_id' => $model->id], ['target' => '_blank']) ?>
    </div>
    <?= Sortable::widget([
        'showHandle' => true,
        'items' => [
            ['content' => 'Item 1'],
            ['content' => 'Item 2'],
            ['content' => 'Item 3'],
            ['content' => 'Item 4'],
        ],
        'pluginEvents' => [
            'sortupdate' => 'function(e,a) { 
                                 console.log(e); 
                                 console.log(a); 
                            }',
        ]
    ]) ?>
    <div class="hint-block">只有新增了字段，该表才会真正建立</div>
    <div class="help-block"></div>
</div>

<?= $form->field($model, 'field_group')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'list_grid')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'search_key')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'search_list')->textInput(['maxlength' => true]) ?>
