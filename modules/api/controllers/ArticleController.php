<?php
namespace app\modules\api\controllers;
use yii\rest\ActiveController;

use yii\filters\Cors;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;


class ArticleController extends ActiveController
{
    public $modelClass = 'app\models\Article';

    public function actionIndex($catid)
    {
        $list = Article::find()->where(['type'=>$catid])->andWhere(['publish'=>Article::STATUS_PUBLISH])->all();
        $result = [];

        foreach($list as $item){
            $new = $item->toArray();
            $result [] = $new;
        }
        return $result;
    }

    public function actionView($id)
    {
        $item = Article::find($id)->one();
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