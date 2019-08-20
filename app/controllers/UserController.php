<?php


namespace app\controllers;


use app\models\User;
use yii\base\Module;
use app\services\UserService;
use yii\web\NotFoundHttpException;

class UserController extends ApiController
{
    private $users;
    public $modelClass = User::class;

    public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['login'];
        return $behaviors;
    }

    public function actionLogin()
    {
        $token = $this->users->authenticate(
            \Yii::$app->request->post('username'),
            \Yii::$app->request->post('password')
        );
        if ($token) {
            return ['access_token' => $token];
        }
        return new NotFoundHttpException();
    }

    public function actionProfile()
    {
        return \Yii::$app->user->identity;
    }

    public function __construct(string $id, Module $module, UserService $userService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->users = $userService;
    }
}