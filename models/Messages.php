<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 04.04.18
 * Time: 21:58
 */

/**
 * This is the model class for table "messages".
 *
 * @property string $message
 * @property integer $dialog_id
 */

namespace app\models;


use yii\db\ActiveRecord;

class Messages extends ActiveRecord
{
    public static function tableName()
    {
        return 'messages';
    }


}