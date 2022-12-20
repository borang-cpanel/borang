<?php
namespace app\controllers;

use app\components\PostDetailController;

class StaffProfileController extends PostDetailController{
	protected $title = 'Staff Profile';

	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\StaffProfile');
		$this->setPrimaryKeyName('institution_id');
	}

	public function indexFields() {
		return [
			[
				'class' => 'kartik\grid\CheckboxColumn',
				'width' => '20px',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'medical_physics_s1',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'medical_physics_s2',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'ppr',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'rtt',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'nurse',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

}