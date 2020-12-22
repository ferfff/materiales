<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */
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
                            <a href="/site/login">
                                <button class="btn btn-primary my-1 rounded-pill mb-5">Iniciar Sesión <i
                                            class="fas fa-angle-right"></i></button>
                            </a>
                        </div>
                    <?php } ?>

                    <h2 class="font-weight-bold text_red direction-l">Información de Envío</h2>
                    <?= Html::beginForm(['/site/pago'], 'post', [
                            'enctype' => 'multipart/form-data',
                            'class' => 'border-top my-3 p-3',
                    ]) ?>
                        <div class="form-row">
                            <div class="form-group col-md-6 p_12">
                                <label for="inputName">Nombre(s)</label>
                                <input name="nombre" type="text" class="form-control rounded-pill p_14" id="inputName"
                                       placeholder="Escribe tu(s) nombre(s)" value="<?= $user->nombre ?>">
                            </div>
                            <div class="form-group col-md-6 p_12">
                                <label for="inputApellidos">Apellidos</label>
                                <input name="apellidos" type="text" class="form-control rounded-pill p_14" id="inputApellidos"
                                       placeholder="Escribe tu apellido" value="<?= $user->apellidos ?>">
                            </div>
                        </div>
                        <div class="form-group p_12">
                            <label for="inputDirección">Dirección</label>
                            <input name="direccion" type="text" class="form-control rounded-pill p_14" id="inputDirección"
                                   placeholder="Escribe tu dirección y número"
                                   value="<?= $user->direccion ?>">
                        </div>
                        <div class="form-row p_12">
                            <div class="form-group col-md-9">
                                <label for="inputEmail">Correo</label>
                                <input name="email" type="email" class="form-control rounded-pill p_14" id="inputEmail"
                                       placeholder="Escribe tu correo" value="<?= $user->email ?>">
                            </div>
                            <div class="form-group col-md-3 p_12">
                                <label for="inputCP">C.P.</label>
                                <input name="cp" type="text" class="form-control rounded-pill p_14" id="inputCP"
                                       placeholder="Ejem. 37000" value="<?= $user->cp ?>">
                            </div>
                        </div>
                        <div class="form-row p_12">
                            <div class="form-group col-md-5 p_12">
                                <label for="inputTelefono">Teléfono</label>
                                <input name="telefono" type="text" class="form-control rounded-pill p_14" id="inputTelefono"
                                       placeholder="123-456-890" value="<?= $user->telefono ?>">
                            </div>
                        </div>
                        <div class="form-row p_12">
                            <div class="form-group col-md-7">
                                <label for="inputCiudad">Ciudad</label>
                                <input name="ciudad" type="text" class="form-control rounded-pill p_14" id="inputCiudad"
                                       placeholder="Escribe tu ciudad" value="<?= $user->ciudad ?>">
                            </div>
                            <div class="form-group col-md-5 p_12">
                                <label for="inputEstado" class="form-label">Estado </label>
                                <select name="estado" id="inputEstado" class="form-select">
                                    <?php
                                    foreach ($estados as $estado) {
                                        $selected = ($estado == $user->estado) ? 'selected' : '' ;
                                        echo <<<HTML
<option $selected value="{$estado}">{$estado}</option>
HTML;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="direction-r">
                            <?php if(!empty($cartPositions)) { ?>
                                <button type="submit" class="btn btn-primary rounded-pill mt-5">
                                    Proceder al pago <i class="fas fa-angle-right"></i>
                                </button>
                            <?php } ?>
                        </div>
                        <?= Html::endForm() ?>
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

                </div>
            </div>
        </div>
    </div>

<?php include('carousel.php'); ?>