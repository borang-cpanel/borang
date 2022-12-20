<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_tps".
 *
 * @property int $id
 * @property int $equipment_machine_id
 * @property string $type
 * @property int $year
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $publish
 */
class EquipmentTps extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_tps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_machine_id', 'type', 'year'], 'required'],
            [['equipment_machine_id', 'year', 'created_by', 'updated_by', 'publish'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    public function formFields()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment_machine_id' => 'Equipment ID',
            'type' => 'Type',
            'year' => 'Year',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'publish' => 'Publish',
        ];
    }
}
