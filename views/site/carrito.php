<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

?>

    <div class="container my-3">
        <div class="row">
            <div class="col-sm my-2 direction-l">
                <a href="/" class="text-dark">Inicio</a> <span class="text_red">/ Carrito</span>
            </div>
            <div class="col-sm direction-r my-2">
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2">
                <div class="col mb-3">
                    <?php
                    if (Yii::$app->user->isGuest) { ?>
                        <div class="direction-l">
                            <h2 class="font-weight-bold text_red">¿Tienes una cuenta?</h2>
                            <a href="login">
                                <button class="btn btn-primary my-1 rounded-pill mb-5">Iniciar Sesión <i
                                            class="fas fa-angle-right"></i></button>
                            </a>
                        </div>
                    <?php } ?>

                    <h2 class="font-weight-bold text_red direction-l">Información de Envío</h2>
                    <form class="border-top my-3 p-3">
                        <div class="form-row">
                            <div class="form-group col-md-6 p_12">
                                <label for="inputName">Nombre(s)</label>
                                <input type="nombre(s)" class="form-control rounded-pill p_14" id="inputName"
                                       placeholder="Escribe tu(s) nombre(s)" value="<?= $user->nombre ?>">
                            </div>
                            <div class="form-group col-md-6 p_12">
                                <label for="inputApellidos">Apellidos</label>
                                <input type="apellidos" class="form-control rounded-pill p_14" id="inputApellidos"
                                       placeholder="Escribe tu apellido" value="<?= $user->paterno . ' ' . $user->materno ?>">
                            </div>
                        </div>
                        <div class="form-group p_12">
                            <label for="inputEmail">Correo</label>
                            <input type="email" class="form-control rounded-pill p_14" id="inputEmail"
                                   placeholder="Escribe tu correo" value="<?= $user->email ?>">
                        </div>
                        <div class="form-row p_12">
                            <div class="form-group col-md-9">
                                <label for="inputDirección">Dirección</label>
                                <input type="text" class="form-control rounded-pill p_14" id="inputDirección"
                                       placeholder="Escribe tu dirección y número"
                                       value="<?= $user->calle . ' ' . $user->numero ?>">
                            </div>
                            <div class="form-group col-md-3 p_12">
                                <label for="inputCP">C.P.</label>
                                <input type="text" class="form-control rounded-pill p_14" id="inputCP"
                                       placeholder="Ejem. 37000" value="<?= $user->cp ?>">
                            </div>
                        </div>
                        <div class="form-row p_12">
                            <div class="form-group col-md-7">
                                <label for="inputColonia">Colonia</label>
                                <input type="text" class="form-control rounded-pill p_14" id="inputColonia"
                                       placeholder="Escribe tu colonia" value="<?= $user->colonia ?>">
                            </div>
                            <div class="form-group col-md-5 p_12">
                                <label for="inputTelefono">Teléfono</label>
                                <input type="text" class="form-control rounded-pill p_14" id="inputTelefono"
                                       placeholder="123-456-890" value="<?= $user->telefono ?>">
                            </div>
                        </div>
                        <div class="form-row p_12">
                            <div class="form-group col-md-7">
                                <label for="inputColonia">Ciudad</label>
                                <input type="text" class="form-control rounded-pill p_14" id="inputCiudad"
                                       placeholder="Escribe tu ciudad" value="<?= $user->ciudad ?>">
                            </div>
                            <div class="form-group col-md-5 p_12">
                                <label for="inputTelefono">Estado</label>
                                <input type="text" class="form-control rounded-pill p_14" id="inputEstado"
                                       placeholder="Escribe tu estado" value="<?= $user->estado ?>">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col my-2">

                    <?php foreach ($cartPositions as $cartPosition) { ?>
                        <?= Html::beginForm(['delete', 'id' => 'delete-product'], 'post', ['enctype' => 'multipart/form-data']) ?>
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <?= Html::img('/images/' . $cartPosition->foto, ['class' => 'card-img', 'alt' => "producto"]); ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body direction-l">
                                        <?= Html::tag('h5', Html::encode($cartPosition->nombre), ['class' => 'card-title font-weight-bold']); ?>
                                        <?= Html::tag('p', <<<HTML
<span class="font-weight-bold">{$cartPosition->getQuantity()}</span></p>
HTML
                                            , ['class' => 'card-title font-weight-bold']); ?>
                                        <?= Html::hiddenInput('id-product', $cartPosition->id, []) ?>
                                        <?= Html::submitButton(
                                                '<i class="fas fa-times-circle"></i> Eliminar',
                                                ['class' => "btn btn-danger btn-sm mt-3"]
                                        ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= Html::endForm() ?>
                    <?php } ?>

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

                    <div class="direction-r">
                        <a href="pago">
                            <button type="submit" class="btn btn-primary rounded-pill mt-5">Proceder al pago <i
                                        class="fas fa-angle-right"></i></button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php include('carousel.php'); ?>