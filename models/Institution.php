<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "institution".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $email
 * @property string $zipcode
 * @property string $phone
 * @property string $status
 * @property string $class
 * @property string $referral_type
 * @property string $insurance_status
 * @property string $accreditation
 * @property string $quatro_audit
 * @property string|null $quatro_audit_process
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class Institution extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'city', 'province', 'email', 'zipcode', 'phone', 'status', 'class', 'referral_type', 'insurance_status', 'accreditation', 'quatro_audit', 'quatro_audit_year'], 'required'],
            [['address'], 'string'],
            [['quatro_audit_process','created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'publish'], 'integer'],
            [['name', 'city', 'province'], 'string', 'max' => 100],
            [['email', 'zipcode', 'status', 'class', 'referral_type', 'insurance_status', 'accreditation', 'quatro_audit', 'quatro_audit_process'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    public function formFields()
    {
        return [
            [
                'name'=>'name',
                'type'=>'text'
            ],
            [
                'name'=>'address',
                'type'=>'text'
            ],
            [
                'name'=>'city',
                'type'=>'text'
            ],
            [
                'name'=>'province',
                'type'=>'text'
            ],
            [
                'name'=>'email',
                'type'=>'text'
            ],
            [
                'name'=>'zipcode',
                'type'=>'text'
            ],
            [
                'name'=>'phone',
                'type'=>'text'
            ],
            [
                'name'=>'status',
                'type'=>'select',
                'data'=>[
                    'RS Pendidikan - Teaching Hospital Hospital',
                    'RS Non Pendidikan - Non-teaching Hospital',
                ]
            ],
            [
                'name'=>'class',
                'type'=>'select',
                'data'=>[
                    'Tipe/Type A',
                    'Tipe/Type B',
                    'Tipe/Type C',
                ]
            ],
            [
                'name'=>'referral_type',
                'type'=>'select',
                'data'=>['I','II','III']
            ],
            [
                'name'=>'insurance_status',
                'type'=>'select',
                'data'=>['BPJS/JKN', 'Non-BPJS/Non-JKN']
            ],
            [
                'name'=>'accreditation',
                'type'=>'select',
                'data'=>['ISO', 'JCI', 'KARS']
            ],
            [
                'name'=>'quatro_audit',
                'type'=>'select',
                'data'=>['Yes/Ya', 'No/Tidak', 'On Process/Dalam Proses']
            ],
            [
                'name'=>'quatro_audit_year',
                'type'=>'select',
                'data'=>range(date('Y')-20,date('Y')),
                'hint'=>'Isi tahun jika QUATRO Audit adalah "Ya"'
            ],
            [
                'name'=>'quatro_audit_process',
                'type'=>'textarea',
                'hint'=>'Isi penjelasan jika QUATRO Audit dalam proses'
            ],
        ];
    }

    public function getEquipmentMachines()
    {
        return $this->hasMany(EquipmentMachine::className(), ['institution_id'=>'id']);
    }

    public function getSupportingSimulators()
    {
        return $this->hasMany(SupportingSimulator::className(), ['institution_id'=>'id']);
    }

    public function getSupportingCtsimulators()
    {
        return $this->hasMany(SupportingCtsimulator::className(), ['institution_id'=>'id']);
    }

    public function getSupportingDosimeters()
    {
        return $this->hasMany(SupportingDosimeter::className(), ['institution_id'=>'id']);
    }

    public function getSupportingSurveymeters()
    {
        return $this->hasMany(SupportingSurveymeter::className(), ['institution_id'=>'id']);
    }

    public function getSupportingUps()
    {
        return $this->hasMany(SupportingUps::className(), ['institution_id'=>'id']);
    }

    public function getBrachiterapies()
    {
        return $this->hasMany(Brachiterapy::className(), ['institution_id'=>'id']);
    }

    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['institution_id'=>'id']);
    }

    public function getDoctorSpecialist()
    {
        return $this->hasMany(Doctor::className(), ['institution_id'=>'id'])->where(['type'=>'Specialist']);
    }

    public function getDoctorConsultant()
    {
        return $this->hasMany(Doctor::className(), ['institution_id'=>'id'])->where(['type'=>'Consultant']);
    }

    public function getStaffProfile()
    {
        //Cari dulu ada staff-profile untuk rumah sakit ini tidak, kalau tidak ada buat baru
        $count = StaffProfile::find()->where(['institution_id'=>$this->id])->count();
        if($count==0){
            StaffProfile::createNew($this->id);
        }
        
        return $this->hasOne(StaffProfile::className(), ['institution_id'=>'id']);
    }

    public function getSupportingMouldroom()
    {
        //Cari dulu ada mouldroom untuk rumah sakit ini tidak, kalau tidak ada buat baru
        $count = SupportingMouldroom::find()->where(['institution_id'=>$this->id])->count();
        if($count==0){
            SupportingMouldroom::createNew($this->id);
        }
        
        return $this->hasOne(SupportingMouldroom::className(), ['institution_id'=>'id']);
    }

    public function getExterna()
    {
        return $this->hasMany(Externa::className(), ['institution_id'=>'id']);
    }

    public function getInterna()
    {
        return $this->hasMany(Interna::className(), ['institution_id'=>'id']);
    }

    public function getExternaLatest()
    {
        $externaLatest =  Externa::find()->where(['institution_id'=>$this->id])->orderBy(['period'=>SORT_DESC])->one();
        if($externaLatest==null){
            return 'N/A';
        }
        
        return $externaLatest->total;
    }

    public function get2dRadiationLatest()
    {
        $internaLatest =  Interna::find()->where(['institution_id'=>$this->id])->orderBy(['period'=>SORT_DESC])->one();
        if($internaLatest==null){
            return 'N/A';
        }
        
        return $internaLatest->radiation_2d;
    }

    public function get3dRadiationLatest()
    {
        $internaLatest =  Interna::find()->where(['institution_id'=>$this->id])->orderBy(['period'=>SORT_DESC])->one();
        if($internaLatest==null){
            return 'N/A';
        }
        
        return $internaLatest->radiation_3d;
    }

    public function getWaitingList()
    {
        //Cari dulu ada waitinglist untuk rumah sakit ini tidak, kalau tidak ada buat baru
        $count = WaitingList::find()->where(['institution_id'=>$this->id])->count();
        if($count==0){
            WaitingList::createNew($this->id);
        }
        
        return $this->hasOne(WaitingList::className(), ['institution_id'=>'id']);
    }

    public function getYearlyStats($year = null)
    {
        if($year == null){
            $year = date('Y');
        }

        $staffProfile = StaffProfile::find()->where(['institution_id'=>$this->id])->one();
        $totalStaff = 0;
        if($staffProfile){
            $totalStaff = $staffProfile->getTotal();
        }

        $totalDoctor = Doctor::find()->where(['institution_id'=>$this->id])->count() 
            + $staffProfile->oncology_surgery + $staffProfile->internist + $staffProfile->anatomy_patology + $staffProfile->obgyn;


        $totalSimulator = SupportingSimulator::find()->where(['institution_id'=>$this->id])->count();
        $totalCtSimulator = SupportingCtsimulator::find()->where(['institution_id'=>$this->id])->count();
        $totalDosimeter = SupportingDosimeter::find()->where(['institution_id'=>$this->id])->count();
        $totalSurveymeter = SupportingSurveymeter::find()->where(['institution_id'=>$this->id])->count();
        $totalUps = SupportingUps::find()->where(['institution_id'=>$this->id])->count();

        $totalBrachytherapy = Brachiterapy::find()->where(['institution_id'=>$this->id])->count();
        $totalLinac = EquipmentMachine::find()->where(['institution_id'=>$this->id, 'machine'=>'LINAC'])->count();
        $totalTomo = EquipmentMachine::find()->where(['institution_id'=>$this->id, 'machine'=>'TOMOTHERAPY'])->count();
        $totalCobalt = EquipmentMachine::find()->where(['institution_id'=>$this->id, 'machine'=>'Cobalt 60'])->count();

        $totalPatientExterna = Externa::getTotal($this->id, $year);
        list($totalPatientInterna2d, $totalPatientInterna3d) = Interna::getTotal($this->id, $year);
        $totalPatient = $totalPatientExterna + $totalPatientInterna2d + $totalPatientInterna3d;
        
        $totalWaitingExterna = $this->waitingList->week_externa;
        $totalWaitingBrachytherapy = $this->waitingList->week_brachytherapy;

        return 
        [
            'doctor'=>$totalDoctor,
            'staff'=>$totalStaff,

            'brachytherapy'=>$totalBrachytherapy,

            'linac'=>$totalLinac,
            'tomo'=>$totalTomo,
            'cobalt'=>$totalCobalt,
            'totalMachine'=>$totalLinac+$totalTomo+$totalCobalt,

            'simulator'=>$totalSimulator,
            'ctsimulator'=>$totalCtSimulator,
            'dosimeter'=>$totalDosimeter,
            'surveymeter'=>$totalSurveymeter,
            'ups'=>$totalUps,

            'patient_externa'=>$totalPatientExterna,
            'patient_interna_2d'=>$totalPatientInterna2d,
            'patient_interna_3d'=>$totalPatientInterna3d,
            'patient'=>$totalPatient,

            'waiting_externa'=>$totalWaitingExterna,
            'waiting_brachytherapy'=>$totalWaitingBrachytherapy,

        ];
    }
    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama/Name',
            'address' => 'Alamat/Address',
            'city' => 'Kota/City',
            'province' => 'Provinsi/Province',
            'email' => 'Email',
            'zipcode' => 'Kode Pos/Zip Code',
            'phone' => 'Telepon/Phone Number',
            'status' => 'Status RS/Senter Onkologi Radiasi - Hospital/Radiation Oncology Center Status',
            'class' => 'Kelas RS/Senter Onkologi Radiasi -  Hospital/Radiation Oncology Center Status',
            'referral_type' => 'Tipe Rujukan RS/Senter Onkologi Radiasi - Hospital/Radiation Oncology Center Referral Type',
            'insurance_status' => 'Tipe Pelayanan RS/Senter Onkologi Radiasi - National Health Insurance (JKN) Status',
            'accreditation' => 'Akreditasi RS/Senter Onkologi Radiasi - Accreditation & Certification',
            'quatro_audit' => 'QUATRO Audit Status',
            'quatro_audit_year' => 'Tahun QUATRO Audit/QUATRO Audit Year',
            'quatro_audit_process' => 'QUATRO Audit Process',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
