<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JadwalDokter */

$this->title = 'Jadwal Praktek Dokter';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Dokters', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-dokter-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_JADWAL], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </p>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'attribute' => 'ID_DOKTER',
            'value' => function($data) {
                return $data->dokter->NAMA_DOKTER;
            }],
            //'ID_JADWAL',
            'WAKTU_MULAI',
            'WAKTU_SELESAI',
            //'ID_DOKTER',
        ],
    ]) ?>

</div>
</div>
