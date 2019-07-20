<?php

namespace app\controllers;


use app\models\Manufacturer;

class ManufacturerController extends BearerController
{
    public $modelClass = Manufacturer::class;
}