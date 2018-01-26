<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeriksaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periksa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PERIKSA') ?>

    <?= $form->field($model, 'DIAGNOSA') ?>

    <?= $form->field($model, 'CATATAN') ?>

    <?= $form->field($model, 'ID_DOKTER') ?>

    <?= $form->field($model, 'ID_PASIEN') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
