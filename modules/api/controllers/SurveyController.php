<?php
namespace app\modules\api\controllers;
use yii\rest\ActiveController;
use \app\models\Survey;
use yii\filters\Cors;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;

class SurveyController extends ActiveController
{
    public $modelClass = 'app\models\Survey';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['view']);
        unset($actions['update']);
        unset($actions['delete']);
        return $actions;
    }

    protected function verbs(){
        return [
            'create' => ['POST','OPTIONS'],
        ];
    }

    public function actionCreate()
    {
        
        $model = new Survey;

        $result =  file_get_contents('php://input');
        $post = json_decode($result);
        
        if($post){
            $model->type = $post->type;
            $model->alias = $post->alias;
            $model->gender = $post->gender;
            $model->degree= $post->degree;
            $model->marital_status = $post->marital_status;
            $model->job = $post->job;
            $model->answer = json_encode($post->answer);
            $model->score = $post->score;
            $model->created_at = date('Y-m-d H:i:s');
            $model->publish = 10; //artinya published

            if ($model->save()){
                return [
                    'status'=>'200',
                    'message'=>'OK',
                ];
            }
        }

        return [
            'status'=>'500',
            'message'=>$model->getErrors()
        ];
    }

    public function behaviors() {
        $behaviors = parent::behaviors();

        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['http://localhost:8100','http://localhost'], //wajib nama localhost
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
            ],
        ];

        // $behaviors['authenticator'] = [
        //     'class' =>  HttpBearerAuth::className(),
        //     'except' => ['options','login'],
        // ];

        return $behaviors;
    }
}