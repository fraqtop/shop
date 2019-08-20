<?php

namespace app\controllers;


use app\models\Manufacturer;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ManufacturerController extends ApiController
{
    public $modelClass = Manufacturer::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function () {
            $query = $this->modelClass::find();
            return new ActiveDataProvider([
                'query' => $query->andWhere(\Yii::$app->request->queryParams),
            ]);
        };
        return $actions;
    }
}