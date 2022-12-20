<?php

namespace app\components;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\rbac\Item;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;

/**
 * Kelas khusus untuk memungkinkan membuat form cukup dengan minimal coding
 * Dengan pakai ini kelas tidak perlu generate view banyak-banyak. Cukup satu kelas 
 * untuk semuanya
 * Class ini khusus untuk detail dari suatu master. Misalnya satu Institution punya banyak equipment
 * Ini untuk Equipment-nya
 * Pakai $fid untuk merujuk kelas master.   
 * 
 */
abstract class PostDetailController extends PostController{
	//Nama class model yang menjadi target
	private $modelName;
	private $searchModelName;

    //nama field perujuk master
    private $primaryKeyName;

	//link ke main page utama (karena post detail itu adalah detail dari suatu master)
	private $mainPageLink;
	
	public $formView='\app\components\views\form';
	public $indexView='\app\components\views\index';
	
	//Target folder by default. Kamu bisa overwrite target per field dengan cara 
	//tambah parameter 'uploadFolder' saat setting di formFields(). 
	//Harap jangan lupa pasang @webroot 
	public $defaultUploadFolder = '@webroot/upload';
	
    public function setModelName($modelName, $searchModelName=null)
	{
		$this->modelName = $modelName;
        

		if($searchModelName==null){
			$searchModelName = $modelName.'Search';
		}
		$this->searchModelName = $searchModelName;

        //set kelas parent
        parent::setModelName($modelName, $searchModelName);
	}
	
    public function setPrimaryKeyName($fieldname)
    {
        $this->primaryKeyName = $fieldname;
    }

	public function getPrimaryKeyName()
    {
        return $this->primaryKeyName;
    }

	public function setMainPageLink($link)
    {
        $this->mainPageLink = $link;
    }

	public function getMainPageLink()
    {
        return $this->mainPageLink;
    }
	
    private function hasAccess($institution_id)
    {
        $userInstitution = \Yii::$app->user->identity->institution_id;
        if($userInstitution==null) return true;

        if($institution_id == $userInstitution) return true;

        return false;
    }
	
	public function actionIndex($fid=0)
    {    
		$viewFile = '@app/components/views/post-detail/index';
		
		$modelName = $this->modelName;
		$model = new $modelName;

		$searchModelName = $this->searchModelName;
        $searchModel = new $searchModelName;
        $primaryKeyName = $this->primaryKeyName;
        $searchModel->$primaryKeyName = $fid;

        $queryParams = Yii::$app->request->queryParams;
        $queryParams['EquipmentMachineSearch'][$primaryKeyName] = $fid;
		
        $dataProvider = $searchModel->search($queryParams);
        
        return $this->render($viewFile, [
            'fid'=>$fid,
			'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	 /**
     * Creates a new model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($fid=0)
    {
		if (!$this->hasAccess($fid)){
			throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.')); 
		}

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
                return $this->redirect(['index','fid'=>$fid]);
            } else {
                return $this->render($viewFile, [
					'formFields'=>$formFields,
                    'model' => $model,
                ]);
            }
        }
       
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (!$this->hasAccess($model->institution_id)){
			throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.')); 
		}

        return parent::actionUpdate($id);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (!$this->hasAccess($model->institution_id)){
			throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.')); 
		}

        return parent::actionDelete($id);
    }

	public function actionView($id)
    {   
		$viewFile = '@app/components/views/post-detail/view';
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
	* Fungsi aturan render form.
	 * Field ini akan ambil dari ActiveRecord. Tapi user bisa override di level Controller. 
	 * Cukup return array berupa nama field di model beberapa atribute maka dia bisa generate sendiri. 
	 * By default akan anggap text field. 
	 * Contoh: 
	 * return [
	 *	'name',
	 *	'category_id'=>['label'=>'Category', 'type'=>'select']
	 * ];
	*/
	public function formFields()
	{
		$modelName = $this->modelName;
		$model = new $modelName;
		
		return $model->formFields();
	}

    protected function getActionColumn()
	{
		return [
            'class' => 'kartik\grid\ActionColumn',
            'buttons' => [
                'update' => function ($url, $model) {
                    return ($this->hasAccess($model->institution_id)) ? Html::a('<span class="fas fa-pencil-alt"></span>', $url):"";
                },
                'delete' => function ($url, $model) {
                    return ($this->hasAccess($model->institution_id)) ? Html::a('<span class="fas fa-trash-alt" data-method="post" data-confirm="Are you sure to delete this item?"></span>', $url):"";
                }
             ],           
        ];
	}
}
