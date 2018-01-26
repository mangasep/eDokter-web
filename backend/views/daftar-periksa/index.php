<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DaftarPeriksaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pemeriksaan');
$this->params['breadcrumbs'][] = $this->title;
?> 
<div class="daftar-periksa-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div> 
      <div class="box-header with-border">
        <center><h3><?= Html::encode($this->title) ?></h3></center>
        <h3 class="box-title"><i class="fa fa-list-alt" aria-hidden="true"></i> List Daftar Pemeriksaan</h3>
      </div>
      <div class="box-body"> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table  table-striped table-hover'],
        'options' => ['class' => 'table-responsive'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DAFTAR',
            [
                'attribute' => 'ID_PASIEN',
                'value'     => function ($data) {
                    return $data->pASIEN->NAMA_PASIEN;
                },
            ],
            //'ID_PASIEN',
            //'ID_DOKTER',
            [
                'attribute' => 'ID_DOKTER',
                'value'     => function ($data) {
                    return $data->dOKTER->NAMA_DOKTER;
                },
            ],
            'WAKTU_DAFTAR',
            'TANGGAL_PERIKAS',
            'KELUHAN:ntext',
            'STATUS',
            'ID_URUT',
     
            ['class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['class' => 'table-responsive'],
            'template' => '{view}',   //{view}&nbsp;
             'buttons' => [
                 'view' => function($url, $model)   {
                        return Html::a('<button class="btn btn-success">View &nbsp;<i class="glyphicon glyphicon-eye-open"></i></button>',$url);
                    }
          
          ],
        ],
      ],
    ]); ?>
      <?= Html::a('Export PDF', ['export-pdf'], ['class'=>'btn btn-success']); ?>
</div>
