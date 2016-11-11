<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/11
 * Time: 9:58
 */

use app\models\Attribute;

/* @var $this yii\web\View */
/* @var $model app\models\Attribute */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, 'validate_type')->dropDownList(Attribute::$validateTypeLabels) ?>

<?= $form->field($model, 'validate_rule')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'error_info')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'validate_time')->dropDownList(Attribute::$validateTimeLabels) ?>

<?= $form->field($model, 'auto_type')->dropDownList(Attribute::$autoTypeLabels) ?>

<?= $form->field($model, 'auto_rule')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'auto_time')->dropDownList(Attribute::$autoTimeLabels) ?>