<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Brachiterapy;

/**
 * BrachiterapySearch represents the model behind the search form of `app\models\Brachiterapy`.
 */
class BrachiterapySearch extends Brachiterapy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['type', 'radiation_source', 'usguided', 'carm', 'technique', 'total_hours_per_day', 'total_hours_per_week', 'valid_period', 'created_at', 'updated_at'], 'safe'],
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
        $query = Brachiterapy::find();

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
            'id' => $this->id,
            'institution_id' => $this->institution_id,
            'year' => $this->year,
            'valid_period' => $this->valid_period,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'radiation_source', $this->radiation_source])
            ->andFilterWhere(['like', 'usguided', $this->usguided])
            ->andFilterWhere(['like', 'carm', $this->carm])
            ->andFilterWhere(['like', 'technique', $this->technique])
            ->andFilterWhere(['like', 'total_hours_per_day', $this->total_hours_per_day])
            ->andFilterWhere(['like', 'total_hours_per_week', $this->total_hours_per_week]);

        return $dataProvider;
    }
}
