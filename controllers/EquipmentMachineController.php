<?php
namespace app\controllers;

use app\components\PostDetailController;

class EquipmentMachineController extends PostDetailController{
	
	protected $title = 'EBRT';
	
	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\EquipmentMachine');
		$this->setPrimaryKeyName('institution_id');
		$this->setMainPageLink(['institution/machine']);
	}

	public function indexFields() {
		return [
			[
				'class' => 'kartik\grid\CheckboxColumn',
				'width' => '20px',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'machineName',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

}