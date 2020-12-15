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

            <div class="col-md-6 col-lg-5 direction-l">
                <div class="px-5 py-3 fondo-dark text-white rounded-top">
                    <h2 class="font-weight-bold">Crear Cuenta</h2>
                </div>
                <form class="mb-3 p-5 bg-red text-light rounded-bottom direction-l">
                    <div class="form-row">
                        <div class="form-group col-md-12 p_14">
                            <label for="inputName">Nombre Completo</label>
                            <input class="form-control rounded-pill p_14" id="inputName"
                                   placeholder="Escribe tu nombre">
                        </div>
                        <div class="form-group col-md-12 p_14">
                            <label for="inputCorreo">Correo</label>
                            <input type="email" class="form-control rounded-pill p_14" id="inputCorreo"
                                   placeholder="nombre@correo.com">
                        </div>
                        <div class="form-group col-md-12 p_14">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control rounded-pill p_14" id="inputPassword"
                                   placeholder="Escribe una contraseña">
                        </div>
                    </div>
                    <div class="direction-l">
                        <button type="submit" class="btn btn-primary rounded-pill mt-3 btn-block">Crear Cuenta</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-lg-5 px-5 py-3 mb-5 direction-l">
                <a href="/"><h2 class="text_red">Iniciar Sesión</h2></a>
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