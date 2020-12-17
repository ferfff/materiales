<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

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
            <div class="col-lg-6">
                <img src="../img/banner_home.png" width="100%">
            </div>
        </div>
    </div>
</div>

<h2 class="header_30">Te pueden interesar</h2>

<!-- Productos -->
<div class="container border-bottom pb-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
        <div class="col mb-3">
            <div class="card h-100 mb-3">
                <div class="row no-gutters direction-l">
                    <div class="col-md-4">
                        <img src="../img/producto.jpg" class="card-img-top" alt="producto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="header_product">Studio Design</h5>
                            <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                            <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                            <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100 mb-3">
                <div class="row no-gutters direction-l">
                    <div class="col-md-4">
                        <img src="../img/producto.jpg" class="card-img-top" alt="producto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="header_product">Studio Design</h5>
                            <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                            <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                            <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100 mb-3">
                <div class="row no-gutters direction-l">
                    <div class="col-md-4">
                        <img src="../img/producto.jpg" class="card-img-top" alt="producto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="header_product">Studio Design</h5>
                            <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                            <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                            <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <div class="row no-gutters direction-l">
                    <div class="col-md-4">
                        <img src="../img/producto.jpg" class="card-img-top" alt="producto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="header_product">Studio Design</h5>
                            <p class="p_descripcion mb-3">New Balance Fresh Foam LAZR v1 Sport</p>
                            <button type="button" class="btn btn-primary rounded-pill btn-sm my-2">Ver detalle</button>
                            <button type="button" class="btn btn-warning rounded-pill btn-sm">Añadir al
                                carrito</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
        <?php
        foreach ($productos as $producto) { ?>
            <?= Html::beginForm(['add', 'id' => 'add-to-cart'], 'post', ['enctype' => 'multipart/form-data']) ?>
            <div class="col mb-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <?= Html::img('/images/' . $producto->foto, ['class' => 'card-img-top', 'alt' => "Imagen"]); ?>
                        <?= Html::tag('h5', Html::encode($producto->nombre), ['class' => 'header_product']) ?>
                        <?= Html::tag('p', Html::encode($producto->descripcion), ['class' => 'p_descripcion']) ?>
                        <?= Html::a('Ver detalle <i class="fas fa-angle-right"></i>', ['productos/view', 'id' => $producto->id], ['class' => "btn btn-primary rounded-pill my-2"]) ?>
                        <?= Html::hiddenInput('id', $producto->id, []) ?>
                        <?= Html::submitButton('Añadir al carrito <i class="fas fa-shopping-cart"></i>', ['class' => "btn btn-warning rounded-pill"]) ?>
                    </div>
                </div>
            </div>
            <?= Html::endForm() ?>
        <?php }
        ?>
    </div>
</div>
