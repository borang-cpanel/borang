<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supporting_ctsimulator".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $type
 * @property int $year
 * @property string $valid_period
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class SupportingCtsimulator extends \app\components\ActiveRecord
{

    protected $title = 'CT Simulator';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supporting_ctsimulator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'type', 'year', 'valid_period'], 'required'],
            [['institution_id', 'year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['valid_period', 'created_at', 'updated_at', 'slice'], 'safe'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'type',
                'type'=>'text'
            ],
            [
                'name'=>'year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'slice',
                'type'=>'select',
                'data'=>['4','16','20','64','128', '256'],
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
            'type' => 'Type',
            'year' => 'Year',
            'slice' => 'Jumlah Slice CT Simulator',
            'valid_period' => 'Operational License Valid Until',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
