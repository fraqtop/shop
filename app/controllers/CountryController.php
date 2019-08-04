<?php

namespace app\controllers;


use app\models\Country;

class CountryController extends ApiController
{
    public $modelClass = Country::class;
}