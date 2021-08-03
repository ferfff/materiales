<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $productos [] */
/* @var $productosTop [] */
/* @var $categoriaName string */

?>
<!-- Banner -->
<div class="container-fluid banner_home">
    <div class="container">
        <div class="row align_items">
            <div class="col-lg-6 mb-3">
                <h1 class="light-header">Todo lo que necesitas <span class="red_bold">en un solo lugar</span></h1>
                <p class="p_banner">Contamos con una gran variedad de marcas, productos, excelente servicio
                    personalizado y asesorías. </p>
            </div>
            <div class="col-lg-6 text-center">
                <img class="materiales_header" src="../img/materiales_home.png">
            </div>
        </div>
    </div>
</div>

<h2 class="header_30">Más vendidos</h2>

<!-- Productos -->
<div class="container border-bottom pb-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
        <?php
        foreach ($productosTop as $productoTop) { ?>
            <?= Html::beginForm(['add', 'id' => 'add-to-cart'], 'post', ['enctype' => 'multipart/form-data']) ?>
            <div class="col mb-3  h-100">
                <div class="card h-100 mb-3">
                    <div class="row no-gutters direction-l">
                        <div class="col-md-4">
                            <?= Html::img('/images/' . $productoTop->foto, ['class' => 'card-img-top', 'alt' => "Imagen"]); ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <?= Html::tag('h5', Html::encode($productoTop->nombre), ['class' => 'header_product']) ?>
                                <?= Html::tag('p', Html::encode($productoTop->descripcion), ['class' => 'p_descripcion mb-3']) ?>
                                <?= Html::a('Ver detalle', ['site/detalle', 'id' => $productoTop->id], ['class' => "btn btn-primary btn-sm my-2"]) ?>
                                <?= Html::hiddenInput('id', $productoTop->id, []) ?>
                                <?= Html::submitButton('Añadir al carrito', ['class' => "btn btn-warning btn-sm"]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= Html::endForm() ?>
        <?php }
        ?>
    </div>
</div>

<!-- icon -->
<div class="container atencion rounded mb-5">
    <div class="row">
        <div class="col-md-4 col-lg-4 my-4">
            <img class="icon mb-3" src="/img/atencion.svg" alt="">
            <p> Atención telefónica</p>
        </div>
        <div class="col-md-4 col-lg-4 my-4">
            <img class="icon mb-3" src="/img/devolucion.svg" alt="">
            <p> Tienes 30 días para devolver tu producto</p>
        </div>
        <div class="col-md-4 col-lg-4 my-4">
            <img class="icon mb-3" src="/img/pago.svg" alt="">
            <p> Pagos 100% seguros</p>
        </div>

    </div>
</div>

<h2 class="header_30"><?= $categoriaName ?></h2>

<!-- Products -->
<nav class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
        <?php
        foreach ($productos as $producto) { ?>
            <?= Html::beginForm(['add', 'id' => 'add-to-cart'], 'post', ['enctype' => 'multipart/form-data']) ?>
            <div class="col mb-3">
                <div class="card text-center h-100">
                    <div class="card-body h-100">
                        <?= Html::img('/images/' . $producto->foto, ['class' => 'card-img-top img_product mb-2', 'alt' => "Imagen"]); ?>
                        <?= Html::tag('h5', Html::encode($producto->nombre), ['class' => 'header_product']) ?>
                        <?= Html::tag('p', Html::encode($producto->descripcion), ['class' => 'p_descripcion']) ?>
                        <?= Html::a('Ver detalle <i class="fas fa-angle-right"></i>', ['site/detalle', 'id' => $producto->id], ['class' => "btn btn-primary my-2 btn-block btn-bg"]) ?>
                        <?= Html::hiddenInput('id', $producto->id, []) ?>
                        <?= Html::input('text', 'cantidad', '1', ['class' => 'mb-2 text-center cantidad']) ?>
                        <?= Html::submitButton('Añadir al carrito <i class="fas fa-shopping-cart"></i>', ['class' => "btn btn-warning btn-block btn-bg"]) ?>
                    </div>
                </div>
            </div>
            <?= Html::endForm() ?>
        <?php }
        ?>
    </div>

    <?php
    echo LinkPager::widget([
        'pagination' => $pagination,
        'linkOptions' => ['class' => 'page-link'],
        'hideOnSinglePage' => 1,
        'disabledPageCssClass' => 'page-link',
        'disableCurrentPageButton' => 1,
        'nextPageLabel' => 'Siguiente',
        'prevPageLabel' => 'Anterior',
        'options' => [
            'class' => 'pagination justify-content-center',
        ],
    ]);
    ?>

