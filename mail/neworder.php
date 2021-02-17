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
/* @var $nombre string */
/* @var $email string */
?>

<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?= Html::encode('Mail') ?></title>
    <?php $this->head() ?>
    <style type="text/css">
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
<div>
Nueva Orden generada por $nombre
Responder a: $email
</div>
HTML;

echo "<table>
<tr>
    <td>Nombre</td>
    <td>Price</td>
    <td>Cantidad</td>
    <td>Total</td>
</tr>";

foreach ($cartPositions as $cartPosition) {
    $totalProducto = $cartPosition->price * $cartPosition->quantity;
    echo <<<HTML
<tr>
    <td>$cartPosition->nombre</td>
    <td>$cartPosition->price</td>
    <td>$cartPosition->quantity</td>
    <td>$totalProducto</td>
</tr>
HTML;
}
echo "</table>";

$total = $costoTotal + $costoEnvio;

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








