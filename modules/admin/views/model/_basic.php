<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/11/10
 * Time: 17:55
 */

use app\models\Model;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'extend')->dropDownList(Model::$modelLabels) ?>
