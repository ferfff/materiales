<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';

$this->params['breadcrumbs'][] = $this->title;

?>

    <!-- Banner -->
    <div class="container-fluid mb-5 banner_contacto"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="red_back direction-l rounded pl-4">Contacto</h1>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="row align_items py-3">

                            <div class="col-lg-1"></div>

                            <div class="col-lg-5">
                                <p class="direction-l">En <b class="text_red">Fc Fácil de Construir</b> contamos con
                                    todo lo necesario para la Construcción de muros y plafones con sistema ligero con
                                    las mejores marcas.</p>
                                <div class="border-bottom py-3 my-3">
                                    <div class="row direction-l">
                                        <div class="col-sm-1 text_red">
                                            <span class="card-img"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <div class="col-sm-10">
                                            <h5 class="font-weight-bold">Blvd. Torres Landa No. 2209 Ote. Col. Azteca,
                                                León, Gto.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom py-3 my-3">
                                    <div class="row direction-l">
                                        <div class="col-sm-1 text_red">
                                            <span class="card-img"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <div class="col-sm-10">
                                            <h5 class="font-weight-bold">(477) 514-9653 al 56</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom py-3 my-3">
                                    <div class="row direction-l">
                                        <div class="col-sm-1 text_red">
                                            <span class="card-img"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <div class="col-sm-10">
                                            <h5 class="font-weight-bold">info@tiendafcfacil.com</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-3 mt-3">
                                    <div class="row direction-l">
                                        <div class="col-sm-1 text_red">
                                            <span class="card-img"><i class="fab fa-facebook-f"></i></span>
                                        </div>
                                        <div class="col-sm-10">
                                            <h5 class="font-weight-bold">facildeconstruir</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-1 my-3"></div>
                            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                                <div class="alert alert-success">
                                    Gracias por contactarnos. Le responderemos lo más pronto posible.
                                </div>

                            <?php else: ?>
                                <div class="col-lg-4">
                                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <?= $form->field($model, 'email') ?>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <?= $form->field($model, 'subject') ?>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-1"></div><div class="col-lg-6">{input}</div></div>',
                                            ]) ?>
                                        </div>
                                    </div>
                                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-1"></div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include('carousel.php'); ?>