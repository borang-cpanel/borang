<?php
namespace app\controllers;

use \Yii;
use app\components\PostDetailController;

class DoctorController extends PostDetailController{
	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\Doctor');
		$this->setPrimaryKeyName('institution_id');
		$this->setMainPageLink(['institution/staff']);
	}

	public function indexFields() {
		return [
			[
				'class' => 'kartik\grid\CheckboxColumn',
				'width' => '20px',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'name',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'type',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

	public function actionConsultant($fid)
	{
 
		$viewFile = '@app/components/views/post-detail/index';
		
		$modelName = $this->modelName;
		$model = new $modelName;

		$searchModelName = $this->searchModelName;
        $searchModel = new $searchModelName;
        $primaryKeyName = $this->primaryKeyName;
        $searchModel->$primaryKeyName = $fid;
		
		$params = Yii::$app->request->queryParams;
		$params['DoctorSearch']['type'] = 'Consultant'; 
        $dataProvider = $searchModel->search($params);
		
        
        return $this->render($viewFile, [
            'fid'=>$fid,
			'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

	public function actionSpecialist($fid)
	{
		$viewFile = '@app/components/views/post-detail/index';
		
		$modelName = $this->modelName;
		$model = new $modelName;

		$searchModelName = $this->searchModelName;
        $searchModel = new $searchModelName;
        $primaryKeyName = $this->primaryKeyName;
        $searchModel->$primaryKeyName = $fid;
		
		$params = Yii::$app->request->queryParams;
		$params['DoctorSearch']['type'] = 'Specialist'; 
        $dataProvider = $searchModel->search($params);
		
        
        return $this->render($viewFile, [
            'fid'=>$fid,
			'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

}