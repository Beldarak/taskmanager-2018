<?php

namespace app\controllers;

use Yii;
use app\models\UserTask;
use app\models\UserTaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserTaskController implements the CRUD actions for UserTask model.
 */
class UserTaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserTask models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserTaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserTask model.
     * @param integer $user_task_task
     * @param integer $user_task_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_task_task, $user_task_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_task_task, $user_task_user),
        ]);
    }

    /**
     * Creates a new UserTask model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserTask();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_task_task' => $model->user_task_task, 'user_task_user' => $model->user_task_user]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserTask model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_task_task
     * @param integer $user_task_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_task_task, $user_task_user)
    {
        $model = $this->findModel($user_task_task, $user_task_user);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_task_task' => $model->user_task_task, 'user_task_user' => $model->user_task_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserTask model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_task_task
     * @param integer $user_task_user
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_task_task, $user_task_user)
    {
        $this->findModel($user_task_task, $user_task_user)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserTask model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_task_task
     * @param integer $user_task_user
     * @return UserTask the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_task_task, $user_task_user)
    {
        if (($model = UserTask::findOne(['user_task_task' => $user_task_task, 'user_task_user' => $user_task_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
