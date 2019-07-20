<?php

namespace app\controllers;


use app\models\Country;

class CountryController extends BearerController
{
    public $modelClass = Country::class;
}