<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>

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
            <input type="nombre(s)" class="form-control rounded-pill p_14" id="inputName" placeholder="Escribe tu nombre">
            </div>
            <div class="form-group col-md-12 p_14">
            <label for="inputCorreo">Correo</label>
            <input type="correo" class="form-control rounded-pill p_14" id="inputCorreo" placeholder="nombre@correo.com">
            </div>
            <div class="form-group col-md-12 p_14">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control rounded-pill p_14" id="inputPassword" placeholder="Escribe una contraseña">
            </div>
        </div>
        <div class="direction-l">
            <button type="submit" class="btn btn-primary rounded-pill mt-3 btn-block">Crear Cuenta</button>
        </div>
        </form>
    </div>
    
    <div class="col-md-6 col-lg-5 px-5 py-3 mb-5 direction-l">
        <a href="index"><h2 class="text_red">Iniciar Sesión</h2></a>
        <form>
        <div class="form-group p_14">
            <label for="InputCorreo">Correo</label>
            <input type="correo" class="form-control rounded-pill p_14" id="InputCorreo" aria-describedby="emailHelp" placeholder="nombre@correo.com">
        </div>
        <div class="form-group p_14">
            <label for="InputContraseña">Contraseña</label>
            <input type="contraseña" class="form-control rounded-pill p_14" id="InputContraseña" placeholder="Escribe tu contraseña">
        </div>
        <a href="index"><button type="button" class="btn btn-primary btn-block rounded-pill my-4">Iniciar Sesión</button></a>
        <a href="recovery"><p class="text_red">¿Olvidaste tu contraseña?</p></a>
        </form>
    </div>

    </div>
</div>
</div>