<?php

/* @var $this yii\web\View */
/* @var $newModel app\models\User */
/* @var $form ActiveForm */
/* @var $estados [] */
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

                <?php
                $form = ActiveForm::begin([
                    'id' => 'create-form',
                    'method' => 'post',
                    'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'error' => 'createError'
                        ],
                        'errorOptions' => ['class' => 'md-input-danger']
                    ],
                    'options' => [
                        'class' => 'mb-3 p-5 bg-red text-light rounded-bottom',
                    ],
                ]); ?>

                <div class="form-row">
                    <div class="form-group col-md-6 p_12">
                        <?= $form->field($newModel, 'nombre') ?>
                    </div>
                    <div class="form-group col-md-6 p_12">
                        <?= $form->field($newModel, 'apellidos') ?>
                    </div>
                    <div class="form-group col-md-8 p_12">
                        <?= $form->field($newModel, 'email') ?>
                    </div>
                    <div class="form-group col-md-4 p_12">
                        <?= $form->field($newModel, 'telefono') ?>
                    </div>
                    <div class="form-group col-md-10 p_12">
                        <?= $form->field($newModel, 'direccion') ?>
                    </div>
                    <div class="form-group col-md-2 p_12">
                        <?= $form->field($newModel, 'cp') ?>
                    </div>
                    <div class="form-group col-md-6 p_12">
                        <?= $form->field($newModel, 'ciudad') ?>
                    </div>
                    <div class="form-group col-md-6 p_12">
                        <?= $form->field($newModel, 'estado')->dropDownList(
                                Yii::$app->params['estados'],
                                ['prompt' => 'Seleccione Uno' ]
                        ) ?>
                    </div>
                    
                    <div class="form-group col-md-12 p_12">
                        <?= $form->field($newModel, 'password')->passwordInput() ?>
                    </div>
                    <input type="hidden" value="create" name="form">
                </div>
                <div class="direction-l">
                    <?= Html::submitButton(Yii::t('app', 'Crear Cuenta'), ['class' => 'btn btn-primary mt-3 btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <div class="col-md-8 col-lg-5 px-5 py-3 mb-5 direction-l">
                <h2 class="text_red">Iniciar Sesión</h2>
                <?php $form2 = ActiveForm::begin([
                    'id' => 'login-form',
                ]); ?>
                <div class="form-group p_14">
                    <?= $form2->field($model, 'email')->textInput(['autofocus' => true])->label('Correo') ?>
                </div>
                <div class="form-group p_14">
                    <?= $form2->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                </div>
                <div class="form-group p_14">
                    <?= $form2->field($model, 'rememberMe')->checkbox()->label('Recordarme') ?>
                </div>
                <input type="hidden" value="login" name="form">
                <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary btn-block my-4', 'name' => 'login-button']) ?>
                <a href="/site/recovery"><p class="text_red">¿Olvidaste tu contraseña?</p></a>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>