<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'task_id') ?>

    <?= $form->field($model, 'task_name') ?>

    <?= $form->field($model, 'task_description') ?>

    <?= $form->field($model, 'task_creator') ?>

    <?= $form->field($model, 'task_parent') ?>

    <?php // echo $form->field($model, 'task_limit') ?>

    <?php // echo $form->field($model, 'task_status') ?>

    <?php // echo $form->field($model, 'task_emergency') ?>

    <?php // echo $form->field($model, 'task_end') ?>

    <?php // echo $form->field($model, 'task_priority') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
