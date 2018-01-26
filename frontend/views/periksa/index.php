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
                        <h3 class="box-title"><i class="fa fa-search" aria-hidden="true"></i>Cari Riwayat Periksa</h3>
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

            //'ID_PERIKSA',
            'dOKTER.NAMA_DOKTER',
            'pASIEN.NAMA_PASIEN',
            'DIAGNOSA:ntext',
            'CATATAN:ntext',
            'dAFTAR.TANGGAL_PERIKAS',
            [
                'header' => 'Action',
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '100'],
                'template' => '{action}',
                'buttons' => [
                    'action' => function ($url,$model) {
                        if ($model->STATUS == 10){
                            return Html::a(
                            'Selesai', 
                             ['inactive', 'id'=>$model->ID_PERIKSA], ['class' => 'btn btn-success disabled']);
                        }else{
                            return Html::a(
                            'Acc',
                            ['active','id'=>$model->ID_PERIKSA],['class' => 'btn btn-warning user-inactive']);
                        }
                        
                    },                        
                ],
            ],  

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}'
        ],
        ],
    ]);
     ?>
     <?= Html::a('Cetak', ['cetakriwayat'], ['class' => 'btn btn-danger btn-sm']) ?>
</div>
</div>
