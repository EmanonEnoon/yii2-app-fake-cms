<?php

use yii\helpers\Html;

$title = function ($model) {
    return $model->model->title . ' - ' . Yii::t('cms', 'Create {modelClass}', [
        'modelClass' => Yii::t('cms', 'Attribute'),
    ]);
};

/* @var $this yii\web\View */
/* @var $model app\models\Attribute */

$this->title = $title($model);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Attributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="attribute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
