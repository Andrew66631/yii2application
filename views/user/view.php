<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = 'Детали пользователя: ' . $user->username;
?>
<h1><?= Html::encode($this->title) ?></h1>

<p><strong>Имя пользователя:</strong> <?= Html::encode($user->username) ?></p>
<p><strong>Email:</strong> <?= Html::encode($user->email) ?></p>

<p>
    <?= Html::a('Редактировать', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Назад к списку', ['index'], ['class' => 'btn btn-default']) ?>
</p>
