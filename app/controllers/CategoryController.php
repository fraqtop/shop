<?php

namespace app\controllers;


use app\models\Category;

class CategoryController extends ApiController
{
    public $modelClass = Category::class;
}