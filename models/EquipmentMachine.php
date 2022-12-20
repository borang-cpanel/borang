<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_machine".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $machine
 * @property string $model
 * @property int $year
 * @property string $technique
 * @property string $feature
 * @property string $photon_energy
 * @property string $photon_energy_note
 * @property string $verification
 * @property string $electron
 * @property string $electron_note
 * @property string $operating_hours_per_day
 * @property string $operating_hours_per_week
 * @property string $license_validity
 * @property string $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property string $updated_by
 * @property int $publish
 */
class EquipmentMachine extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_machine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'machine', 'model', 'year', 'technique', 'feature', 'photon_energy', 'verification', 'electron', 'operating_hours_per_day', 'operating_hours_per_week', 'license_validity'], 'required'],
            [['institution_id', 'year', 'created_by', 'updated_at', 'publish'], 'integer'],
            [['photon_energy_note','verification', 'technique', 'feature', 'tps', 'license_validity', 'created_at', 'updated_by'], 'safe'],
            [['machine', 'photon_energy', 'model'], 'string', 'max' => 200],
            [['electron_note'], 'string', 'max' => 500],
            [['electron', 'operating_hours_per_day', 'operating_hours_per_week'], 'string', 'max' => 10],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'machine',
                'type'=>'select',
                'data'=>['Cobalt 60','LINAC','TOMOTHERAPY']
            ],
            [
                'name'=>'model',
                'type'=>'text',
                'hint'=>'Contoh: Varian Halcyon',
            ],
            [
                'name'=>'year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'technique',
                'type'=>'multiselect',
                'data'=>['2D','3D','IMRT','VMAT','SRT','SRS','SBRT','IGRT'],
            ],
            [
                'name'=>'feature',
                'type'=>'multiselect',
                'data'=>['Standard','FFF','Rapid arc']
            ],
            [
                'name'=>'photon_energy',
                'type'=>'select',
                'data'=>['Single Energy','Multi Energy']
            ],
            [
                'name'=>'photon_energy_note',
                'type'=>'multiselect',
                'data'=>['6MV', '10MV', '18MV'],
                'hint'=>'Isi keterangan energy jika Multi Energy'
            ],
            [
                'name'=>'verification',
                'type'=>'multiselect',
                'data'=>['Film (Gamagrafi,dll)','EPID','MVCT','KVCT']
            ],
            [
                'name'=>'electron',
                'type'=>'select',
                'data'=>['Ya-Yes','Tidak-No']
            ],
            [
                'name'=>'electron_note',
                'type'=>'textarea',
                'hint'=>'Isi kolom ini jika Energi Elektron diisi "Ya"'
            ],
            [
                'name'=>'operating_hours_per_day',
                'type'=>'select',
                'data'=>[6,8,10,12,'>12']
            ],
            [
                'name'=>'operating_hours_per_week',
                'type'=>'select',
                'data'=>[30,40,50,60,70,80,90,100,110,120,'>120']
            ],
            [
                'name'=>'license_validity',
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
            'machine' => 'Jenis Pesawat Radiasi - Type of Machine(s)',
            'model' => 'Model',
            'year' => 'Tahun Instal/Operasional - Installation/Operational Year',
            'technique' => 'Teknik - Technique(s)',
            'feature' => 'Kemampuan - Feature(s)',
            'photon_energy' => 'Photon Energy',
            'photon_energy_note' => 'Catatan Photon Energy - Photon Energy Note',
            'verification' => 'Verifikasi - Verification',
            'electron' => 'Energy Electron',
            'electron_note' => 'Energy Electron Note',
            'operating_hours_per_day' => 'Operating Hours Per Day',
            'operating_hours_per_week' => 'Operating Hours Per Week',
            'license_validity' => 'Masa Berlaku Izin Alat - License Validity Period',
            'tps'=>'TPS',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }  

    public function getMachineName()
    {
        return ucwords(strtolower($this->machine)).' '.ucwords(strtolower($this->model));
    }
}
