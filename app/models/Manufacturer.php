<?php

namespace app\models;


use yii\db\ActiveRecord;

class Manufacturer extends ActiveRecord
{
    public static function tableName()
    {
        return 'manufacturers';
    }

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['countryId']);
        $fields['country'] = function () {
            return $this->country->name;
        };
        return $fields;
    }

    public function getCountry()
    {
        return $this::hasOne(Country::class, ['id' => 'countryId']);
    }
}