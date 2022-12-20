<?php
namespace app\controllers;

use app\components\PostDetailController;

class SupportingDosimeterController extends PostDetailController{
	protected $title = 'Dosimeter';
	
	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\SupportingDosimeter');
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
				'attribute'=>'year',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

}