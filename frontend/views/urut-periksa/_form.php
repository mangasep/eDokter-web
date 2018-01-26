<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UrutPeriksa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="urut-periksa-form">
<div class="pasien-form">
<div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <?= $this->title ?>
            </h4>
        </div>
    <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NO_URUT')?>

    <?= $form->field($model, 'WAKTU_PERIKSA')->textInput()->textInput()->widget(\kartik\time\TimePicker::classname(),['pluginOptions' => [
        //'showSeconds' => true,
        'showMeridian' => false,
        //'minuteStep' => 1,
        //'secondStep' => 5,
        //'template' => true
        ]])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
