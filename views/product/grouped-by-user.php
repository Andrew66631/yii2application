<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $grouped array */

$this->title = 'Покупки по пользователям';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($grouped)): ?>
    <?php foreach ($grouped as $username => $products): ?>
        <h3>
            <?= Html::encode($username) ?>
            <?= Html::a('Посмотреть покупки', ['view', 'userId' => $products[0]->purchasedProducts[0]->user_id], ['class' => 'btn btn-sm btn-primary']) ?>
        </h3>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><?= Html::encode($product->code) ?> — <?= Html::encode($product->description) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
<?php else: ?>
    <p>Нет данных о покупках.</p>
<?php endif; ?>
