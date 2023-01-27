<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UserForm extends Model
{
    public $name;
    public $email;
    public $password;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['email', 'email'],
            // password is validated by validatePassword()
        ];
    }

}
