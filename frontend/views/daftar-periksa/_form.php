<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DaftarPeriksa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daftar-periksa-form">
<div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <?= $this->title ?>
            </h4>
        </div>
    <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_PASIEN')->dropDownList(
        ArrayHelper::map(common\models\Pasien::find()->all(), 'ID_PASIEN', 'NAMA_PASIEN')
        , ['prompt'=>'Nama Pasien']
    ) ?>

    <?= $form->field($model, 'ID_DOKTER')->dropDownList(
        ArrayHelper::map(common\models\Dokter::find()->all(), 'ID_DOKTER', 'NAMA_DOKTER')
        , ['prompt'=>'Nama Dokter']
    ) ?>

    <?= $form->field($model, 'TANGGAL_PERIKAS')->widget(\kartik\date\DatePicker::classname(),[ 'options' => 
    [ 'value' => date("Y-m-d")], 'pluginOptions' => 
    [ 'autoclose' => true, 'format' => 'yyyy-mm-dd'] ]); ?>

    <?= $form->field($model, 'WAKTU_DAFTAR')->widget(\kartik\time\TimePicker::classname(),['pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
        'template' => true]])?>

    <?= $form->field($model, 'KELUHAN')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ID_URUT')->textInput()->dropDownList(
        ArrayHelper::map(common\models\UrutPeriksa::find()->all(), 'ID_URUT', 'ID_URUT')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

