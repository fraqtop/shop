<?php

namespace app\controllers;


use app\models\Product;
use yii\rest\ActiveController;

class ProductController extends ApiController
{

    public $modelClass = Product::class;
}