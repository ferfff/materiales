<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <?= Html::a('Ir a pagar', ['productos/checkout'], ['class'=>"btn btn-primary"]) ?>
        </div>
    </div>

    <?php echo "TOTAL: ". \Yii::$app->cart->getCount(); ?>
    <div class="row row-cols-1 row-cols-md-4">
        <?php 
            foreach ($products as $key => $producto) { ?>
                <div class="col mb-4">
                    <div class="card">
                        <?= Html::img('/images/'.$producto->foto, ['class' => 'card-img-top', 'alt' => "Imagen"]); ?>
                        <div class="card-body">
                            <?= Html::tag('h5', Html::encode($producto->nombre), ['class' => 'card-title']) ?>
                            <?= Html::label('Cantidad '. $producto->getQuantity(), '', ['class' => '']) ?>
                            <?= Html::tag('p', Html::encode($producto->categorias->categoria), ['class' => 'card-text']) ?>
                            <?= Html::tag('p', Html::encode($producto->descripcion), ['class' => 'card-text']) ?>
                            <?= Html::a('Ver detalle', ['productos/view', 'id' => $producto->id], ['class'=>"btn btn-primary"]) ?>
                            <?= Html::a('Eliminar', ['productos/delete-product', 'id' => $producto->id], ['class'=>"btn btn-danger"]) ?>
                        </div>
                    </div>
                </div>
            <?php }
        ?>
    </div>        

    
</div>
