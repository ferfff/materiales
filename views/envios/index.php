<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PostPedidos */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
?>
<div class="pedidos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(['id' => 'pedidosgrid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'headerRowOptions' => ['class' => 'header-table'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'label' => '',
                'content' => function($model) {
                    return Html::a('<span class="material-icons">Update</span>',
                        ['update', 'id' => $model->id],
                        ['class' => 'btn btn-primary d-flex align-items-center text-light btn-sm btn-fix',]
                    );
                }
            ],
            [
                'format' => 'raw',
                'label' => '',
                'content' => function($model) {
                    return Html::a('<span class="material-icons">Delete</span>',
                        ['delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-danger d-flex align-items-center text-light btn-sm btn-fix',
                            'data' => ['confirm' => '¿Estás seguro quieres eliminar este Pedido?','method' => 'post'],
                            'data-ajax' => '1',
                        ]
                    );
                }
            ],
            'id',
            'users_id',
            'precioenvio',
            'estatus',
            'direccion_envio:ntext',
            'preciototal',
            'nombre',
            'email',
            'date',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>