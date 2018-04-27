<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/**
 * Created by PhpStorm.
 * User: max
 * Date: 09.04.18
 * Time: 20:56
 */

foreach ($correspondence as $k=>$value){
    echo "<div class='mess'>".$value->message."</div><div class='date'>".$value->date."</div><div style='clear: both'></div>";

}
?>

<?php $form = ActiveForm::begin() ?>

    <?=$form->field($send_form, 'message')->textarea(['rows'=>10]) ?>


    <?=Html::submitButton('Отправить')?>


<?php ActiveForm::end() ?>


