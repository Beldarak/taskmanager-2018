<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TmuserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmuser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_name') ?>

    <?= $form->field($model, 'user_first_name') ?>

    <?= $form->field($model, 'user_login') ?>

    <?= $form->field($model, 'user_password') ?>

    <?php // echo $form->field($model, 'user_role') ?>

    <?php // echo $form->field($model, 'user_type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
