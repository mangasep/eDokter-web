<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-index panel panel-info">

    <div class="panel-heading">
    <h4><?= Html::encode($this->title) ?>
    <span class="pull-right">
        <?= Html::a('Bayar', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </span>
    </h4>
    </div>
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_PEMBAYARAN',
            [
                'attribute' => 'ID_PERIKSA',
                'value' => function($data) {
                    return $data->pERIKSA->pASIEN->NAMA_PASIEN;
                }],
            'BIAYA_PERIKSA',
            //'ID_RESEP',
            'TOTAL',
            'BAYAR',
            [
                'attribute' => 'KEMBALI',
                'value' => function($data) {
                    if ($data->KEMBALI==NULL){
                        return 0;
                    }else{
                    return $data->KEMBALI;
                    }
                }],
            //'KEMBALI',
            // [
            // 'header' =>'Kembali',
            // 'value' => function ($model){
            //     $bayar = $model['KEMBALI'];
            //     $total = $model['BAYAR'];
            //     $kembali = $model->kembali($bayar, $total);
            //     if ($kembali < 0 ) {
            //         return 0; 
            //     } else {
            //         return $kembali;
            //     }
            // } 
            // ],
            [
            'header' => 'Action',
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['width' => '100'],
            'template' => '{action}',
            'buttons' => [
                'action' => function ($url,$model) {
                    if ($model->STATUS == 10){
                        return Html::a(
                        'Lunas', 
                         ['inactive', 'id'=>$model->ID_PEMBAYARAN], ['class' => 'btn btn-success disabled']);
                    }else{
                        return Html::a(
                        'Bayar',
                        ['active','id'=>$model->ID_PEMBAYARAN],['class' => 'btn btn-warning user-inactive']);
                    }
                    
                },                        
            ],
        ],  
            //'STATUS',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{delete}']
        ],
    ]); ?>
</div>
