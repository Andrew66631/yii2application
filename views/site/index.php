<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Главная';
?>

<div class="site-index">

    <h1>Добро пожаловать!</h1>

    <p>Выберите действие:</p>

    <div class="btn-group" role="group" aria-label="Навигация">
        <?= Html::a('Продукты', ['product/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Покупки', ['product/purchase'], ['class' => 'btn btn-success']) ?>
        <?php if (Yii::$app->user->isGuest && Yii::$app->user->can('admin')): ?>
            <?= Html::a('Пользователи', ['user/index'], ['class' => 'btn btn-warning']) ?>
        <?php endif; ?>
    </div>

</div>
