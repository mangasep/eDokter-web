<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DaftarUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokter-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_DOKTER') ?>

    <?= $form->field($model, 'ID_USER') ?>

    <?= $form->field($model, 'NAMA_DOKTER') ?>

    <?= $form->field($model, 'EMAIL') ?>

    <?= $form->field($model, 'USERNAME') ?>

    <?php // echo $form->field($model, 'PASSWORD') ?>

    <?php // echo $form->field($model, 'NO_TELPN') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'AGAMA') ?>

    <?php // echo $form->field($model, 'TEMPAT_LAHIR') ?>

    <?php // echo $form->field($model, 'TANGGAL_LAHIR') ?>

    <?php // echo $form->field($model, 'NO_PRAKTEK') ?>

    <?php // echo $form->field($model, 'SPESIALIS') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'STATUS_AKUN') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
