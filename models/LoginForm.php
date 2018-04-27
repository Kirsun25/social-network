<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $login;
    public $pass;
    public $rememberMe = false;
    private $_user = false;


    /**
     * @return array the validation rules.
     *
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Имя',
            'pass' => 'Пароль'
        ];
    }

    public function rules()
    {
        return [
            // username and password are both required
            [['login', 'pass'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            ['pass', 'validatePassword']
            // password is validated by validatePassword()
        ];
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->login);
        }
        return $this->_user;
    }

    public function login()
    {
        if ($this->validate()) {
            if ($this->rememberMe) {
                $u = $this->getUser();
                $u->generateAuthKey();
                $u->save();
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }


    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->pass)) {
                $this->addError($attribute, 'Неверный логин или пароль');
            }
        }
    }
}

//<?php
//namespace app\models;
//use Yii;
//use yii\base\Model;
///**
// * LoginForm is the model behind the login form.
// *
// * @property User|null $user This property is read-only.
// *
// */
//class LoginForm extends Model
//{
//    public $username;
//    public $password;
//    public $rememberMe = true;
//    private $_user = false;
//    /**
//     * @return array the validation rules.
//     */
//    public function rules()
//    {
//        return [
//            // username and password are both required
//            [['username', 'password'], 'required'],
//            // rememberMe must be a boolean value
//            ['rememberMe', 'boolean'],
//            // password is validated by validatePassword()
//            ['password', 'validatePassword'],
//        ];
//    }
//    public function attributeLabels()
//    {
//        return [
//            'username' => 'Логин',
//            'password' => 'Пароль',
//            'rememberMe' => 'Запомнить'
//        ];
//    }
//    /**
//     * Validates the password.
//     * This method serves as the inline validation for password.
//     *
//     * @param string $attribute the attribute currently being validated
//     * @param array $params the additional name-value pairs given in the rule
//     */
//    public function validatePassword($attribute, $params)
//    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Неверный логин или пароль');
//            }
//        }
//    }
//    /**
//     * Logs in a user using the provided username and password.
//     * @return bool whether the user is logged in successfully
//     */

//    /**
//     * Finds user by [[username]]
//     *
//     * @return User|null
//     */
//    public function getUser()
//    {
//        if ($this->_user === false) {
//            $this->_user = User::findByUsername($this->username);
//        }
//        return $this->_user;
//    }
//}