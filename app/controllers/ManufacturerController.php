<?php

namespace app\controllers;


use app\models\Manufacturer;
use yii\rest\ActiveController;

class ManufacturerController extends ActiveController
{
    public $modelClass = Manufacturer::class;
}