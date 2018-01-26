<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-form">
<div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <?= $this->title ?>
            </h4>
        </div>
    <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_PERIKSA')->dropDownList(
        ArrayHelper::map(common\models\Periksa::find()->all(), 'ID_PERIKSA', 'pASIEN.NAMA_PASIEN')
        , ['prompt'=>'Nama Pasien']
    ) ?>

    <?= $form->field($model, 'BIAYA_PERIKSA')->textInput(['maxlength' => true,'value'=>40000]) ?>

    <?= $form->field($model, 'TOTAL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
