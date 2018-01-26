<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widget\Pjax;
use yii\helpers\Url;





/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DaftarPeriksaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Periksa';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="daftar-periksa-index panel panel-info">


    <div class="panel-heading">
        <h4><?= Html::encode($this->title) ?>
        <span class="pull-right">
            <?= Html::a('Tambah Daftar Periksa', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
        </span>
        </h4>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search" aria-hidden="true"></i>Cari Daftar Periksa</h3>
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
            /*[   'class' => 'yii\grid\DataColumn',
                'attribute' => 'ID_DOKTER',
                'value' => function($data) {
                    return $data->dokter->NAMA_DOKTER;},
                'filter' => Html::activeDropDownList($searchModel, 'ID_DOKTER',$daftarperiksa)
                ],
            //'ID_PASIEN',
            //'ID_DOKTER',
            'TANGGAL_PERIKAS',
            //'WAKTU_DAFTAR',*/
            'KELUHAN:ntext',
            /*[
            'attribute' => 'ID_URUT',
            'value' => function($data) {
                return $data->uRUT->WAKTU_PERIKSA;
            }],*/
            'uRUT.NO_URUT',
            /*[
                'attribute'  => 'STATUS',
                'value' => Html::a('Approve',array('submit'=>array('update','id'=>$model->ID_DAFTAR))),
                'format'  => 'raw',
            ],*/
            [
                'attribute' => 'STATUS',
                'headerOptions' => ['class' => 'asas'],
                'format' => 'html',
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($model){
                            return ($model->STATUS)?'<i class="fa fa-check" aria-hidden="true" style="color:green;font-size:20px;"></i>':'<i class="fa fa-times" aria-hidden="true" style="color:red;font-size:20px;"></i>';
                        },
                'filter'=>array("10"=>"Sudah Acc","0"=>"Belum Acc")
            ],
            [
                'header' => 'Action',
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '100'],
                'template' => '{action}',
                'buttons' => [
                    'action' => function ($url,$model) {
                        if ($model->STATUS == 0){
                          return Html::a(
                          'Belum Acc',['active','id'=>$model->ID_DAFTAR],['class' => 'btn btn-warning user-inactive']);
                        }else{
                          return Html::a(
                          'Sudah Acc',
                           ['inactive', 'id'=>$model->ID_DAFTAR], ['class' => 'btn btn-success disabled']);
                        }

                    },
                ],
            ],
            //'STATUS',
            //'WAKTU_DAFTAR',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}']
        ],
    ]); ?>
</div>
</div>
