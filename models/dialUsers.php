<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 14.04.18
 * Time: 19:22
 */

namespace app\models;


use yii\db\ActiveRecord;

class dialUsers extends ActiveRecord
{
    public static function tableName()
    {
        return 'dialogs_users';
    }

//    public function getUsers(){
//        return $this->hasOne(Users::class, ['id'=>'users_id']);
//    }
//
//    public function getMessages(){
//        return $this->hasOne(Messages::class, ['dialog_id'=>'dialog_id']);
//    }

//    public function returnLastMes($model){
//        foreach ($model as $key=>$value){
//          max()
//        }
//    }

    public function getMessages(){
        return $this->hasMany(Messages::class, ['dialog_id'=>'dialog_id']);
    }



}