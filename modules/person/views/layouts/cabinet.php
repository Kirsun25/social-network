<?php
use app\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <?php $this->head() ?>
</head>
<body>
<a href="<?=\yii\helpers\Url::to(['/person']);?>">админка</a>
<?php if(!Yii::$app->user->isGuest): ?>
    <a href="<?=\yii\helpers\Url::to(['/site/logout']);?>">выйти</a>
        <li>
        <?php Html::beginForm(['/site/logout'], 'post');
         Html::submitButton('Logout (' . Yii::$app->user->identity->login . ')', ['class' => 'btn btn-link logout']);
         Html::endForm()?>
         </li>
<?php endif;?>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>