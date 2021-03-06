<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tmuser;

/**
 * TmuserSearch represents the model behind the search form of `app\models\Tmuser`.
 */
class TmuserSearch extends Tmuser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_role', 'user_type'], 'integer'],
            [['user_name', 'user_first_name', 'user_login', 'user_password'], 'safe'],
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
        $query = Tmuser::find();

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
            'user_id' => $this->user_id,
            'user_role' => $this->user_role,
            'user_type' => $this->user_type,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_first_name', $this->user_first_name])
            ->andFilterWhere(['like', 'user_login', $this->user_login])
            ->andFilterWhere(['like', 'user_password', $this->user_password]);

        return $dataProvider;
    }
}
