<?php
namespace app\controllers;

use \Yii;
use \yii\helpers\Html;
use app\components\PostController;
use app\models\EquipmentMachine;
use app\models\EquipmentMachineSearch;
use app\models\Institution;
use app\models\InstitutionSearch;
use app\models\Externa;
use app\models\Interna;
use yii\web\ForbiddenHttpException;

class InstitutionController extends PostController{
	
	public function init()
	{
		parent::init();
		$this->setModelName('\app\models\Institution');
	}

	private function hasAccess($institution_id)
    {
        $userInstitution = \Yii::$app->user->identity->institution_id;
		
        if($userInstitution==null) return true;

        if($institution_id == $userInstitution) return true;

        return false;
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
				'attribute'=>'created_at',
			],
			[
				'class' => 'kartik\grid\ActionColumn',
				'buttons' => [
					'update' => function ($url, $model) {
						return ($this->hasAccess($model->id)) ? Html::a('<span class="fas fa-pencil-alt"></span>', $url):"";
					},
					'delete' => function ($url, $model) {
						return ($this->hasAccess($model->id)) ? Html::a('<span class="fas fa-trash-alt" data-method="post" data-confirm="Are you sure to delete this item?"></span>', $url):"";
					}
				 ],           
			]
		];   
	}

	public function actionBrachyterapy()
	{
		$model = new Institution;
		
		$searchModel = new InstitutionSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('brachyterapy',[
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'searchModel'=>$searchModel,
			]
		);
	}

	public function brachyterapyFields() {
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
				'header'=>'Brachiterapy',
				'value'=>function($model){return Html::a($model->getBrachiterapies()->count(),['brachiterapy/index','fid'=>$model->id]);},
				'format'=>'raw'
			],
		];   
	}


	public function actionMachine()
	{
		$model = new Institution;
		
		$searchModel = new InstitutionSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('machine',[
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'searchModel'=>$searchModel,
			]
		);
	}

	public function machineFields() {
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
				'header'=>'EBRT',
				'value'=>function($model){return Html::a($model->getEquipmentMachines()->count(),['equipment-machine/index','fid'=>$model->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Simulator',
				'value'=>function($model){return Html::a($model->getSupportingSimulators()->count(),['supporting-simulator/index','fid'=>$model->id]);},
				'format'=>'raw',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'CT Simulator',
				'value'=>function($model){return Html::a($model->getSupportingCtsimulators()->count(),['supporting-ctsimulator/index','fid'=>$model->id]);},
				'format'=>'raw',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Dosimeter',
				'value'=>function($model){return Html::a($model->getSupportingDosimeters()->count(),['supporting-dosimeter/index','fid'=>$model->id]);},
				'format'=>'raw',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Mouldroom',
				'value'=>function($model){return Html::a($model->supportingMouldroom->getTotal(),['supporting-mouldroom/index','fid'=>$model->id]);},
				'format'=>'raw',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Surveymeter',
				'value'=>function($model){return Html::a($model->getSupportingSurveymeters()->count(),['supporting-surveymeter/index','fid'=>$model->id]);},
				'format'=>'raw',
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'UPS',
				'value'=>function($model){return Html::a($model->getSupportingUps()->count(),['supporting-ups/index','fid'=>$model->id]);},
				'format'=>'raw',
			],
		];   
	}

	public function actionStaff()
	{
		$model = new Institution;
		
		$searchModel = new InstitutionSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('staff',[
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'searchModel'=>$searchModel,
			]
		);
	}

	public function staffFields() {
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
				'header'=>'Specialist',
				'value'=>function($model){return Html::a($model->getDoctorSpecialist()->count(),['doctor/specialist','fid'=>$model->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Consultant',
				'value'=>function($model){return Html::a($model->getDoctorConsultant()->count(),['doctor/consultant','fid'=>$model->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Staf S3/Doktor/PhD',
				'value'=>function($model){return Html::a($model->staffProfile->getS3(),['doctor/consultant','fid'=>$model->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Guru Besar',
				'value'=>function($model){return Html::a($model->staffProfile->getProfesor(),['doctor/consultant','fid'=>$model->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'dr Bedah Onkologi',
				'value'=>function($model){return Html::a($model->staffProfile->oncology_surgery,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Penyakit Dalam Konsultan Hematologi',
				'value'=>function($model){return Html::a($model->staffProfile->internist,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Patologi Anatomi',
				'value'=>function($model){return Html::a($model->staffProfile->anatomy_patology,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Obgin Konsultan Onkologi',
				'value'=>function($model){return Html::a($model->staffProfile->obgyn,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Fisikawan Medis S1',
				'value'=>function($model){return Html::a($model->staffProfile->medical_physics_s1,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Fisikawan Medis S2',
				'value'=>function($model){return Html::a($model->staffProfile->medical_physics_s2,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'PPR',
				'value'=>function($model){return Html::a($model->staffProfile->ppr,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'RTT',
				'value'=>function($model){return Html::a($model->staffProfile->rtt,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Nurse',
				'value'=>function($model){return Html::a($model->staffProfile->nurse,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Sekuriti',
				'value'=>function($model){return Html::a($model->staffProfile->security,['staff-profile/update','id'=>$model->staffProfile->id]);},
				'format'=>'raw'
			],
		];   
	}

	public function actionPatient()
	{
		$model = new Institution;
		
		$searchModel = new InstitutionSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('patient',[
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'searchModel'=>$searchModel,
			]
		);		
	}

	public function patientFields() {
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
				'header'=>'External Radiation',
				'value'=>function($model){return Html::a($model->getExternaLatest(),['externa-6-monthly/','fid'=>$model->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Brachytherapy 2D',
				'value'=>function($model){return Html::a($model->get2dRadiationLatest(),['interna/','fid'=>$model->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Brachytherapy 3D',
				'value'=>function($model){return Html::a($model->get3dRadiationLatest(),['interna/','fid'=>$model->id]);},
				'format'=>'raw'
			],
		];   
	}

	public function actionWaitingList()
	{
		$model = new Institution;
		
		$searchModel = new InstitutionSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('waiting-list',[
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'searchModel'=>$searchModel,
			]
		);		
	}

	public function waitinglistFields() {
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
				'header'=>'Externa',
				'value'=>function($model){return Html::a($model->waitingList->week_externa==null?'N/A':$model->waitingList->week_externa,['waiting-list/update','id'=>$model->waitingList->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Brachytherapy',
				'value'=>function($model){return Html::a($model->waitingList->week_brachytherapy==null?'N/A':$model->waitingList->week_brachytherapy,['waiting-list/update','id'=>$model->waitingList->id]);},
				'format'=>'raw'
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'header'=>'Update By',
				'value'=>function($model){return $model->waitingList->updated_at;},
			],
		];   
	}

	public function actionStats()
	{
		$model = new Institution;
		
		$searchModel = new InstitutionSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$year = date('Y');

		return $this->render('stats',[
			'model'=>$model,
			'year'=>$year,
			'dataProvider'=>$dataProvider,
			'searchModel'=>$searchModel,
			]
		);	
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);   
		if (!$this->hasAccess($model->id)){
			throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.')); 
		}

		return parent::actionUpdate($id);
	}

	/**
	 * API data peta
	 */
	public function actionData()
	{
		$year = date('Y');

		$institutions = Institution::find()->all();

		$data = [];
		foreach($institutions as $key=>$institution){
			$data[$key] = $institution->attributes;
			$data[$key]['stats'] = $institution->getYearlyStats($year);
		}

		return json_encode($data);
	}
	

}