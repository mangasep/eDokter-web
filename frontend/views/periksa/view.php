<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Periksa */

$this->title = 'Detail Pemeriksaan';
$this->params['breadcrumbs'][] = ['label' => 'Periksa', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-view">

    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </p>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_PERIKSA',
            'dOKTER.NAMA_DOKTER',
            'pASIEN.NAMA_PASIEN',   
            'DIAGNOSA:ntext',
            'CATATAN:ntext',
            'dAFTAR.TANGGAL_PERIKAS',
           
        ],
    ]) ?>

</div>
