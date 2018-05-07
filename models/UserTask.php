<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_task".
 *
 * @property int $user_task_task
 * @property int $user_task_user
 * @property int $user_task_order
 *
 * @property User $userTaskUser
 * @property Task $userTaskTask
 */
class UserTask extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_task_task', 'user_task_user', 'user_task_order'], 'required'],
            [['user_task_task', 'user_task_user', 'user_task_order'], 'integer'],
            [['user_task_task', 'user_task_user'], 'unique', 'targetAttribute' => ['user_task_task', 'user_task_user']],
            [['user_task_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_task_user' => 'user_id']],
            [['user_task_task'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['user_task_task' => 'task_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_task_task' => Yii::t('app', 'User Task Task'),
            'user_task_user' => Yii::t('app', 'User Task User'),
            'user_task_order' => Yii::t('app', 'User Task Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTaskUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_task_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTaskTask()
    {
        return $this->hasOne(Task::className(), ['task_id' => 'user_task_task']);
    }
}
