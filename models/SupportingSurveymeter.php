<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supporting_surveymeter".
 *
 * @property int $id
 * @property int $institution_id
 * @property int $year
 * @property string $valid_period
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class SupportingSurveymeter extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supporting_surveymeter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'year', 'valid_period'], 'required'],
            [['institution_id', 'year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['valid_period', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'valid_period',
                'type'=>'datepicker',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institution_id' => 'Supporting ID',
            'year' => 'Year',
            'valid_period' => 'Operational License Valid Until',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
