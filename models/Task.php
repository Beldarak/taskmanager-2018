<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $task_id
 * @property string $task_name
 * @property string $task_description
 * @property int $task_creator
 * @property int $task_parent
 * @property string $task_limit
 * @property int $task_status
 * @property int $task_emergency
 * @property string $task_end
 * @property int $task_priority
 *
 * @property User $taskCreator
 * @property Task $taskParent
 * @property Task[] $tasks
 * @property UserTask[] $userTasks
 * @property User[] $userTaskUsers
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_name', 'task_description', 'task_creator', 'task_priority'], 'required'],
            [['task_creator', 'task_parent', 'task_status', 'task_emergency', 'task_priority'], 'integer'],
            [['task_limit', 'task_end'], 'safe'],
            [['task_name', 'task_description'], 'string', 'max' => 255],
            [['task_creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['task_creator' => 'user_id']],
            [['task_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_parent' => 'task_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => Yii::t('app', 'Task ID'),
            'task_name' => Yii::t('app', 'Task Name'),
            'task_description' => Yii::t('app', 'Task Description'),
            'task_creator' => Yii::t('app', 'Task Creator'),
            'task_parent' => Yii::t('app', 'Task Parent'),
            'task_limit' => Yii::t('app', 'Task Limit'),
            'task_status' => Yii::t('app', 'Task Status'),
            'task_emergency' => Yii::t('app', 'Task Emergency'),
            'task_end' => Yii::t('app', 'Task End'),
            'task_priority' => Yii::t('app', 'Task Priority')
			//'order_id' => Yii::t('app', 'Order ID')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskCreator()
    {
        return $this->hasOne(User::className(), ['user_id' => 'task_creator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskParent()
    {
        return $this->hasOne(Task::className(), ['task_id' => 'task_parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['task_parent' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTasks()
    {
        return $this->hasMany(UserTask::className(), ['user_task_task' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTaskUsers()
    {
        return $this->hasMany(User::className(), ['user_id' => 'user_task_user'])->viaTable('user_task', ['user_task_task' => 'task_id']);
    }
	
	// A CHECK
	public function getUserTaskOrderId()
	{
		return $this->hasOne(UserTask::className(), ['user_id' => 'user_task_user'])->viaTable('user_task', ['user_task_order' => 'task_id']);
	}
}
