<?php

namespace app\controllers;


use app\models\Category;

class CategoryController extends BearerController
{
    public $modelClass = Category::class;
}