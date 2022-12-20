<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Institution;

/**
 * InstitutionSearch represents the model behind the search form of `\app\models\Institution`.
 */
class InstitutionSearch extends Institution
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['name', 'address', 'city', 'province', 'email', 'zipcode', 'phone', 'status', 'class', 'referral_type', 'insurance_status', 'accreditation', 'quatro_audit', 'quatro_audit_process', 'created_at', 'updated_at'], 'safe'],
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
        $query = Institution::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ]
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
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'referral_type', $this->referral_type])
            ->andFilterWhere(['like', 'insurance_status', $this->insurance_status])
            ->andFilterWhere(['like', 'accreditation', $this->accreditation])
            ->andFilterWhere(['like', 'quatro_audit', $this->quatro_audit])
            ->andFilterWhere(['like', 'quatro_audit_process', $this->quatro_audit_process]);

        return $dataProvider;
    }
}
