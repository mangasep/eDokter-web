<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DokterUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokter-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'ID_USER')->textInput() ?>

    <?= $form->field($model, 'NAMA_DOKTER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USERNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD_REPEAT')->passwordInput(['maxlength' => true]) ?>

    <?php  //$form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
    <?php //$form->field($model, 'NO_TELPN')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'AGAMA')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'TANGGAL_LAHIR')->textInput() ?>

    <?php //$form->field($model, 'NO_PRAKTEK')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'SPESIALIS')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'STATUS')->textInput() ?>

    <?php //$form->field($model, 'STATUS_AKUN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
