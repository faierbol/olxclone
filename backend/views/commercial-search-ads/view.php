<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CommercialSearchAds */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Commercial Search Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commercial-search-ads-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'category_id',
            'url:url',
           // 'image',
            [
		'attribute'=>'image',
		'value'=>Yii::$app->urlManager->createUrl('/commercial-search-ads/loadimage'),	
		'format'=>['image',['width'=>'130','height'=>'70', 'alt'=>'No Image']],
            ],
           // 'notes',
            //'user_id',
        ],
    ]) ?>

</div>
