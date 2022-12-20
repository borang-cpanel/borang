<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $type
 * @property int $name
 * @property int $pori_num
 * @property string $education
 * @property string|null $education_doctor
 * @property string|null $education_master
 * @property string|null $education_consultant
 * @property string|null $education_phd
 * @property string $certificate_num
 * @property string $str_num
 * @property string $sip_num
 * @property string $birthplace
 * @property string $birthdate
 * @property string $address
 * @property string $created_at
 * @property int $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 * @property int $publish
 */
class Doctor extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'type', 'name', 'pori_num', 'education', 'certificate_num', 'str_num', 'sip_num', 'birthplace', 'birthdate', 'address'], 'required'],
            [['institution_id', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['birthdate', 'created_at', 'updated_at'], 'safe'],
            [['type', 'name', 'education', 'education_doctor', 'education_master', 'education_consultant', 'education_phd', 'certificate_num',  'pori_num', 'str_num', 'sip_num', 'birthplace', 'address'], 'string', 'max' => 200],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'type',
                'type'=>'select',
                'data'=>['Specialist','Consultant']
            ],
            [
                'name'=>'name',
                'type'=>'text',
            ],
            [
                'name'=>'pori_num',
                'type'=>'text',
            ],
            [
                'name'=>'education',
                'type'=>'select',
                'data'=>[
                    'Profesor/Guru Besar',
                    'Doktor(S3)', 
                    'Spesialis Onkologi Radiasi (Sp1)', 
                    'Spesialis Onkologi Radiasi Konsultan (Sp2)',
                    'Master (S2)',
                    'PhD']
            ],
            [
                'name'=>'education_doctor',
                'type'=>'text',
            ],
            [
                'name'=>'education_master',
                'type'=>'text',
            ],
            [
                'name'=>'education_consultant',
                'type'=>'text',
            ],
            [
                'name'=>'education_phd',
                'type'=>'text',
            ],
            [
                'name'=>'certificate_num',
                'type'=>'text',
            ],
            [
                'name'=>'str_num',
                'type'=>'text',
            ],
            [
                'name'=>'sip_num',
                'type'=>'text',
            ],
            [
                'name'=>'birthplace',
                'type'=>'text',
            ],
            [
                'name'=>'birthdate',
                'type'=>'datepicker',
                'options'=>[
                    'clientOptions'=>[
                        'changeMonth'=>true,
                        'changeYear'=>true,
                        'yearRange'=> '-90:+0'
                    ]
                ],

            ],
            [
                'name'=>'address',
                'type'=>'textarea',
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
            'type' => 'Keahlian',
            'name' => 'Name - Nama',
            'pori_num' => 'No.Anggota PORI - PORI Member ID',
            'education' => 'Pendidikan - Education',
            'education_doctor' => 'S3-Doctor',
            'education_master' => 'S2-Master',
            'education_consultant' => 'Konsultan/Sp2 - Consultant',
            'education_phd' => 'PhD',
            'certificate_num' => 'No.Sertifikat Kompetensi - Competency Certificate Num',
            'str_num' => 'No.STR - STR Num',
            'sip_num' => 'No.SIP - SIP Num',
            'birthplace' => 'Tempat Lahir - Birthplace',
            'birthdate' => 'Tanggal Lahir - Birthdate',
            'address' => 'Alamat - Address',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
