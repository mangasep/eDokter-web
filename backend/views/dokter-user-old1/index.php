<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DokterUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dokter Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dokter User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list-alt" aria-hidden="true"></i> List User Admin & Staff</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body"> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table  table-striped table-hover'],
        'options' => ['class' => 'table-responsive'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_DOKTER',
            //'ID_USER',
            'NAMA_DOKTER',
            'EMAIL:email',
            'USERNAME',
            //'PASSWORD',
            'NO_TELPN',
            //'ALAMAT',
            //'AGAMA',
            //'TEMPAT_LAHIR',
            //'TANGGAL_LAHIR',
            //'NO_PRAKTEK',
            'SPESIALIS',
            //'STATUS',
            //'STATUS_AKUN',
            [
                'attribute' => 'STATUS_AKUN',
                'headerOptions' => ['class' => 'asas'],
                'format' => 'html', 
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($model){
                            return ($model->STATUS_AKUN)?'<i class="fa fa-check" aria-hidden="true" style="color:green;font-size:20px;"></i>':'<i class="fa fa-times" aria-hidden="true" style="color:red;font-size:20px;"></i>';
                        },
                'filter'=>array("10"=>"Active","0"=>"Inactive")
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '180'],
                'template' => '{action} {profile}',
                'buttons' => [
                    'action' => function ($url,$model) {
                        if ($model->STATUS_AKUN == 10){
                            return Html::a(
                            'Inactive', 
                             ['inactive', 'id'=>$model->ID_DOKTER], ['class' => 'btn btn-warning user-inactive']);
                        }else{
                            return Html::a(
                            'Active', 
                             ['active', 'id'=>$model->ID_DOKTER], ['class' => 'btn btn-success user-active']);
                        }
                    },
                    'profile' => function ($url,$model) {
                        return Html::a(
                        'Profile', 
                         ['dokter-user/view', 'id'=>$model->ID_DOKTER], ['class' => 'btn btn-info']);
                        },                          
                ],
            ],
        ],
    ]); ?>
</div>
