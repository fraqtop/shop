<?php


namespace app\controllers;


use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class
        ];
        return $behaviors;
    }
}