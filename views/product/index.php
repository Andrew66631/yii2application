<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $products app\models\Products[] */

$this->title = 'Список продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($products)): ?>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= Html::encode($product->code) ?> — <?= Html::encode($product->description) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Нет доступных продуктов.</p>
<?php endif; ?>
