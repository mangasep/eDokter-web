<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PembayaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PEMBAYARAN') ?>

    <?= $form->field($model, 'BIAYA_PERIKSA') ?>

    <?= $form->field($model, 'TOTAL') ?>

    <?= $form->field($model, 'ID_RESEP') ?>

    <?= $form->field($model, 'ID_PERIKSA') ?>

    <?php // echo $form->field($model, 'BAYAR') ?>

    <?php // echo $form->field($model, 'KEMBALI') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
