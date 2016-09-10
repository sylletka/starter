<?php

namespace app\models;

use yii\base\Model;

class Site extends Model {

    public $name;
    public $description;

    public function rules()
    {
        return [
            [['name', 'description'], 'string'],
        ];
    }

    public function fields()
    {
            return ['name', 'description'];
    }

    public function attributes()
    {
            return ['name', 'description'];
    }
}

