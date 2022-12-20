<?php
namespace app\controllers;

use app\components\PostDetailController;

class BrachiterapyController extends PostDetailController{
	
	protected $title = 'Brachyterapy';

	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\Brachiterapy');
		$this->setPrimaryKeyName('institution_id');
		$this->setMainPageLink(['institution/brachyterapy']);
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