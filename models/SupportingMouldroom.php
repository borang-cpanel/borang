<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supporting_mouldroom".
 *
 * @property int $id
 * @property int $institution_id
 * @property string|null $thermoplastic_mask
 * @property int|null $thermoplastic_mask_year
 * @property string|null $blue_bag
 * @property int|null $blue_bag_year
 * @property string|null $leksell_g_grame
 * @property int|null $leksell_g_grame_year
 * @property string|null $headfix
 * @property int|null $headfix_year
 * @property string|null $alpha_cradle
 * @property int|null $alpha_cradle_year
 * @property string|null $other_fixation
 * @property string|null $other_fixation_note
 * @property int|null $other_fixation_year
 * @property string|null $individual_block
 * @property int|null $individual_block_year
 * @property string|null $styrofoam_cutter
 * @property int|null $styrofoam_cutter_total
 * @property int|null $styrofoam_cutter_year
 * @property string|null $tin_smelter
 * @property int|null $tin_smelter_total
 * @property int|null $tin_smelter_year
 * @property string|null $water_bath
 * @property int|null $water_bath_total
 * @property int|null $water_bath_year
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class SupportingMouldroom extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supporting_mouldroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id'], 'required'],
            [['institution_id', 'thermoplastic_mask_year', 'blue_bag_year', 'leksell_g_grame_year', 'headfix_year', 'alpha_cradle_year', 'other_fixation_year', 'individual_block_year', 'styrofoam_cutter_total', 'styrofoam_cutter_year', 'tin_smelter_total', 'tin_smelter_year', 'water_bath_total', 'water_bath_year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['created_at', 'updated_at', 'immobilization','conventional','digital'], 'safe'],
            [['thermoplastic_mask', 'blue_bag', 'leksell_g_grame', 'headfix', 'alpha_cradle', 'other_fixation', 'other_fixation_note', 'individual_block', 'styrofoam_cutter', 'tin_smelter', 'water_bath'], 'string', 'max' => 500],
        ];
    }

    public static function createNew($institution_id)
    {
        $obj = new self;
        $obj->institution_id = $institution_id;
        $obj->save();
    }

    /**
     * return total berupa jumlah conventional ditambah digital
     */
    public function getTotal()
    {
        $totalConventional = $this->countMultiform('conventional');
        $totalDigital = $this->countMultiform('digital');
        return $totalConventional + $totalDigital;
    }

    public function formFields()
    {
        return [
            [
                'name'=>'conventional',
                'type'=>'multiform',
                'hint'=>'Silahkan isi jenis-jenis Mouldroom Conventional (Jika Ada)',
                'options'=>
                    [
                        'number'=>5,
                        'fields'=>[
                            [
                                'label'=>'Mouldroom Conventional',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                        ]
                    ]
            ],
            [
                'name'=>'digital',
                'type'=>'multiform',
                'hint'=>'Silahkan isi jenis-jenis Mouldroom Digital (Jika Ada)',
                'options'=>
                    [
                        'number'=>5,
                        'fields'=>[
                            [
                                'label'=>'Mouldroom Digital',
                                'name'=>'name',
                                'type'=>'text'
                            ],
                        ]
                    ]
            ],

            [
                'name'=>'immobilization',
                'type'=>'html',
                'options'=>[
                    'value'=>'
                    <div class="row imobilization-form">

                    <div class="col-md-12">
                        <strong>Alat Imobilisasi Penunjang</strong>
                    </div>
                    
                    <div class="col-md-6">                    
                        <ul>
                        <li><input name="SupportingMouldroom[immobilization][thermo]" {thermo} type="checkbox"> Thermoplastic mask</li>
                        <li>
                            Standar Immobilization Set :
                            <ul>
                                <li><input name="SupportingMouldroom[immobilization][pillow]" {pillow} type="checkbox"> Bantal Kepala</li>
                                <li><input name="SupportingMouldroom[immobilization][footrest]" {footrest} type="checkbox"> Footrest</li>
                                <li><input name="SupportingMouldroom[immobilization][knee]" {knee} type="checkbox"> Penyangga Lutut</li>
                                <li><input name="SupportingMouldroom[immobilization][breast]" {breast} type="checkbox"> Breast Board</li>
                            </ul>
                        </li>
                        <li><input name="SupportingMouldroom[immobilization][vacuum]"  {vacuum} type="checkbox"> Vacuum Bag/Bluebag</li>
                        <li><input name="SupportingMouldroom[immobilization][alpha]" {alpha} type="checkbox"> Alpha Cradle/Pufix</li>
                        <li><input name="SupportingMouldroom[immobilization][headfix]" {headfix} type="checkbox"> Headfix</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                        <li><input name="SupportingMouldroom[immobilization][leksell]" {leksell} type="checkbox"> Leksell G-Frame</li>
                        <li><input name="SupportingMouldroom[immobilization][abc]" {abc} type="checkbox"> ABC System</li>
                        <li><input name="SupportingMouldroom[immobilization][anzai]" {anzai} type="checkbox"> Anzai Gating</li>
                        <li><input name="SupportingMouldroom[immobilization][vacuum2]" {vacuum2} type="checkbox"> Vacuum Bag/Bluebag/Alpha Cradle</li>
                        <li><input name="SupportingMouldroom[immobilization][other]" {other} type="checkbox"> Other Fixation : <input name="SupportingMouldroom[immobilization][other_note]" value="{other_note}"  type="text"></li>
                        <li>
                            Created At :
                            <ul>
                                <li><input name="SupportingMouldroom[immobilization][mouldroom]" {mouldroom}  type="checkbox"> Mouldroom</li>
                                <li><input name="SupportingMouldroom[immobilization][otherroom]" {otherroom} type="checkbox"> Other: <input name="SupportingMouldroom[immobilization][otherroom_note]" value="{otherroom_note} " type="text"></li>
                            </ul>
                        </li>
                        </ul>
                    </div>
                    </div>
                    ',
                    'replacement'=>[
                        'search'=>['{thermo}', '{pillow}', '{footrest}', '{knee}','{breast}','{vacuum}','{alpha}',
                        '{headfix}','{leksell}','{abc}','{anzai}','{vacuum2}','{other}','{mouldroom}','{otherroom}','{other_note}','{otherroom_note}'],
                        'replace'=>[
                            isset($this->immobilization['thermo'])?'checked':'', 
                            isset($this->immobilization['pillow'])?'checked':'',
                            isset($this->immobilization['footrest'])?'checked':'',
                            isset($this->immobilization['knee'])?'checked':'',
                            isset($this->immobilization['breast'])?'checked':'',
                            isset($this->immobilization['vacuum'])?'checked':'',
                            isset($this->immobilization['alpha'])?'checked':'',
                            isset($this->immobilization['headfix'])?'checked':'',
                            isset($this->immobilization['leksell'])?'checked':'',
                            isset($this->immobilization['abc'])?'checked':'',
                            isset($this->immobilization['anzai'])?'checked':'',
                            isset($this->immobilization['vacuum2'])?'checked':'',
                            isset($this->immobilization['other'])?'checked':'',
                            isset($this->immobilization['mouldroom'])?'checked':'',
                            isset($this->immobilization['otherroom'])?'checked':'',
                            isset($this->immobilization['other_note'])?$this->immobilization['other_note']:'',
                            isset($this->immobilization['otherroom_note'])?$this->immobilization['otherroom_note']:'',
                        ],
                    ]
                ]
            ],
            [
                'name'=>'',
                'type'=>'html',
                'options'=>['value'=>'']
            ],
            [
                'name'=>'thermoplastic_mask',
                'type'=>'text'
            ],
            [
                'name'=>'thermoplastic_mask_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'blue_bag',
                'type'=>'text'
            ],
            [
                'name'=>'blue_bag_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'leksell_g_grame',
                'type'=>'text'
            ],
            [
                'name'=>'leksell_g_grame_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'headfix',
                'type'=>'text'
            ],
            [
                'name'=>'headfix_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'alpha_cradle',
                'type'=>'text'
            ],
            [
                'name'=>'alpha_cradle_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'other_fixation',
                'type'=>'text'
            ],
            [
                'name'=>'other_fixation_note',
                'type'=>'text'
            ],
            [
                'name'=>'other_fixation_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'',
                'type'=>'html',
                'options'=>['value'=>'']
            ],
            [
                'name'=>'individual_block',
                'type'=>'text'
            ],
            [
                'name'=>'individual_block_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'styrofoam_cutter',
                'type'=>'text'
            ],
            [
                'name'=>'styrofoam_cutter_total',
                'type'=>'text'
            ],
            [
                'name'=>'styrofoam_cutter_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'',
                'type'=>'html',
                'options'=>['value'=>'']
            ],
            [
                'name'=>'tin_smelter',
                'type'=>'text'
            ],
            [
                'name'=>'tin_smelter_total',
                'type'=>'text'
            ],
            [
                'name'=>'tin_smelter_year',
                'type'=>'select',
                'data'=>range(date('Y')-20, date('Y'))
            ],
            [
                'name'=>'',
                'type'=>'html',
                'options'=>['value'=>'']
            ],
            [
                'name'=>'water_bath',
                'type'=>'text'
            ],
            [
                'name'=>'water_bath_total',
                'type'=>'text'
            ],
            [
                'name'=>'water_bath_year',
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
            'thermoplastic_mask' => 'Thermoplastic Mask',
            'thermoplastic_mask_year' => 'Thermoplastic Mask Year',
            'blue_bag' => 'Blue Bag',
            'blue_bag_year' => 'Blue Bag Year',
            'leksell_g_grame' => 'Leksell G Frame',
            'leksell_g_grame_year' => 'Leksell G Frame Year',
            'headfix' => 'Headfix',
            'headfix_year' => 'Headfix Year',
            'alpha_cradle' => 'Alpha Cradle',
            'alpha_cradle_year' => 'Alpha Cradle Year',
            'other_fixation' => 'Other Fixation',
            'other_fixation_note' => 'Other Fixation Note',
            'other_fixation_year' => 'Other Fixation Year',
            'individual_block' => 'Individual Block',
            'individual_block_year' => 'Individual Block Year',
            'styrofoam_cutter' => 'Styrofoam Cutter',
            'styrofoam_cutter_total' => 'Styrofoam Cutter Total',
            'styrofoam_cutter_year' => 'Styrofoam Cutter Year',
            'tin_smelter' => 'Tin Smelter',
            'tin_smelter_total' => 'Tin Smelter Total',
            'tin_smelter_year' => 'Tin Smelter Year',
            'water_bath' => 'Water Bath',
            'water_bath_total' => 'Water Bath Total',
            'water_bath_year' => 'Water Bath Year',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }

    public function afterFind()
    {
        $this->immobilization = json_decode($this->immobilization, true);
        return parent::afterFind();
    }

    public function beforeSave($insert)
    {
        $this->immobilization = json_encode($this->immobilization);
        return parent::beforeSave($insert);
    }
}
