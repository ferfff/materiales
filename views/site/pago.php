<?php

use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;

YiiAsset::register($this);
?>
    <div class="container my-3">
        <div class="row">
            <div class="col-sm my-2 direction-l">
                <a href="index" class="text-dark">Inicio</a> <a href="index" class="text-dark">Carrito</a> <span
                        class="text_red">/ Pago</span>
            </div>
            <div class="col-sm direction-r my-2">
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="row __confirmar">
                <div class="col-lg-8">
                    <?php foreach ($cartPositions as $cartPosition) { ?>
                        <div class="card mb-3">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-md-2">
                                    <img src="/img/producto.jpg" class="card-img" alt="producto">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body direction-l">
                                        <h5 class="card-title font-weight-bold">Nombre del producto</h5>
                                        <p class="card-text">$0.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <a href="carrito"><p class="text_red my-5"><i class="fas fa-angle-left"></i> Regresar un paso atrás
                        </p></a>
                </div>

                <div class="col-lg-4 mb-5">
                    <div class="card bg-light py-3 mb-3">
                        <div class="col mb-3">
                            <h4 class="font-weight-bold text_red">Información de Envío</h4>
                            <p><?= $dataEnvio['nombre'] ?></p>
                            <p><?= $dataEnvio['email'] ?></p>
                            <p><?= $dataEnvio['direccion'] ?></p>
                            <p><?= $dataEnvio['ciudad'] ?></p>
                            <p><?= $dataEnvio['cp'] ?></p>
                            <p><?= $sucursalId ?></p>
                        </div>
                    </div>
                    <div class="card bg-light py-3 my-3">
                        <form id="select-sucursal" action="/site/pago" method="post">
                            <div class="col">
                                <?= Html::csrfMetaTags() ?>
                                <label for="inputSucursal" class="form-label"><b>Importante seleccionar tu sucursal</b></label>
                                <select name="inputSucursal" id="inputSucursal" class="form-select">
                                    <option value="0">Sucursal</option>
                                    <?php foreach ($sucursales as $sucursal) {
                                        $selected = ($sucursal->id == $sucursalId) ? 'selected' : '';
                                        echo <<<HTML
<option {$selected} value="{$sucursal->id}">{$sucursal->ciudad}</option>
HTML;
                                    } ?>
                                </select>
                                <input name="nombre" type="hidden" value="<?= $dataEnvio['nombre'] ?>">
                                <input name="apellidos" type="hidden" value="<?= $dataEnvio['apellidos'] ?>">
                                <input name="email" type="hidden" value="<?= $dataEnvio['email'] ?>">
                                <input name="direccion" type="hidden" value="<?= $dataEnvio['direccion'] ?>">
                                <input name="ciudad" type="hidden" value="<?= $dataEnvio['ciudad'] ?>">
                                <input name="estado" type="hidden" value="<?= $dataEnvio['estado'] ?>">
                                <input name="cp" type="hidden" value="<?= $dataEnvio['cp'] ?>">
                            </div>
                        </form>
                        <div class="col my-3">
                            <?php
                            if ($sucursalId !== 0) {
                                echo <<<HTML
                        <p><b>{$sucursalSelected->ciudad}</b><p>
                        <p>{$sucursalSelected->direccion} {$sucursalSelected->cp}</p>
HTML;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card bg-light">
                        <div class="row row-cols-2 px-3 my-3 font-weight-bold">
                            <div class="col"><p>Subtotal</p></div>
                            <div class="col direction-r">$0.00</div>
                            <div class="col">Costo de Envío</div>
                            <div class="col direction-r">$0.00</div>
                            <div class="border-top mt-2 pt-2"></div>
                            <div class="border-top mt-2 pt-2"></div>
                            <div class="col mt-2 pt-2">Total</div>
                            <div class="col direction-r cost mt-2">$0.00</div>
                        </div>
                    </div>
                    <div class="direction-l">
                        <a href="compra">
                            <button type="submit" class="btn btn-primary btn-block rounded-pill mt-3">Comprar
                                productos
                            </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include('carousel.php'); ?>

<?php
$jsCode = <<<JAVASCRIPT
    $('body').on('change', '#inputSucursal', function (e) {
        var sucursal = $(this).children("option:selected").val();
        if (sucursal != 0) {
            $("#select-sucursal").submit();
        }
    });
JAVASCRIPT;

$this->registerJs($jsCode, View::POS_END);
