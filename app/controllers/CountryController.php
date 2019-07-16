<?php

namespace app\controllers;


use app\models\Country;
use yii\rest\ActiveController;

class CountryController extends ActiveController
{
    public $modelClass = Country::class;
}