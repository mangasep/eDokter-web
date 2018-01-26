<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DaftarPeriksa */

$this->title = "Detail Daftar Periksa";
$this->params['breadcrumbs'][] = ['label' => 'Daftar Periksa', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="daftar-periksa-view ">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_DAFTAR], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </p>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_DAFTAR',
            [
            'attribute' => 'ID_PASIEN',
            'value' => function($data) {
                return $data->pASIEN->NAMA_PASIEN;
            }],
            [
            'attribute' => 'ID_DOKTER',
            'value' => function($data) {
                return $data->dOKTER->NAMA_DOKTER;
            }],
            //'ID_PASIEN',
            //'ID_DOKTER',
            'TANGGAL_PERIKAS',
            'WAKTU_DAFTAR',
            'KELUHAN:ntext',
            //'STATUS',
            //'ID_URUT',
            
        ],
    ]) ?>
</div>
</div>

