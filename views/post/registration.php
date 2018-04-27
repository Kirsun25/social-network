<?php
echo @$error;
debug($model);
?>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username') ?>

<?= $form->field($model, 'password') ?>

<?= $form->field($model, 'checkpass') ?>

<?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="form-group">
        <?= Html::a('Зарегистрироваться', '/post/registration', ['class' => 'btn btn-info']) ?>
    </div>
    <div class="form-group">
        <?= Html::a('Войти', '/post/index', ['class' => 'btn btn-info']) ?>
    </div>
<?php ActiveForm::end(); ?>