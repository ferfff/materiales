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
        #header {
            text-align: center;
            margin-bottom: 250px;
        }

        .footer-bottom {
            background-color: #ff0000;
            border-top: 5px solid #000000;
            height: 80px;
            margin-top: 250px;
        }
    </style>
</head>

<?php $this->beginBody();

echo <<<HTML
<div id="header">
    <img alt="logo FC materiales" src="http://tiendafcfacil.com/img/facil_construir_logo.jpg" width="300px">
</div>
<div>
Favor de depositar en BBAJIO a la cuenta 6380984 / CLABE 030225638098402015
<br>
Razón Social: FC FACIL DE CONSTRUIR SA DE CV
<br>
Gracias por comprar con nosotros, en breve lo contactaremos
</div>
HTML;

$total = $costoEnvio + $costoTotal;

echo <<<HTML
<table>
    <tr>
    <td>Subtotal : </td><td>$ $costoTotal</td>
    </tr>
    <tr>
    <td>Costo de Envío : </td><td>$ $costoEnvio</td>
    </tr>
    <tr>
    <td>Total : </td><td>$ $total</td>
    </tr>
</table>
HTML;

echo <<<HTML
<div class="footer-bottom"></div>
HTML;

$this->endBody(); ?>

</html>
<?php $this->endPage() ?>








