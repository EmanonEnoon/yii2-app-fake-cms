<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Model;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

$this->title = Yii::t('cms', 'Update {modelClass}: ', [
        'modelClass' => Yii::t('cms', 'Model'),
    ]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
?>
<div class="model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="model-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= TabsX::widget([
            'items' => [
                [
                    'label' => Yii::t('cms', 'Basic'),
                    'content' => $this->render('_basic', [
                        'model' => $model,
                        'form' => $form
                    ]),
                    'active' => true
                ],
                [
                    'label' => Yii::t('cms', 'Design'),
                    'content' => $this->render('_design', [
                        'model' => $model,
                        'form' => $form
                    ]),
                ],
                [
                    'label' => Yii::t('cms', 'Advance'),
                    'content' => $this->render('_advance', [
                        'model' => $model,
                        'form' => $form
                    ]),
                ],
            ],
            'position' => TabsX::POS_ABOVE,
            'encodeLabels' => false
        ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
