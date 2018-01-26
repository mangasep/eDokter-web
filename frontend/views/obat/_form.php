<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Obat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obat-form">
<div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <?= $this->title ?>
            </h4>
        </div>
    <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAMA_OBAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TANGGAL_MASUK')->widget(\kartik\date\DatePicker::classname(),['pluginOptions' => [
        'format' => 'yyyy-mm-dd']])?>

    <?= $form->field($model, 'PRODUKSI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JUMLAH_STOK')->textInput() ?>

    <?= $form->field($model, 'HARGA')->textInput() ?>

    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
    <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
