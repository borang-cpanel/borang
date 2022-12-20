<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "externa".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $period
 * @property int $total
 * @property string $case
 * @property int $radiation_2d
 * @property int $radiation_3d
 * @property int $radiation_imrt
 * @property int $radiation_vmat
 * @property int $radiation_srt
 * @property int $radiation_srs
 * @property int $radiation_sbrt
 * @property int $radiation_igrt
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class ExternaMonthly extends Externa
{

    public $period_month;
    public $period_year;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'period_year','period_month', 'total', 'case', 'radiation_2d', 'radiation_3d', 'radiation_imrt', 'radiation_vmat', 'radiation_srt', 'radiation_srs', 'radiation_sbrt', 'radiation_igrt'], 'required'],
            [['institution_id', 'total', 'radiation_2d', 'radiation_3d', 'radiation_imrt', 'radiation_vmat', 'radiation_srt', 'radiation_srs', 'radiation_sbrt', 'radiation_igrt', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['case', 'created_at', 'updated_at'], 'safe'],
            [['period', 'period_year','period_month'], 'string', 'max' => 200],
            [['period_type'], 'string', 'max' => 300],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'period_year',
                'type'=>'select',
                'data'=> range(date('Y')-3, date('Y')+1)
            ],
            [
                'name'=>'period_month',
                'type'=>'select',
                'data'=> ['01'=>'Jan',
                    '02'=>'Feb',
                    '03'=>'Mar',
                    '04'=>'Apr',
                    '05'=>'May',
                    '06'=>'Jun',
                    '07'=>'Jul',
                    '08'=>'Aug',
                    '09'=>'Sep',
                    '10'=>'Oct',
                    '11'=>'Nov',
                    '12'=>'Dec'
                ],
                'options'=>[
                    'keyarray'=>true
                ]
            ],
            [
                'name'=>'total',
                'type'=>'text'
            ],
            [
                'name'=>'case',
                'type'=>'multiform',
                'options'=>
                    [
                        'number'=>10,
                        'fields'=>[
                            [
                                'label'=>'Jenis Kasus',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                            [
                                'label'=>'Persentase',
                                'name'=>'percentage',
                                'type'=>'text'
                            ],
                        ]
                    ]
                        ],
            [
                'name'=>'radiation_2d',
                'type'=>'text',
            ],            
            [
                'name'=>'radiation_3d',
                'type'=>'text',
            ],
            [
                'name'=>'radiation_imrt',
                'type'=>'text',
            ],
            [
                'name'=>'radiation_vmat',
                'type'=>'text',
            ],
            [
                'name'=>'radiation_srt',
                'type'=>'text',
            ],
            [
                'name'=>'radiation_srs',
                'type'=>'text',
            ],
            [
                'name'=>'radiation_sbrt',
                'type'=>'text',
            ],
            [
                'name'=>'radiation_igrt',
                'type'=>'text',
            ],
        ];
    }

    public function afterFind()
    {
        list($this->period_year, $this->period_month) = explode('-', $this->period);
        
        return parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institution_id' => 'Institution ID',
            'period' => 'Period',
            'total' => 'Total',
            'case' => 'Case',
            'radiation_2d' => '2D',
            'radiation_3d' => '3D',
            'radiation_imrt' => 'IMRT',
            'radiation_vmat' => 'VMAT',
            'radiation_srt' => 'SRT',
            'radiation_srs' => 'SRS',
            'radiation_sbrt' => 'SBRT',
            'radiation_igrt' => 'IGRT',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }

    public function beforeSave($insert)
    {
        //Set period sebelum simpan
        $this->period_type = 'Monthly';
        $this->period = $this->period_year . '-' . $this->period_month;

        //pastikan total percentage harus 100
        $total = 0;
        foreach($this->case as $item){
            $total += intval($item['percentage']);
        }
        if($total != 100) {
            $this->addError('case','Mohon untuk input persentase pada Jenis Kasus agar totalnya menjadi 100');
            return false;
        }

        return parent::beforeSave($insert);
    }

   
}
