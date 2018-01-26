<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JadwalDokterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title ='Jadwal Praktek Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-dokter-index panel panel-info">

    <div class="panel-heading">
    <h4><?= Html::encode($this->title) ?>
    <span class="pull-right">
        <?= Html::a('Jadwal Praktek Dokter', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </span>
    </h4>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search" aria-hidden="true"></i>Cari Jadwal Dokter</h3>
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            </div>
        </div>
        <div class="box-body" style="display: none;">
        <div class="table-responsive">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
        </div>
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_JADWAL',
             [
            'attribute' => 'ID_DOKTER',
            'value' => function($data) {
                return $data->dOKTER->NAMA_DOKTER;
            }],
            'WAKTU_MULAI',
            'WAKTU_SELESAI',
            //'ID_DOKTER',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}']
        ],
    ]); ?>
</div>
</div>
