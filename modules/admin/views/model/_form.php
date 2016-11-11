<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Model;

/* @var $this yii\web\View */
/* @var $model app\models\Model */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->hint('请输入文档模型标识') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->hint('请输入模型的名称') ?>

    <?= $form->field($model, 'extend')->dropDownList(Model::$modelLabels)->hint('目前支持独立模型和文档模型') ?>

    <?= $form->field($model, 'relation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'need_pk')->textInput()->hint('选“是”则会新建默认的id字段作为主键') ?>

    <?= $form->field($model, 'field_sort')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'field_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attribute_list')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'template_list')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template_add')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template_edit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'list_grid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'list_row')->textInput() ?>

    <?= $form->field($model, 'search_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'search_list')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'update_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'engine_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
