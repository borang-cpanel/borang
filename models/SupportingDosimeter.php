<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supporting_dosimeter".
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
class SupportingDosimeter extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supporting_dosimeter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'year', 'valid_period'], 'required'],
            [['institution_id', 'year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['valid_period', 'water_phantom', 'slab_phantom', 'detector_06cc', 'detector_plan', 'created_at', 'updated_at'], 'safe'],
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
            [
                'name'=>'water_phantom',
                'type'=>'multiform',
                'options'=>
                    [
                        'number'=>5,
                        'fields'=>[
                            [
                                'label'=>'Water Phantom',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                        ]
                    ]
            ],
            [
                'name'=>'slab_phantom',
                'type'=>'multiform',
                'options'=>
                    [
                        'number'=>5,
                        'fields'=>[
                            [
                                'label'=>'Slab Phantom',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                        ]
                    ]
            ],
            [
                'name'=>'detector_06cc',
                'type'=>'multiform',
                'options'=>
                    [
                        'number'=>5,
                        'fields'=>[
                            [
                                'label'=>'Detector 0.6CC',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                        ]
                    ]
            ],
            [
                'name'=>'detector_plan',
                'type'=>'multiform',
                'options'=>
                    [
                        'number'=>5,
                        'fields'=>[
                            [
                                'label'=>'Detector Plan Parallel',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                        ]
                    ]
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
            'water_phantom'=>'Water Phantom',
            'slab_phantom'=>'Slab Phantom',
            'detector_06cc'=>'Detector 0.6cc',
            'detector_plan'=>'Detector Plan Parallel',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
