<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Doctor;

/**
 * DoctorSearch represents the model behind the search form of `app\models\Doctor`.
 */
class DoctorSearch extends Doctor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institution_id', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['type', 'name','pori_num', 'education', 'education_doctor', 'education_master', 'education_consultant', 'education_phd', 'certificate_num', 'str_num', 'sip_num', 'birthplace', 'birthdate', 'address', 'created_at', 'updated_at'], 'safe'],
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
        $query = Doctor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
// var_dump($params);die();
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
            'birthdate' => $this->birthdate,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'pori_num', $this->pori_num])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'education_doctor', $this->education_doctor])
            ->andFilterWhere(['like', 'education_master', $this->education_master])
            ->andFilterWhere(['like', 'education_consultant', $this->education_consultant])
            ->andFilterWhere(['like', 'education_phd', $this->education_phd])
            ->andFilterWhere(['like', 'certificate_num', $this->certificate_num])
            ->andFilterWhere(['like', 'str_num', $this->str_num])
            ->andFilterWhere(['like', 'sip_num', $this->sip_num])
            ->andFilterWhere(['like', 'birthplace', $this->birthplace])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
