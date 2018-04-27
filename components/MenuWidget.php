<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 04.04.18
 * Time: 21:31
 */
namespace app\components;

use yii\base\Widget;

class MenuWidget extends Widget{
    public function run()
    {
        return "
        <div>
            <div><a href='/person/post/dialogs'>мои сообщения</a></div>
            <div><a href='/person/post/chat'>чат</a></div>
        </div>";


    }
}