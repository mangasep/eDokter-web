<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Staff */

$this->title = Yii::t('app', 'Update Staff: {nameAttribute}', [
    'nameAttribute' => $model->ID_STAFF,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_STAFF, 'url' => ['view', 'id' => $model->ID_STAFF]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="staff-update">
    <div class="staff-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
        	<div class="col-md-6">
        		<?= $form->field($model, 'NAMA_STAFF')->textInput(['maxlength' => true]) ?>
        		<?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>
        		<?= $form->field($model, 'NO_TELPN')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update', ['class' => 'btn btn-primary']) ?>
                </div>
        	</div>
        	<div class="col-md-6">
                <?= $form->field($model, 'AGAMA')->textInput(['maxlength' => true]) ?>
        		<?= $form->field($model, 'TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>
        		<?php //$form->field($model, 'TANGGAL_LAHIR')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'TANGGAL_LAHIR')->widget(\kartik\date\DatePicker::classname(),[ 'options' => 
                [ 'value' => date("Y-m-d")], 'pluginOptions' => 
                [ 'autoclose' => true, 'format' => 'yyyy-mm-dd'] ]); ?>
        		<?= $form->field($model, 'JOB_DESC')->textInput(['maxlength' => true]) ?>
        	</div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
