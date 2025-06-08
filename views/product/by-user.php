<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $products app\models\Products[] */

$this->title = 'Покупки пользователя: ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Покупки по пользователям', 'url' => ['purchase']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($product)): ?>
    <ul>
        <?php foreach ($product as $value): ?>
            <li><?= Html::encode($value->code) ?> — <?= Html::encode($value->description) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Пользователь не совершал покупок.</p>
<?php endif; ?>