<?php
namespace app\controllers;

use \Yii;
use app\components\PostDetailController;
use \yii\helpers\Html;

class SupportingMouldroomController extends PostDetailController{
	protected $title = 'Mouldroom';

	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\SupportingMouldroom');
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
				'attribute'=>'thermoplastic_mask',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'blue_bag',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'leksell_g_grame',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'headfix',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'alpha_cradle',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'other_fixation',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'attribute'=>'created_at',
			],
			$this->getActionColumn(),

		];   
	}

    public function actionIndex($fid=0)
    {
		$model = \app\models\SupportingMouldroom::find()->where(['institution_id'=>$fid])->one();
        $this->redirect(['update','id'=>$model->id]);
    }
	
    public function actionCreate($fid=0)
    {
		return null;
    }

	public function actionView($id)
    {   
		$viewFile = 'view';
		$model = $this->findModel($id);

		$primaryKeyName = $this->primaryKeyName;
        $fid = $model->$primaryKeyName;

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
            return $this->render($viewFile, [
				'formFields'=>$formFields,
                'model' => $model,
				'fid'=>$fid
            ]);
        }
    }

	/**
     * Updates an existing Item model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$updateFile = 'update';
		$viewFile = 'view';
		
        $request = Yii::$app->request;
        $model = $this->findModel($id);   
		$formFields = $model->formFields();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update #".$id,
                    'content'=>$this->renderAjax($updateFile, [
						'formFields'=>$formFields,
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) &&  $model->save() && $this->upload($model) ){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Update #".$id,
                    'content'=>$this->renderAjax($viewFile, [
						'formFields'=>$formFields,
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update #".$id,
                    'content'=>$this->renderAjax($updateFile, [
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
            if ($model->load($request->post()) &&  $model->save() && $this->upload($model) ) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render($updateFile, [
					'formFields'=>$formFields,
                    'model' => $model,
                ]);
            }
        }
    }



}