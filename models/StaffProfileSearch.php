<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StaffProfile;

/**
 * StaffProfileSearch represents the model behind the search form of `app\models\StaffProfile`.
 */
class StaffProfileSearch extends StaffProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'medical_physics_s1', 'medical_physics_s2', 'ppr', 'rtt', 'nurse', 'technician', 'security', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['ppr_level', 'rtt_level', 'nurse_level', 'technician_level', 'created_at', 'updated_at'], 'safe'],
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
        $query = StaffProfile::find();

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
            'medical_physics_s1' => $this->medical_physics_s1,
            'medical_physics_s2' => $this->medical_physics_s2,
            'ppr' => $this->ppr,
            'rtt' => $this->rtt,
            'nurse' => $this->nurse,
            'technician' => $this->technician,
            'security' => $this->security,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'ppr_level', $this->ppr_level])
            ->andFilterWhere(['like', 'rtt_level', $this->rtt_level])
            ->andFilterWhere(['like', 'nurse_level', $this->nurse_level])
            ->andFilterWhere(['like', 'technician_level', $this->technician_level]);

        return $dataProvider;
    }
}
