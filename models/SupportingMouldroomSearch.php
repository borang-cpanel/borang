<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SupportingMouldroom;

/**
 * SupportingMouldroomSearch represents the model behind the search form of `\app\models\SupportingMouldroom`.
 */
class SupportingMouldroomSearch extends SupportingMouldroom
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'thermoplastic_mask_year', 'blue_bag_year', 'leksell_g_grame_year', 'headfix_year', 'alpha_cradle_year', 'other_fixation_year', 'individual_block_year', 'styrofoam_cutter_total', 'styrofoam_cutter_year', 'tin_smelter_total', 'tin_smelter_year', 'water_bath_total', 'water_bath_year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['thermoplastic_mask', 'blue_bag', 'leksell_g_grame', 'headfix', 'alpha_cradle', 'other_fixation', 'other_fixation_note', 'individual_block', 'styrofoam_cutter', 'tin_smelter', 'water_bath', 'created_at', 'updated_at'], 'safe'],
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
        $query = SupportingMouldroom::find();

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
            'thermoplastic_mask_year' => $this->thermoplastic_mask_year,
            'blue_bag_year' => $this->blue_bag_year,
            'leksell_g_grame_year' => $this->leksell_g_grame_year,
            'headfix_year' => $this->headfix_year,
            'alpha_cradle_year' => $this->alpha_cradle_year,
            'other_fixation_year' => $this->other_fixation_year,
            'individual_block_year' => $this->individual_block_year,
            'styrofoam_cutter_total' => $this->styrofoam_cutter_total,
            'styrofoam_cutter_year' => $this->styrofoam_cutter_year,
            'tin_smelter_total' => $this->tin_smelter_total,
            'tin_smelter_year' => $this->tin_smelter_year,
            'water_bath_total' => $this->water_bath_total,
            'water_bath_year' => $this->water_bath_year,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'thermoplastic_mask', $this->thermoplastic_mask])
            ->andFilterWhere(['like', 'blue_bag', $this->blue_bag])
            ->andFilterWhere(['like', 'leksell_g_grame', $this->leksell_g_grame])
            ->andFilterWhere(['like', 'headfix', $this->headfix])
            ->andFilterWhere(['like', 'alpha_cradle', $this->alpha_cradle])
            ->andFilterWhere(['like', 'other_fixation', $this->other_fixation])
            ->andFilterWhere(['like', 'other_fixation_note', $this->other_fixation_note])
            ->andFilterWhere(['like', 'individual_block', $this->individual_block])
            ->andFilterWhere(['like', 'styrofoam_cutter', $this->styrofoam_cutter])
            ->andFilterWhere(['like', 'tin_smelter', $this->tin_smelter])
            ->andFilterWhere(['like', 'water_bath', $this->water_bath]);

        return $dataProvider;
    }
}
