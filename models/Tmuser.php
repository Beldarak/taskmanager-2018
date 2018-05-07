<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tmuser".
 *
 * @property int $user_id
 * @property string $user_name
 * @property string $user_first_name
 * @property string $user_login
 * @property string $user_password
 * @property int $user_role
 * @property int $user_type
 *
 * @property Task[] $tasks
 * @property UserTask[] $userTasks
 * @property Task[] $userTaskTasks
 */
class Tmuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'user_first_name', 'user_login', 'user_password'], 'required'],
            [['user_role', 'user_type'], 'integer'],
            [['user_name', 'user_first_name', 'user_login', 'user_password'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'user_name' => Yii::t('app', 'User Name'),
            'user_first_name' => Yii::t('app', 'User First Name'),
            'user_login' => Yii::t('app', 'User Login'),
            'user_password' => Yii::t('app', 'User Password'),
            'user_role' => Yii::t('app', 'User Role'),
            'user_type' => Yii::t('app', 'User Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['task_creator' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTasks()
    {
        return $this->hasMany(UserTask::className(), ['user_task_user' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTaskTasks()
    {
        return $this->hasMany(Task::className(), ['task_id' => 'user_task_task'])->viaTable('user_task', ['user_task_user' => 'user_id']);
    }
}
