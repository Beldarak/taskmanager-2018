<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserTask */

$this->title = Yii::t('app', 'Create User Task');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
