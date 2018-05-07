<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_creator')->textInput() ?>

    <?= $form->field($model, 'task_parent')->textInput() ?>

    <?= $form->field($model, 'task_limit')->textInput() ?>

    <?= $form->field($model, 'task_status')->textInput() ?>

    <?= $form->field($model, 'task_emergency')->textInput() ?>

    <?= $form->field($model, 'task_end')->textInput() ?>

    <?= $form->field($model, 'task_priority')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
