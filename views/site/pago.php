<?php

use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;

YiiAsset::register($this);

/* @var $dataEnvio [] */
/* @var $cartPositions [] */
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
                    <label class="form-label"><b>Si su producto no se encuentra en el carrito, <br> no lo tenemos en esta sucursal por el momento</b></label>
                    <?php foreach ($cartPositions as $cartPosition) { ?>
                        <div class="card mb-3">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-md-2">
                                    <?= Html::img('/images/' . $cartPosition->foto, ['class' => 'card-img', 'alt' => "producto"]); ?>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body direction-l">
                                        <h5 class="card-title font-weight-bold"><?= $cartPosition->nombre ?></h5>
                                        <p class="card-text">Precio: $<?= $cartPosition->price ?></p>
                                        <p class="card-text">Cantidad: <?= $cartPosition->quantity ?></p>
                                        <p class="card-text">Total: $<?= $cartPosition->getCost() ?></p>
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
                            <p><?= $dataEnvio['nombreCompleto'] ?></p>
                            <p><?= $dataEnvio['email'] ?></p>
                            <p><?= $dataEnvio['direccion'] ?></p>
                            <p><?= $dataEnvio['ciudad'] ?></p>
                            <p><?= $dataEnvio['cp'] ?></p>
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
                    <form action="/site/gracias" method="post">
                        <div class="card bg-light">
                            <div class="row row-cols-2 px-3 my-3 font-weight-bold">
                                <div class="col"><p>Subtotal</p></div>
                                <div class="col direction-r">$<?= number_format($total, 2) ?></div>
                                <input type="hidden" name="costo_total" value="<?= $total ?>">
                                <div class="col">Costo de Envío</div>
                                <div class="col direction-r">$<?= number_format($costoEnvio, 2) ?></div>
                                <input type="hidden" name="costo_envio" value="<?= $costoEnvio ?>">
                                <div class="border-top mt-2 pt-2"></div>
                                <div class="border-top mt-2 pt-2"></div>
                                <div class="col mt-2 pt-2">Total</div>
                                <div class="col direction-r cost mt-2">$<?= number_format($costoEnvio + $total, 2) ?></div>
                            </div>
                        </div>
                        <?php
                        $direccion = $dataEnvio['direccion'] . ' ' . $dataEnvio['ciudad'] . ' ' . $dataEnvio['cp'];
                        $nombre = $dataEnvio['nombreCompleto'];
                        $email = $dataEnvio['email'];
                        ?>
                        <input type="hidden" name="direccion" value="<?= $direccion ?>">
                        <input type="hidden" name="nombre" value="<?= $nombre ?>">
                        <input type="hidden" name="email" value="<?= $email ?>">
                        <div class="direction-l">
                        <?php
                        if ($sucursalId == 0) {
echo <<<HTML
<button type="submit" id="send" disabled class="btn btn-primary btn-block mt-3">Comprar productos</button>
HTML;
                        } else {
                            echo <<<HTML
<button type="submit" id="send" class="btn btn-primary btn-block mt-3">Comprar productos</button>
HTML;
                        }
                        ?>
                        </div>
                    </form>
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
        } else {
            $("#send").attr("disabled", true);
        }
    });
JAVASCRIPT;

$this->registerJs($jsCode, View::POS_END);
