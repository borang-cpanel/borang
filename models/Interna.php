<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interna".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $period
 * @property string $case
 * @property int $radiation_2d
 * @property int $radiation_3d
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class Interna extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'period', 'case', 'radiation_2d', 'radiation_3d'], 'required'],
            [['institution_id', 'radiation_2d', 'radiation_3d', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['case', 'created_at', 'updated_at'], 'safe'],
            [['period'], 'string', 'max' => 200],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'period',
                'type'=>'text',
                'hint'=>'Masukkan period dengan format yyyy-mm seperti 2021-12 untuk Desember 2021'
            ],
            [
                'name'=>'case',
                'type'=>'multiform',
                'options'=>
                    [
                        'number'=>5,
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
                'type'=>'text'
            ],
            [
                'name'=>'radiation_3d',
                'type'=>'text'
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
            'period' => 'Period',
            'case' => 'Case',
            'radiation_2d' => 'Radiation 2d',
            'radiation_3d' => 'Radiation 3d',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }

    public static function getTotal($institutionId, $year)
    {
        $object = self::find()->where(['institution_id'=>$institutionId])->andWhere(['like','period',$year]);
        return [$object->sum('radiation_2d'), $object->sum('radiation_3d')];
    }

    public static function latestRadiation2d()
    {
        $latest = self::getLatest();
        if ($latest){
            return $latest->radiation_2d;
        }else{
            return 'N/A';
        }
    }

    public static function latestRadiation3d()
    {
        $latest = self::getLatest();
        if ($latest){
            return $latest->radiation_3d;
        }else{
            return 'N/A';
        }
    }

    public function beforeSave($insert)
    {
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
