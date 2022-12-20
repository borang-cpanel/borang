<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brachiterapy".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $type
 * @property string $radiation_source
 * @property int $year
 * @property string $usguided
 * @property string $carm
 * @property string $technique
 * @property string $total_hours_per_day
 * @property string $total_hours_per_week
 * @property string $valid_period
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class Brachiterapy extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brachiterapy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'type', 'radiation_source', 'year', 'usguided', 'carm', 'technique', 'total_hours_per_day', 'total_hours_per_week', 'valid_period'], 'required'],
            [['institution_id', 'year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['type', 'tps', 'valid_period', 'created_at', 'updated_at', 'technique'], 'safe'],
            [['radiation_source', 'usguided', 'carm', 'total_hours_per_day', 'total_hours_per_week'], 'string', 'max' => 100],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'type',
                'type'=>'multiselect',
                'data'=>['2D','3D']
            ],
            [
                'name'=>'3d_brachitherapy',
                'type'=>'multiselect',
                'data'=>['Dedicated CT Simulator','Using External Radiation CT Simulator','Using CT Scan from Radiology'],
                'hint'=>'Silahkan diisi jika mencentang 3D'
            ],
            [
                'name'=>'radiation_source',
                'type'=>'select',
                'data'=>['Cobalt 60','Iridium 192','Cesium 137','Iodium 125']
            ],
            [
                'name'=>'year',
                'type'=>'select',
                'data'=>range(date('Y')-20,date('Y'))
            ],
            [
                'name'=>'usguided',
                'type'=>'select',
                'data'=>['Yes','No']
            ],
            [
                'name'=>'carm',
                'type'=>'select',
                'data'=>['Yes','No']
            ],
            [
                'name'=>'technique',
                'type'=>'multiselect',
                'data'=>['Intracavitary','Interstitial','Intraluminal','Implant']
            ],
            [
                'name'=>'total_hours_per_day',
                'type'=>'select',
                'data'=>[6,8,10,12,'>12']
            ],
            [
                'name'=>'total_hours_per_week',
                'type'=>'select',
                'data'=>[30,40,50,60,'>60']
            ],
            [
                'name'=>'valid_period',
                'type'=>'datepicker',
            ],
            [
                'name'=>'tps',
                'type'=>'multiform',
                'options'=>
                    [
                        'number'=>5,
                        'fields'=>[
                            [
                                'label'=>'Tipe TPS',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                            [
                                'label'=>'Tahun Operasional',
                                'name'=>'year',
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
            'institution_id' => 'Institution ID',
            'type' => 'Type(s)',
            '3d_brachitherapy'=>'3D Brachytherapy',
            'radiation_source' => 'Radiation Source',
            'year' => 'Installation /Operation Year',
            'usguided' => 'US-Guided',
            'carm' => 'C-Arm',
            'technique' => 'Brachyterapy Technique',
            'total_hours_per_day' => 'Total Hours Per Day',
            'total_hours_per_week' => 'Total Hours Per Week',
            'valid_period' => 'License Validity Period',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }  
}
