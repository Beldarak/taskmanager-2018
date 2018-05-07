<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserTask;

/**
 * UserTaskSearch represents the model behind the search form of `app\models\UserTask`.
 */
class UserTaskSearch extends UserTask
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_task_task', 'user_task_user', 'user_task_order'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserTask::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_task_task' => $this->user_task_task,
            'user_task_user' => $this->user_task_user,
            'user_task_order' => $this->user_task_order,
        ]);

        return $dataProvider;
    }
}
