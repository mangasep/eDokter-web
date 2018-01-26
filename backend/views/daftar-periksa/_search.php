<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DaftarPeriksaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daftar-periksa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_DAFTAR') ?>

    <?= $form->field($model, 'ID_PASIEN') ?>

    <?= $form->field($model, 'ID_DOKTER') ?>

    <?= $form->field($model, 'TANGGAL_PERIKAS') ?>

    <?= $form->field($model, 'KELUHAN') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'WAKTU_DAFTAR') ?>

    <?php // echo $form->field($model, 'ID_URUT') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
