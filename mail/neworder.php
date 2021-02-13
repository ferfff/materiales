<?php

use yii\helpers\Html;
use yii\mail\MessageInterface;
use yii\web\View;
use yii\helpers\Url;

/* @var $this View view component instance */
/* @var $message MessageInterface the message being composed */
/* @var $content string main view render result */
/* @var $cartPositions [] */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode('Mail') ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        #header {
            text-align: center;
            margin-bottom: 250px;
        }

        .footer-bottom {
            background-color: #000FFF;
            border-top: 5px solid #000000;
            height: 80px;
            margin-top: 250px;
        }
    </style>
</head>

<body>
<div id="header">
    <div class="logo">
        <img alt="logo FC materiales" src="http://tiendafcfacil.com/img/facil_construir_logo.jpg" width="300px">
    </div>
</div>

<div class="password">
    <?php $this->beginBody();

    foreach ($cartPositions as $cartPosition) {
    echo <<<HTML
        <div class="card mb-3">
            <div class="row no-gutters d-flex align-items-center">
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
HTML;
    }

    echo <<<HTML
<div class="card bg-light">
    <div class="row row-cols-2 px-3 my-3 font-weight-bold">
        <div class="col"><p>Subtotal</p></div>
        <div class="col direction-r">$<?= $costoTotal ?></div>
        <input type="hidden" name="costo_total" value="<?= $costoTotal ?>">
        <div class="col">Costo de Envío</div>
        <div class="col direction-r">$<?= $costoEnvio ?></div>
        <input type="hidden" name="costo_envio" value="<?= $costoEnvio ?>">
        <div class="border-top mt-2 pt-2"></div>
        <div class="border-top mt-2 pt-2"></div>
        <div class="col mt-2 pt-2">Total</div>
        <div class="col direction-r cost mt-2">$<?= $costoEnvio + $costoTotal ?></div>
    </div>
</div>
HTML;

    $this->endBody(); ?>
</div>

<div class="footer-bottom"></div>
</body>
</html>
<?php $this->endPage() ?>








