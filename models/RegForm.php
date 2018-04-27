<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 31.03.18
 * Time: 12:26
 */

namespace app\models;


use yii\base\Model;

class RegForm extends Model {
    public $username;
    public $password;
    public $checkpass;
    public $email;

    function attributeLabels(){
        return [
            'username' => 'Имя',
            'password' => 'Пароль',
            'checkpass' => 'Пароль еще раз',
            'email' => 'Email'
        ];
    }

    public function rules(){
        return [
            // username and password are both required
            [['username', 'password', 'checkpass', 'email'], 'required'],
            // rememberMe must be a boolean value
            ['email', 'email'],
            // password is validated by validatePassword()
        ];
    }
    protected function checkPass(){
        if($this->password == $this->checkpass){
            return true;
        }else{
            return false;
        }
    }
    public function checkUsername(){
        $model = Users::findOne(['login'=>$this->username]);

        if(!$model){
            if ($this->checkPass()){
                $saveModel = new Users();
                $saveModel->login = $this->username;
                $saveModel->pass = $this->password;
                $saveModel->email = $this->email;
                $saveModel->save();
            }

        }else{
            return false;
        }
    }
}