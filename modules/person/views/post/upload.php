<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 28.04.18
 * Time: 21:36
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>

<?php $img = $model->getImage()?>
<img src="<?=$img->getUrl('100x100')?>">

