<?php


namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $createProduct = $auth->createPermission('addProduct');
        $createProduct->description = 'Create a product';
        $auth->add($createProduct);

        $updateProduct = $auth->createPermission('updateProduct');
        $updateProduct->description = 'Update product';
        $auth->add($updateProduct);

        $seller = $auth->createRole('seller');
        $auth->add($seller);
        $auth->addChild($seller, $createProduct);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateProduct);
        $auth->addChild($admin, $seller);

        $auth->assign($seller, 2);
        $auth->assign($admin, 1);
    }
}