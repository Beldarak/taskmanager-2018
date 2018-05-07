<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserTask */

$this->title = Yii::t('app', 'Update User Task: ' . $model->user_task_task, [
    'nameAttribute' => '' . $model->user_task_task,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_task_task, 'url' => ['view', 'user_task_task' => $model->user_task_task, 'user_task_user' => $model->user_task_user]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
