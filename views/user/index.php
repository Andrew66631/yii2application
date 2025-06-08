<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch|null */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel ?? null,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'username',
        'email:email',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ],
]); ?>


