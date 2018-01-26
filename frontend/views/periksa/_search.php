<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\PeriksaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periksa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'ID_PERIKSA') ?>

    <?php // $form->field($model, 'DIAGNOSA') ?>

    <?php // $form->field($model, 'CATATAN') ?>

    <?= $form->field($model, 'ID_DOKTER')->dropDownList(
        ArrayHelper::map(common\models\Dokter::find()->all(), 'ID_DOKTER', 'NAMA_DOKTER')
        , ['prompt'=>'Pilih Dokter']
    ) ?>

    <?= $form->field($model, 'ID_PASIEN')->dropDownList(
        ArrayHelper::map(common\models\Pasien::find()->all(), 'ID_PASIEN', 'NAMA_PASIEN')
        , ['prompt'=>'Pilih Pasien']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',  ['index'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
