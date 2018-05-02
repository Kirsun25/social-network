<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11.04.18
 * Time: 14:58
 */

namespace app\models;


use yii\base\Model;

class SendForm extends Model
{
    public $message;

//    public function attributeLabels()
//    {
//        return [
//          'message' => 'Сообщение'
//        ];
//    }
    public function rules()
    {
        return [
            [['message'], 'required'],
            ['message', 'string', 'min' => 5]
        ];
    }


}