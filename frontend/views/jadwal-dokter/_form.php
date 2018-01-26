<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JadwalDokter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-dokter-form">
<div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <?= $this->title ?>
            </h4>
        </div>
    <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_DOKTER')->dropDownList(
        ArrayHelper::map(common\models\Dokter::find()->all(), 'ID_DOKTER', 'NAMA_DOKTER'),
        ['prompt'=>'Nama Dokter']
    ) ?>

    <?= $form->field($model, 'WAKTU_MULAI')->widget(\kartik\time\TimePicker::classname(),['pluginOptions' => [
         'format' => 'H:i:s']])?>

    <?= $form->field($model, 'WAKTU_SELESAI')->widget(\kartik\time\TimePicker::classname(),['pluginOptions' => [
       'format' => 'H:i:s']])?>

    <!-- <?= $form->field($model, 'ID_DOKTER')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
