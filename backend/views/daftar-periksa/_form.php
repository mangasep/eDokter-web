<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DaftarPeriksa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daftar-periksa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_PASIEN')->textInput() ?>

    <?= $form->field($model, 'ID_DOKTER')->textInput() ?>

    <?= $form->field($model, 'TANGGAL_PERIKAS')->textInput() ?>

    <?= $form->field($model, 'KELUHAN')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WAKTU_DAFTAR')->textInput() ?>

    <?= $form->field($model, 'ID_URUT')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
