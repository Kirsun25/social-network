<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 02.04.18
 * Time: 18:10
 */

namespace app\modules\person\controllers;



use yii\filters\AccessControl;
use yii\web\Controller;

class AppAdminController extends Controller{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
}