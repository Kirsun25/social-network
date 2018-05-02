<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 29.04.18
 * Time: 17:36
 */

namespace app\models;


use yii\db\ActiveRecord;

class AboutUser extends ActiveRecord{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){
        return "about_user";
    }

    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            $path ='uploads/orig_avatars/' . $this->imageFile->baseName . date("dmY-His") .'.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }




}