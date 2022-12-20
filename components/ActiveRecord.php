<?php

namespace app\components;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use app\components\BaseActiveRecord;
use yii\db\Expression;
use app\models\User;

/**
 * Kelas active record dasar untuk semua active record yang ada
 * Semua model harus ada field publish, created_at, created_by, updated_at, updated_by
 */
abstract class ActiveRecord extends BaseActiveRecord {

	

	public function beforeSave($insert)
	{
		//Kalau field ini ada institution_id-nya maka hanya user yang institution id yang matching yang berhak edit-edit
		/*if(\Yii::$app->user->identity->institution_id != null && $this->hasAttribute('institution_id')){
			if ($this->institution_id != \Yii::$app->user->identity->institution_id) {
				$this->addError('institution_id', 'Anda tidak berhak edit file ini');
				return;
			}
		}*/

		return parent::beforeSave($insert);
	}
	
	public function beforeValidate()
	{
		//Kalau field ini ada institution_id-nya maka hanya user yang institution id yang matching yang berhak edit-edit
		/*if(\Yii::$app->user->identity->institution_id != null && $this->hasAttribute('institution_id')){
			if ($this->institution_id != \Yii::$app->user->identity->institution_id) {
				$this->addError('institution_id', 'Anda tidak berhak edit file ini');
				return;
			}
		}*/
		
		return parent::beforeValidate();
	}
	
	
}
