<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JadwalDokterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-dokter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'ID_JADWAL') ?>

    <?php // $form->field($model, 'WAKTU_MULAI') ?>

    <?php // $form->field($model, 'WAKTU_SELESAI') ?>

    <?= $form->field($model, 'ID_DOKTER')->dropDownList(
        ArrayHelper::map(common\models\Dokter::find()->all(), 'ID_DOKTER', 'NAMA_DOKTER')
        , ['prompt'=>'Pilih Dokter']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',  ['index'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
