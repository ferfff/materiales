<?php

use yii\helpers\Html;
use yii\mail\MessageInterface;
use yii\web\View;

/* @var $this View view component instance */
/* @var $message MessageInterface the message being composed */
/* @var $content string main view render result */
/* @var $cartPositions [] */
/* @var $costoTotal float */
/* @var $costoEnvio float */
?>

<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?= Html::encode('Mail') ?></title>
    <?php $this->head() ?>
    <style type="text/css">

        body{
            border: 5px solid #82848a;
            width: 60%;
            padding: 20px;
            margin: auto;
            text-align: center;
            font-size: 22px
        }

        #header {
            text-align: center;
            margin-bottom: 50px;
        }

        .footer-bottom {
            background-color: #ff0000;
            border-top: 5px solid #000000;
            height: 80px;
            margin-top: 50px;
        }

        .mail-container{
            margin-bottom: 80px;
            border-bottom: 1px solid #e5e8eb;
            padding-bottom: 50px;
        }

        .text-red{
            color: #ee0000;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 0px;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<?php $this->beginBody();

echo <<<HTML
<div id="header">
    <img alt="logo FC materiales" src="http://tiendafcfacil.com/img/facil_construir_logo.jpg" width="300px">
</div>

<div class="mail-container">
    <div>
        <p>¡Hola! Gracias por tu compra en Fácil de Construir. Esperamos que tu experiencia de compra haya sido satisfactoria. 
        Te compartimos las siguientes instrucciones para completar tu orden de compra.</p>
        <p>Realiza el pago en: <b class="text-red">BBAJIO</b><br>
        a la cuenta <b class="text-red">6380984</b><br>
        CLABE <b class="text-red">030225638098402015</b></p>
        <p>Razón Social:<br>
        <b class="text-red">FC FACIL DE CONSTRUIR SA DE CV</b></p>
        <p>Una vez realizado el depósito, enviar el comprobante de pago al correo 
        hidalgo@fcfacil.com y/o llamar al teléfono 477 717 4632 , donde uno de nuestros ejecutivos le atenderá.</p>
        <p><a href="http://tiendafcfacil.com/site/ayuda">Dudas frecuentes</a></p>
    </div>
</div>
HTML;

$total = $costoEnvio + $costoTotal;

echo <<<HTML
<table>
    <tr>
        <th>Subtotal : </th><th>$ $costoTotal</th>
    </tr>
    <tr>
        <th>Costo de Envío : </th><th>$ $costoEnvio</th>
    </tr>
    <tr>
        <th>Total : </th><th>$ $total</th>
    </tr>
</table>
HTML;

echo <<<HTML
<div class="footer-bottom"></div>
HTML;

$this->endBody(); ?>

</html>
<?php $this->endPage() ?>








