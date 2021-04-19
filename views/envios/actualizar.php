<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostPedidos */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
?>
<div class="pedidos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <form method="post" action="envios/actualizar">
        <label class="form-label" for="customFile">Default file input example</label>
        <input type="file" class="form-control" id="customFile" />
    </form>

</div>