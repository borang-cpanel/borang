<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Externa;

/**
 * ExternaSearch represents the model behind the search form of `app\models\Externa`.
 */
class ExternaMonthlySearch extends ExternaMonthly
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'total', 'radiation_2d', 'radiation_3d', 'radiation_imrt', 'radiation_vmat', 'radiation_srt', 'radiation_srs', 'radiation_sbrt', 'radiation_igrt', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['period_type','period', 'case', 'created_at', 'updated_at'], 'safe'],
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
        $query = ExternaMonthly::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['period' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $this->period_type = 'Monthly';

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'institution_id' => $this->institution_id,
            'period_type'=>$this->period_type,
            'total' => $this->total,
            'radiation_2d' => $this->radiation_2d,
            'radiation_3d' => $this->radiation_3d,
            'radiation_imrt' => $this->radiation_imrt,
            'radiation_vmat' => $this->radiation_vmat,
            'radiation_srt' => $this->radiation_srt,
            'radiation_srs' => $this->radiation_srs,
            'radiation_sbrt' => $this->radiation_sbrt,
            'radiation_igrt' => $this->radiation_igrt,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'period', $this->period])
            ->andFilterWhere(['like', 'case', $this->case]);

        return $dataProvider;
    }
}
