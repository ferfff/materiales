<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row login">

            <div class="col-md-10 col-lg-7">
                <div class="px-5 py-3 fondo-dark text-white rounded-top">
                    <h2 class="font-weight-bold">Crear Cuenta</h2>
                </div>
                
                <form class="mb-3 p-5 bg-red text-light rounded-bottom">
                    <div class="form-row">
                        <div class="form-group col-md-6 p_12">
                            <label for="inputName">Nombre(s)</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu(s) nombre(s)">
                        </div>
                        <div class="form-group col-md-6 p_12">
                            <label for="inputName">Apellidos</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu apellido">
                        </div>
                        <div class="form-group col-md-12 p_12">
                            <label for="inputCorreo">Correo</label>
                            <input type="email" class="form-control rounded-pill p_14" id="inputCorreo" placeholder="nombre@correo.com">
                        </div>
                        <div class="form-group col-md-8 p_12">
                            <label for="inputName">Dirección</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu dirección">
                        </div>
                        <div class="form-group col-md-4 p_12">
                            <label for="inputName">C.P.</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="Ejem. 37000">
                        </div>
                        <div class="form-group col-md-7 p_12">
                            <label for="inputName">Colonia</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu colonia">
                        </div>
                        <div class="form-group col-md-5 p_12">
                            <label for="inputName">Teléfono</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="123-456-7890">
                        </div>
                        <div class="form-group col-md-6 p_12">
                            <label for="inputName">Ciudad</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu ciudad">
                        </div>
                        <div class="form-group col-md-6 p_12">
                            <label for="inputName">Estado</label>
                            <input class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu estado">
                        </div>
                    </div>
                    <div class="direction-l">
                        <button type="submit" class="btn btn-primary rounded-pill mt-3 btn-block">Crear Cuenta</button>
                    </div>
                </form>

            </div>

            <div class="col-md-8 col-lg-5 px-5 py-3 mb-5 direction-l">
                <h2 class="text_red">Iniciar Sesión</h2>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                ]); ?>
                    <div class="form-group p_14">
                        <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Correo') ?>
                    </div>
                    <div class="form-group p_14">
                        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                    </div>
                    <div class="form-group p_14">
                        <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordarme') ?>
                    </div>
                    <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary btn-block rounded-pill my-4', 'name' => 'login-button']) ?>
                    <a href="/site/recovery"><p class="text_red">¿Olvidaste tu contraseña?</p></a>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>