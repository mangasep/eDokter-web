<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Periksa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periksa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DIAGNOSA')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CATATAN')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ID_DOKTER')->textInput() ?>

    <?= $form->field($model, 'ID_PASIEN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
