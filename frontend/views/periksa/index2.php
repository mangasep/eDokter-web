<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PeriksaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title ='Riwayat Periksa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-index panel panel-info">

        <div class="panel-heading">
            <h4><?= Html::encode($this->title) ?>         </h4>
        </div>
        <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            </div>
        </div>
    </div>
<div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_PERIKSA',
            'dOKTER.NAMA_DOKTER',
            'pASIEN.NAMA_PASIEN',
            'DIAGNOSA:ntext',
            'CATATAN:ntext',
            'dAFTAR.TANGGAL_PERIKAS',
        ],
    ]);
     ?>
</div>
</div>
