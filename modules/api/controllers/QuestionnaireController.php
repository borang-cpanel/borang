<?php
namespace app\modules\api\controllers;
use yii\rest\ActiveController;
use app\models\Questionnaire;
use yii\filters\Cors;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;


class QuestionnaireController extends ActiveController
{
    public $modelClass = 'app\models\Questionnaire';

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

    public function actionIndex($catid)
    {
        $list = Questionnaire::find()->where(['type'=>$catid])
            ->andWhere(['<','id',5])
            ->andWhere(['publish'=>Questionnaire::STATUS_PUBLISH])->all();
        $result = [];

        foreach($list as $item){
            $new = $item->toArray();
            $result [] = $new;
        }
        return $result;
    }

    public function actionView($id)
    {
        $item = Questionnaire::find($id)->one();
        return $item->toArray();
    }

    public function behaviors() {
        $behaviors = parent::behaviors();

        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['http://localhost', 'http://localhost:8100'], //wajib nama localhost
                'Access-Control-Request-Method' => ['GET', 'POST', 'OPTIONS'],
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