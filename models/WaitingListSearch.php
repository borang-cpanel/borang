<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WaitingList;

/**
 * WaitingListSearch represents the model behind the search form of `app\models\WaitingList`.
 */
class WaitingListSearch extends WaitingList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'total', 'year', 'month', 'week', 'created_by', 'updated_by', 'publish'], 'integer'],
            [[ 'type', 'created_at', 'updated_at'], 'safe'],
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
        $query = WaitingList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['year' => SORT_DESC,'month' => SORT_DESC,'week' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'institution_id' => $this->institution_id,
            'week_externa'=>$this->week_externa,
            'week_brachytherapy'=>$this->week_brachytherapy,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
