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



    public function getMessages(){
        return $this->hasMany(Messages::class, ['dialog_id'=>'dialog_id']);
    }



}