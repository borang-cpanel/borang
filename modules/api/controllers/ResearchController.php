<?php
namespace app\modules\api\controllers;
use yii\rest\ActiveController;
use app\models\Research;
use yii\filters\Cors;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;

class ResearchController extends ActiveController
{
    public $modelClass = 'app\models\Research';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['view']);
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        return $actions;
    }

    public function actionIndex()
    {
        $list = Research::find()->all();
        $result = [];

        foreach($list as $item){
            $new = $item->toArray();
            $result [] = $new;
        }
        return $result;
    }

    public function actionView($id)
    {
        $item = Research::find($id)->one();
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