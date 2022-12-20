<?php
namespace app\modules\api\controllers;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;


class MediaController extends ActiveController
{
    public $modelClass = 'app\models\Media';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        return $actions;
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