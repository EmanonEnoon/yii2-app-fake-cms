<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Model;


/* @var $this yii\web\View */
/* @var $model app\models\Model */

$this->title = Yii::t('cms', 'Create {modelClass}', [
        'modelClass' => 'Model',
    ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="model-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->hint('请输入文档模型标识') ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true])->hint('请输入模型的名称') ?>

        <?= $form->field($model, 'extend')->dropDownList(Model::$modelLabels)->hint('目前支持独立模型和文档模型') ?>

        <?= $form->field($model, 'need_pk')->dropDownList(Model::$needPkLabels)->hint('选“是”则会新建默认的id字段作为主键') ?>

        <?= $form->field($model, 'engine_type')->dropDownList(Model::$engineTypeLabels) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
