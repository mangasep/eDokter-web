<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DokterUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokter-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_USER')->textInput() ?>

    <?= $form->field($model, 'NAMA_DOKTER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USERNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_TELPN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AGAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TANGGAL_LAHIR')->textInput() ?>

    <?= $form->field($model, 'NO_PRAKTEK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SPESIALIS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'STATUS_AKUN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
