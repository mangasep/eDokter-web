<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\PasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'ID_PASIEN') ?>

    <?php // $form->field($model, 'ID_USER') ?>

    <?= $form->field($model, 'NAMA_PASIEN')->dropDownList(
        ArrayHelper::map(common\models\Pasien::find()->all(), 'NAMA_PASIEN', 'NAMA_PASIEN')
        ,['prompt'=>'Pilih Pasien']
    ) ?>

    <?php // $form->field($model, 'EMAIL') ?>

    <?php // $form->field($model, 'USERNAME') ?>

    <?php // echo $form->field($model, 'PASSWORD') ?>

    <?php // echo $form->field($model, 'NO_TELPN') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'AGAMA') ?>

    <?php // echo $form->field($model, 'TEMPAT_LAHIR') ?>

    <?php // echo $form->field($model, 'TANGGAL_LAHIR') ?>

    <?php // echo $form->field($model, 'BERAT_BADAN') ?>

    <?php // echo $form->field($model, 'TINGGI_BADAN') ?>

    <?php // echo $form->field($model, 'GOL_DARAH') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'],['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
