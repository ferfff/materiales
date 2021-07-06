<?php

use yii\helpers\Html;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Pedidos */
/* @var $categorias app\models\Categorias */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>

    <div class="container my-3">
        <div class="row">
            <div class="col-sm my-2 direction-l">
                <a href="index" class="text-dark">Inicio</a> <a href="productos" class="text-dark">/Poliuretanos</a>
                <span class="text_red">/ Producto Detalle</span>
            </div>
        </div>
    </div>


    <div class="container-fluid bg-white py-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-sm">

                    <!--Carousel Wrapper-->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                         data-ride="carousel">
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <?= Html::img('/images/' . $model->foto, ['class' => 'd-block w-100', 'alt' => "Imagen"]); ?>
                            </div>
                        </div>
                        <!--/.Slides-->
                    </div>
                    <!--/.Carousel Wrapper-->

                </div>
                <div class="col-sm my-2">
                    <?= Html::beginForm(['add', 'id' => 'add-to-cart'], 'post', ['enctype' => 'multipart/form-data']) ?>
                    <?= Html::tag('h2', Html::encode($model->nombre), ['class' => 'font-weight-bold']) ?>
                    <?= Html::tag('p', Html::encode($model->dimension), ['class' => '']) ?>
                    <?= Html::hiddenInput('id', $model->id, []) ?>
                    <?= Html::tag('p', Html::encode($model->descripcion), ['class' => '']) ?>
                    <label class="my-1 mr-2">Cantidad</label>
                    <?= Html::input('text', 'cantidad', '1', ['class' => 'mb-2 py-1 text-center cantidad']) ?>
                    <?= Html::submitButton('Añadir al carrito <i class="fas fa-shopping-cart"></i>', ['class' => "btn btn-primary my-1"]) ?>
                    <p class="mb-3"><b>Categoría:</b> <?= $categorias->categoria ?></p>
                    <?= Html::endForm() ?>
                </div>
            </div>
        </div>
    </div>

<?php include('carousel.php'); ?>