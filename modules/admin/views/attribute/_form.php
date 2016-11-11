<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Attribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attribute-form">

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
