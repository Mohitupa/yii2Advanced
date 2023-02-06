<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'password') ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>