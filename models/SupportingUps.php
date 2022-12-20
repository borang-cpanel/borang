<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supporting_ups".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $capacity
 * @property int $year
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class SupportingUps extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supporting_ups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'capacity', 'year'], 'required'],
            [['institution_id', 'year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['capacity'], 'string', 'max' => 100],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'capacity',
                'type'=>'text'
            ],
            [
                'name'=>'year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
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
            'capacity' => 'Capacity',
            'year' => 'Year',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
