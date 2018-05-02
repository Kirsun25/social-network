<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 31.03.18
 * Time: 19:04
 */


namespace app\modules\person\controllers;

use app\models\AboutUser;
use app\models\SendForm;
use app\models\UploadForm;
use app\models\Users;
use yii\web\UploadedFile;
use Yii;



use app\models\Messages;

class PostController extends AppAdminController
{


    public function actionIndex(){
//        $model = Model::findOne(12);
//        $model->attachImage('../../image.png');

        return $this->render('index');
    }

    public function actionUpload(){

        $model = AboutUser::findOne(['user_id' => Yii::$app->user->getId()]);

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                return $this->render('upload', ['model' => $model]);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionDialogs()
    {

        $users = Users::findOne(['id' => Yii::$app->user->getId()]);

        $array[] = $users->messages;
        $latestMessagesDates = []; //массив с самыми поздними сообщениями для каждого диалога

        $dialog_id = $array[0][0]['dialog_id'];

        foreach ($users->messages as $k => $message) { //диалоги
            if ($dialog_id != $message['dialog_id']) {
                $dialog_id = $message['dialog_id'];
            }
            if (isset($latestMessagesDates[$dialog_id])){
                if ($latestMessagesDates[$dialog_id]['date'] < $message['date']){
                    $latestMessagesDates[$dialog_id] = $message;
                }
            }else{
                $latestMessagesDates[$dialog_id] = $message;
            }
        }

        return $this->render('dialogs', ['latestMessagesDates' => $latestMessagesDates]);
        }

    public function actionChat(){

        return $this->render('chat');
    }
    public function actionMessages(){
        $dialog_id = Yii::$app->request->get('d');
        $id = Yii::$app->user->getId();
        $send_form = new SendForm();
        if($send_form->load(Yii::$app->request->post()) && $send_form->validate()){
            $send_mess = new Messages();
            $send_mess->message = $send_form->message;
            $send_mess->dialog_id = $dialog_id;
            $send_mess->save();                 //кому отправить письм
            return $this->refresh();
        }


        $correspondence = Messages::findAll(['dialog_id' => $dialog_id]);


        return $this->render('messages', ['correspondence' => $correspondence, 'send_form' => $send_form]);

    }
}