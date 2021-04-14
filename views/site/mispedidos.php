<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostPedidos */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
?>
<div class="pedidos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'estatus',
            'direccion_envio:ntext',
            [
                'attribute' => 'preciototal',
                'format' => ['decimal', 2],
            ],
            [
                'attribute' => 'precioenvio',
                'format' => ['decimal', 2],
            ],
            [
                'label' => 'Fecha',
                'attribute' => 'date',
                'format' => 'date',
            ],
        ],
    ]); ?>

</div>