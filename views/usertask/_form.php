<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserTask */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_task_task')->textInput() ?>

    <?= $form->field($model, 'user_task_user')->textInput() ?>

    <?= $form->field($model, 'user_task_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
