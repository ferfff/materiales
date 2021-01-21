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
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>


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
              <p class="direction-l">En <b class="text_red">Fc Fácil de Construir</b> contamos con todo lo necesario para la Construcción de muros y plafones con sistema ligero con las mejores marcas.</p>  
              <div class="border-bottom py-3 my-3">
                <div class="row direction-l">
                  <div class="col-sm-1 text_red">
                    <span class="card-img"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                  <div class="col-sm-10">
                    <h5 class="font-weight-bold">Blvd. Torres Landa No. 2209 Ote. Col. Azteca, León, Gto.</h5>
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
                    <h5 class="font-weight-bold">contacto@fcfacil.com</h5>
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

            <div class="col-lg-4">
              <form class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationTooltip01">Nombre</label>
                    <input type="text" class="form-control" id="validationTooltip01" required>
                    <div class="valid-tooltip">
                      Escriba su nombre
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="validationTooltip02">Correo</label>
                    <input type="text" class="form-control" id="validationTooltip02" required>
                    <div class="valid-tooltip">
                      Escriba su correo
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="validationTextarea">Mensaje</label>
                    <textarea class="form-control rounded-lg" id="validationTextarea" required></textarea>
                    <div class="invalid-feedback">
                      Escriba un mensaje
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <a href="mensaje.php"><button type="button" class="btn btn-primary">Enviar</button></a>
                </div>
              </form>
            </div>

            <div class="col-lg-1"></div>

          </div>

          <div class="col-lg-12 px-2 mt-3 pb-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2691140.2492120895!2d-101.92559595459274!3d21.324940645923903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1ses-419!2smx!4v1605207731696!5m2!1ses-419!2smx" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>

        </div>
      </div>
      
    </div>
  </div> 
</div>

<?php include('carousel.php'); ?>