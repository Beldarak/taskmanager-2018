<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;

/**
 * TaskSearch represents the model behind the search form of `app\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'task_creator', 'task_parent', 'task_status', 'task_emergency', 'task_priority'], 'integer'],
            [['task_name', 'task_description', 'task_limit', 'task_end'], 'safe'],
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
        $query = Task::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		/*$dataProvider->setSort([
			'attributes' => [
				//'id',
				'nom',
				//'id_categ',
				'order_id'	=> [
					'asc' => ['user_task.user_task_order' => SORT_ASC],
					'desc' => ['user_task.user_task_order' => SORT_DESC],
					'label' => 'Order ID' //nom de la colonne
				]
			]
		
		]);*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
			//$query->joinWith(['usertask']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'task_id' => $this->task_id,
            'task_creator' => $this->task_creator,
            'task_parent' => $this->task_parent,
            'task_limit' => $this->task_limit,
            'task_status' => $this->task_status,
            'task_emergency' => $this->task_emergency,
            'task_end' => $this->task_end,
            'task_priority' => $this->task_priority,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name])
              ->andFilterWhere(['like', 'task_description', $this->task_description]);
			  
		//$query->joinWith(['usertaskorderid' => function ($q) {
		//	$q->where('user_task.user_task_order LIKE "%' . $this->order_id . '%"');
		//}]);	  

        return $dataProvider;
    }
}
