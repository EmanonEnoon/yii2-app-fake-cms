<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/10
 * Time: 17:56
 */

use app\models\Model;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

?>

<?= $form->field($model, 'template_list')->textInput(['maxlength' => true])->hint('') ?>

<?= $form->field($model, 'template_add')->textInput(['maxlength' => true])->hint('') ?>

<?= $form->field($model, 'template_edit')->textInput(['maxlength' => true])->hint('') ?>

<?= $form->field($model, 'list_row')->textInput(['maxlength' => true])->hint('') ?>

