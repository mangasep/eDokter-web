<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-form">
<div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <?= $this->title ?>
            </h4>
        </div>
    <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_USER')->hiddenInput(['value'=>'1'])->label(false); ?>

    <?= $form->field($model, 'NAMA_PASIEN')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_TELPN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AGAMA')->dropDownList(['Islam'=>'Islam','Kristen'=>'Kristen','Katolik'=>'Katolik',
    'Hindu'=>'Hindu','Buddha'=>'Buddha','Kong Hu Cu'=>'Kong Hu Cu','Lainnya'=>'Lainnya']
    ,['prompt'=>'Pilih Agama']); ?>

    <?= $form->field($model, 'TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TANGGAL_LAHIR')->widget(\kartik\date\DatePicker::classname(),['pluginOptions' => [
        'format' => 'yyyy-mm-dd']])?>

    <?= $form->field($model, 'BERAT_BADAN')->textInput() ?>

    <?= $form->field($model, 'TINGGI_BADAN')->textInput() ?>

    <?= $form->field($model, 'GOL_DARAH')->dropDownList(['O'=>'O','A'=>'A','B'=>'B','AB'=>'AB','Lainnya'=>'Lainnya']
    ,['prompt'=>'Pilih Gol Darah']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
