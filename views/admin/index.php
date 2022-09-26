<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Административная панель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление продуктами', ['/product']) ?>
    </p>
    <p>
        <?= Html::a('Управление заказами', ['/order']) ?>
    </p>
    <p>
        <?= Html::a('Управление пользователями', ['/user']) ?>
    </p>
</div>
