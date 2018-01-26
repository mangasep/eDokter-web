<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'ID_STAFF') ?>

    <?php // echo $form->field($model, 'ID_USER') ?>

    <?= $form->field($model, 'NAMA_STAFF') ?>

    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'USERNAME') ?>

    <?php // echo $form->field($model, 'PASSWORD') ?>

    <?php // echo $form->field($model, 'NO_TELPN') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'AGAMA') ?>

    <?php // echo $form->field($model, 'TEMPAT_LAHIR') ?>

    <?php // echo $form->field($model, 'TANGGAL_LAHIR') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
