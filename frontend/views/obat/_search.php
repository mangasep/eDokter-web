<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\ObatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'ID_OBAT') ?>

    <?= $form->field($model, 'NAMA_OBAT') ?>

    <?php //$form->field($model, 'HARGA') ?>

    <?= $form->field($model, 'PRODUKSI') ?>

    <?php //$form->field($model, 'JUMLAH_STOK') ?>

    <?= $form->field($model, 'TANGGAL_MASUK')->widget(\kartik\date\DatePicker::classname(),['pluginOptions' => 
    [ 'autoclose' => true, 'format' => 'yyyy-mm-dd'] ]); ?>

    <div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Reset',  ['index'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
