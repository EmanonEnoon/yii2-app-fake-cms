<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/11
 * Time: 9:58
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attribute;

/* @var $this yii\web\View */
/* @var $model app\models\Attribute */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'type')->dropDownList(Attribute::$typeLabels, ['rules' => Attribute::$typeRules]) ?>

<?= $form->field($model, 'field')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'extra')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_show')->dropDownList(Attribute::$isShowLabels) ?>

<?= $form->field($model, 'is_must')->dropDownList(Attribute::$isMustLabels) ?>

