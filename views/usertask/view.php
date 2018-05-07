<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserTask */

$this->title = $model->user_task_task;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'user_task_task' => $model->user_task_task, 'user_task_user' => $model->user_task_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'user_task_task' => $model->user_task_task, 'user_task_user' => $model->user_task_user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_task_task',
            'user_task_user',
            'user_task_order',
        ],
    ]) ?>

</div>
