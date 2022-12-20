<?php
namespace app\controllers;

use \Yii;
use app\components\PostDetailController;

class ExternaController extends PostDetailController{
	protected $title = 'Patient Externa';
	protected $periodType = '';

	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\Externa');
		$this->setPrimaryKeyName('institution_id');
		$this->setMainPageLink(['institution/patient']);

	}

	public function getTitle()
	{
		return $this->title .' '. $this->periodType;
	}

	public function actionPeriod($fid=0)
	{

		return $this->render('period',['fid'=>$fid]);
	}

	public function actionIndex($fid=0, $type='Monthly')
	{
		$viewFile = '@app/components/views/post-detail/index';
		
		$modelName = $this->modelName;
		$model = new $modelName;

		$searchModelName = $this->searchModelName;
        $searchModel = new $searchModelName;
        $primaryKeyName = $this->primaryKeyName;
        $searchModel->$primaryKeyName = $fid;
		
		$this->periodType = $type;

		$queryParams = Yii::$app->request->queryParams;
		$queryParams['ExternaSearch']['period_type'] = $type; 
		
        $dataProvider = $searchModel->search($queryParams);
        
        return $this->render($viewFile, [
            'fid'=>$fid,
			'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
				'attribute'=>'radiation_imrt',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'radiation_vmat',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'radiation_srt',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'radiation_srs',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'radiation_sbrt',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'radiation_igrt',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

}