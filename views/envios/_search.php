<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostPedidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'users_id') ?>

    <?= $form->field($model, 'precioenvio') ?>

    <?= $form->field($model, 'estatus') ?>

    <?= $form->field($model, 'direccion_envio') ?>

    <?php // echo $form->field($model, 'preciototal') ?>

    <?php // echo $form->field($model, 'datos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
