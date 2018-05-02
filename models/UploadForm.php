<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 28.04.18
 * Time: 21:32
 */

namespace app\models;


use yii\base\Model;

class UploadForm extends Model{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @var UploadedFile
     */

    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }


}