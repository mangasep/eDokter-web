<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\DokterUser */

$this->title = Yii::t('app', 'Update Dokter User: {nameAttribute}', [
    'nameAttribute' => $model->ID_DOKTER,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokter Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DOKTER, 'url' => ['view', 'id' => $model->ID_DOKTER]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dokter-user-update">

<div class="dokter-user-form">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'NAMA_DOKTER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_TELPN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="col-md-6">

    <?= $form->field($model, 'AGAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TANGGAL_LAHIR')->widget(\kartik\date\DatePicker::classname(),[ 'options' => 
                [ 'value' => date("Y-m-d")], 'pluginOptions' => 
                [ 'autoclose' => true, 'format' => 'yyyy-mm-dd'] ]); ?>

    <?= $form->field($model, 'NO_PRAKTEK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SPESIALIS')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
</div>
</div>
