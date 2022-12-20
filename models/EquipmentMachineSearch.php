<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EquipmentMachine;

/**
 * EquipmentMachineSearch represents the model behind the search form of `app\models\EquipmentMachine`.
 */
class EquipmentMachineSearch extends EquipmentMachine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'year', 'created_by', 'updated_at', 'publish'], 'integer'],
            [['machine', 'model', 'technique', 'feature', 'photon_energy', 'photon_energy_note', 'verification', 'electron', 'electron_note', 'operating_hours_per_day', 'operating_hours_per_week', 'license_validity', 'created_at', 'updated_by'], 'safe'],
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
        $query = EquipmentMachine::find();

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
            'license_validity' => $this->license_validity,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'machine', $this->machine])
            ->andFilterWhere(['like', 'technique', $this->technique])
            ->andFilterWhere(['like', 'feature', $this->feature])
            ->andFilterWhere(['like', 'photon_energy', $this->photon_energy])
            ->andFilterWhere(['like', 'photon_energy_note', $this->photon_energy_note])
            ->andFilterWhere(['like', 'verification', $this->verification])
            ->andFilterWhere(['like', 'electron', $this->electron])
            ->andFilterWhere(['like', 'electron_note', $this->electron_note])
            ->andFilterWhere(['like', 'operating_hours_per_day', $this->operating_hours_per_day])
            ->andFilterWhere(['like', 'operating_hours_per_week', $this->operating_hours_per_week]);

        return $dataProvider;
    }
}
