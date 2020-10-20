<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php echo "TOTAL: ". \Yii::$app->cart->getCount(); ?>
    <div class="body-content">
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item">
                <?= Html::a('TODOS', ['index', 'id' => 0], ['class' => 'profile-link']) ?>
            </li>
            <?php foreach ($categorias as $categoria) {
                echo '<li class="list-group-item">';
                echo Html::a($categoria->categoria, ['index', 'id' => $categoria->id], ['class' => 'profile-link']);
                echo '</li>';
            } ?>
        </ul>
            <br><br>
        <div class="row row-cols-1 row-cols-md-4">
        <?php 
            foreach ($productos as $producto) { ?>
                <div class="col mb-4">
                    <?= Html::beginForm(['add', 'id' => 'add-to-cart'], 'post', ['enctype' => 'multipart/form-data']) ?>
                        <div class="card">
                            <?= Html::img('/images/'.$producto->foto, ['class' => 'card-img-top', 'alt' => "Imagen"]); ?>
                            <div class="card-body">
                                <?= Html::tag('h5', Html::encode($producto->nombre), ['class' => 'card-title']) ?>
                                <?= Html::tag('p', Html::encode($producto->categorias->categoria), ['class' => 'card-text']) ?>
                                <?= Html::tag('p', Html::encode($producto->descripcion), ['class' => 'card-text']) ?>
                                <?= Html::a('Ver detalle', ['productos/view', 'id' => $producto->id], ['class'=>"btn btn-primary"]) ?>
                                <?= Html::hiddenInput('id', $producto->id, []) ?>
                                <?= Html::submitButton('Añadir al carrito', ['class'=>"btn btn-warning"]) ?>
                            </div>
                        </div>
                    <?= Html::endForm() ?>
                </div>
            <?php }
        ?>
        </div>
    </div>
</div>
