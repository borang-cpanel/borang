<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "waiting_list".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $period
 * @property int $week
 * @property string $type
 * @property int $total
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class WaitingList extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'waiting_list';
    }

    public static function createNew($institution_id)
    {
        $model = new WaitingList;
        $model->institution_id = $institution_id;
        $model->week_externa = null;
        $model->week_brachytherapy = null;
        $model->save();
    }

    public function formFields()
    {
        return [
            [
                'name'=>'week_externa',
                'type'=>'select',
                'data'=>range(0,52)
            ],
            [
                'name'=>'week_brachytherapy',
                'type'=>'select',
                'data'=>range(0,52)
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id'], 'required'],
            [['institution_id', 'week_externa', 'week_brachytherapy', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 200],
            [['created_at','created_by','updated_at','updated_by'], 'safe'],
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
            'week_externa'=>'Week Externa',
            'week_brachytherapy'=>'Week Brachytherapy',
            'type' => 'Type',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
