<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff_profile".
 *
 * @property int $id
 * @property int $institution_id
 * @property int $medical_physics_s1
 * @property int $medical_physics_s2
 * @property int $ppr
 * @property string $ppr_level
 * @property int $rtt
 * @property string $rtt_level
 * @property int $nurse
 * @property string $nurse_level
 * @property int $technician
 * @property string $technician_level
 * @property int $security
 * @property string $created_at
 * @property int $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 * @property int $publish
 */
class StaffProfile extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'oncology_surgery','internist','anatomy_patology','obgyn','medical_physics_s1', 'medical_physics_s2', 'ppr', 'rtt', 'nurse', 'technician', 'security'], 'required'],
            [['institution_id', 'oncology_surgery','internist','anatomy_patology','obgyn','medical_physics_s1', 'medical_physics_s2', 'ppr', 'rtt', 'nurse', 'technician', 'security', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['ppr_level','created_at', 'updated_at'], 'safe'],
            [[ 'rtt_level', 'nurse_level', 'technician_level'], 'string', 'max' => 200],
        ];
    }

    public static function createNew($institution_id)
    {
        $obj = new self;
        $obj->institution_id = $institution_id;
        $obj->oncology_surgery = 0;
        $obj->internist = 0;
        $obj->anatomy_patology = 0;
        $obj->obgyn = 0;
        $obj->medical_physics_s1 = 0;
        $obj->medical_physics_s2 = 0;
        $obj->ppr = 0;
        $obj->rtt = 0;
        $obj->nurse = 0;
        $obj->technician = 0;
        $obj->security = 0;
        $obj->save();
        //var_dump($obj->getErrors());
    }

    public function getS3()
    {
        $doctors = Doctor::find()
        ->andWhere(['education'=>['Doktor(S3)', 'PhD']])
        ->andWhere(['institution_id'=>$this->institution_id])
        ->count();
        return $doctors;
    }

    public function getProfesor()
    {
        $doctors = Doctor::find()
        ->andWhere(['education'=>['Profesor/Guru Besar']])
        ->andWhere(['institution_id'=>$this->institution_id])
        ->count();
        return $doctors;
    }

    public function getTotal()
    {
        return $this->medical_physics_s1 + $this->medical_physics_s2 + $this->ppr + $this->rtt + 
        $this->nurse + $this->technician + $this->security;
    }

    public function formFields()
    {
        return [
            [
                'name'=>'oncology_surgery',
                'type'=>'text'
            ],
            [
                'name'=>'internist',
                'type'=>'text'
            ],
            [
                'name'=>'anatomy_patology',
                'type'=>'text'
            ],
            [
                'name'=>'obgyn',
                'type'=>'text'
            ],
            [
                'name'=>'medical_physics_s1',
                'type'=>'text'
            ],
            [
                'name'=>'medical_physics_s2',
                'type'=>'text'
            ],
            [
                'name'=>'ppr',
                'type'=>'text'
            ],
            [
                'name'=>'ppr_level',
                'type'=>'multiselect',
                'data'=>['Dokter','Fisikawan Medis','RTT'],
            ],
            [
                'name'=>'rtt',
                'type'=>'text'
            ],
            [
                'name'=>'rtt_level',
                'type'=>'select',
                'data'=>['D3','D4','S1'],
            ],
            [
                'name'=>'nurse',
                'type'=>'text'
            ],
            [
                'name'=>'nurse_level',
                'type'=>'select',
                'data'=>['D3','S1','S2'],
            ],
            [
                'name'=>'technician',
                'type'=>'text'
            ],
            [
                'name'=>'technician_level',
                'type'=>'select',
                'data'=>['D3','S1'],
            ],
            [
                'name'=>'security',
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
            'oncology_surgery' =>'Dokter Spesialis Bedah Onkologi',
            'internist'=>'Dokter Spesialis Penyakit Dalam Konsultan Hemato Onkologi Medik',
            'anatomy_patology'=>'Dokter Spesialis Patologi Anatomi',
            'obgyn'=>'Dokter Spesialis Obstetri Ginekologi Konsultan Onkologi',
            'medical_physics_s1' => 'Fisikawan Medis S1',
            'medical_physics_s2' => 'Fisikawan Medis S2',
            'ppr' => 'PPR',
            'ppr_level' => 'Jabatan PPR',
            'rtt' => 'RTT',
            'rtt_level' => 'Strata RTT',
            'nurse' => 'Perawat Medis',
            'nurse_level' => 'Strata Perawat Medis',
            'technician' => 'Teknisi Medis',
            'technician_level' => 'Strata Teknisi Medis',
            'security' => 'Sekuriti',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
