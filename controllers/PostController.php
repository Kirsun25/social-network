<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 29.03.18
 * Time: 17:04
 */

namespace app\controllers;
use app\models\LoginForm;
use app\models\RegForm;
use app\models\Users;
use Yii;

class PostController extends AppController{
    public function actionIndex(){
//        if (!Yii::$app->user->isGuest){
//            return $this->goHome();
//        }
////        $user = new Users();
//        $model = new LoginForm();
//        if($model->load(Yii::$app->request->post()) && $model->validate()){
//            if($user = Users::findOne(['login' => $model->username, 'pass' => $model->password]) ){
//                return Yii::$app->response->redirect('http://soc/post/my-profile', 301)->send();
//            }else{
//                $error = "Логин или пароль не верны";
//                return $this->render('index', ['error'=>$error]);
//            }
//        }
//        else{
            return $this->render('index');
        }

//    }

    public function actionRegistration(){
        $model = new RegForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->checkUsername();
        }else{
            $error = "Ошибка";
            return $this->render('registration', ['model'=>$model, 'error' => $error]);
        }

        return $this->render('registration', ['model'=>$model]);
    }

    public function actionMyProfile(){
        $var = 'variable';
        return $this->render('my-profile', ['var'=>$var]);
    }
}