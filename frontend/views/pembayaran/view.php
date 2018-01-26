<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */

$this->title = 'Detail Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PEMBAYARAN], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </p>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_PEMBAYARAN',
            //'ID_PERIKSA',
            [
                'attribute' => 'ID_PERIKSA',
                'value' => function($data) {
                    return $data->pERIKSA->pASIEN->NAMA_PASIEN;
                }],
            'BIAYA_PERIKSA',
            //'ID_RESEP',
            'TOTAL',
            'BAYAR',
            //'KEMBALI',
            //'STATUS',
        ],
    ]) ?>

</div>
