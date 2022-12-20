<?php
namespace app\controllers;

use app\components\PostDetailController;
use yii\helpers\Html;
use \Yii;

class WaitingListController extends PostDetailController{
	
	protected $title = 'Waiting List';

	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\WaitingList');
		$this->setPrimaryKeyName('institution_id');
		$this->setMainPageLink(['institution/waiting-list']);
	}

	public function actionExterna($fid)
	{
		$viewFile = '@app/components/views/post-detail/index';
		$modelName = $this->modelName;
		$model = new $modelName;

		$searchModelName = $this->searchModelName;
        $searchModel = new $searchModelName;
        $primaryKeyName = $this->primaryKeyName;
        $searchModel->$primaryKeyName = $fid;
		
		
		$queryParams = Yii::$app->request->queryParams; 
		$queryParams['WaitingListSearch']['type'] = 'Externa';
        $dataProvider = $searchModel->search($queryParams);
        
        return $this->render($viewFile, [
            'fid'=>$fid,
			'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

	public function actionBrachytherapy($fid)
	{
		$viewFile = '@app/components/views/post-detail/index';
		$modelName = $this->modelName;
		$model = new $modelName;

		$searchModelName = $this->searchModelName;
        $searchModel = new $searchModelName;
        $primaryKeyName = $this->primaryKeyName;
        $searchModel->$primaryKeyName = $fid;
		
		
		$queryParams = Yii::$app->request->queryParams; 
		$queryParams['WaitingListSearch']['type'] = 'Brachytherapy';
        $dataProvider = $searchModel->search($queryParams);
        
        return $this->render($viewFile, [
            'fid'=>$fid,
			'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

	public function actionCreate($fid=0)
    {
		$viewFile = '@app/components/views/post/create';
		
        $request = Yii::$app->request;
        
		$className = $this->modelName;
		$model = new $className;
        $primaryKeyName = $this->primaryKeyName;
        $model->$primaryKeyName = $fid;
		
		$formFields = $this->formFields();
	
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){

                return [
                    'title'=> "Create",
                    'content'=>$this->renderAjax($viewFile, [
						'formFields'=>$formFields,
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save() && $this->upload($model) ){
				
				return [
					'forceReload'=>'#crud-datatable-pjax',
					'title'=> "Create",
					'content'=>'<span class="text-success">Create success</span>',
					'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
							Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

				];         
			}else{           
				return [
					'title'=> "Create",
					'content'=>$this->renderAjax($viewFile, [
						'formFields'=>$formFields,
						'model' => $model,
					]),
					'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
								Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])

				];   
			}
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save() && $this->upload($model)) {
                return $this->redirect(['institution/waiting-list']);
            } else {
                return $this->render($viewFile, [
					'formFields'=>$formFields,
                    'model' => $model,
                ]);
            }
        }
       
    }

	/**
     * Displays a single Item model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
		$model = $this->findModel($id);

		$formFields = $model->formFields();

		$footer = Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]);
			
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "#".$id,
                    'content'=>$this->renderAjax($viewFile, [
						'formFields'=>$formFields,
                        'model' => $model,
                    ]),
					'forceReload'=>'#crud-datatable-pjax',
                    'footer'=> $footer
                ];    
        }else{
            return $this->render('view', [
				'formFields'=>$formFields,
                'model' => $model,
            ]);
        }
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
				'attribute'=>'month',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'week',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'total',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

}