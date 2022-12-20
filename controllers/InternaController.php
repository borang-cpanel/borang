<?php
namespace app\controllers;

use app\components\PostDetailController;

class InternaController extends PostDetailController{
	protected $title = 'Patient Interna';
	
	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\Interna');
		$this->setPrimaryKeyName('institution_id');
		$this->setMainPageLink(['institution/patient']);
	}

	public function indexFields() {
		return [
			[
				'class' => 'kartik\grid\CheckboxColumn',
				'width' => '20px',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'period',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'radiation_2d',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'radiation_3d',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

}