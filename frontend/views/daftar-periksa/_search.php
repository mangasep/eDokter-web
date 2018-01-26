<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DaftarPeriksaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daftar-periksa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PASIEN')->dropDownList(
        ArrayHelper::map(common\models\Pasien::find()->all(), 'ID_PASIEN', 'NAMA_PASIEN')
        , ['prompt'=>'Pilih Pasien']
    ) ?>

    <?= $form->field($model, 'ID_DOKTER')->dropDownList(
        ArrayHelper::map(common\models\Dokter::find()->all(), 'ID_DOKTER', 'NAMA_DOKTER')
        , ['prompt'=>'Pilih Dokter']
    ) ?>

    <?= $form->field($model, 'TANGGAL_PERIKAS')->widget(\kartik\date\DatePicker::classname(),['pluginOptions' => 
    [ 'autoclose' => true, 'format' => 'yyyy-mm-dd'] ]); ?>

    <?= $form->field($model, 'STATUS')->dropDownList(
                ['0'=>'Belum Acc',
                '10'=>'Sudah Acc',],
                ['prompt'=>'Status']
                )?>

    <?php // echo $form->field($model, 'WAKTU_DAFTAR') ?>

    <?php // echo $form->field($model, 'ID_URUT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',  ['index'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
