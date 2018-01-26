<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DokterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data Dokter');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-index">


    <!--<p>
         //Html::a(Yii::t('app', 'Create Dokter'), ['create'], ['class' => 'btn btn-success']) 
    </p>-->

    <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <center><h3><?= Html::encode($this->title) ?></h3></center>

      <div class="box-header with-border">
      <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        <h3 class="box-title"><i class="fa fa-list-alt" aria-hidden="true"></i> List Dokter</h3>
        
      </div>
      <div class="box-body"> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table  table-striped table-hover'],
        'options' => ['class' => 'table-responsive'],
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DOKTER',
            //'ID_USER',
            'NAMA_DOKTER',
            //'EMAIL:email',
            //'USERNAME',
            //'PASSWORD',
            'NO_TELPN',
            'ALAMAT',
            'AGAMA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'NO_PRAKTEK',
            'SPESIALIS',
            //'STATUS',
            ['class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['table-responsive'],
            'template' => '{view}',   //{view}&nbsp;
             'buttons' => [
                 'view' => function($url, $model)   {
                        return Html::a('<button class="btn btn-success">View &nbsp;<i class="glyphicon glyphicon-eye-open"></i></button>',$url);
                    }
          
          ],
        ],
        ],
        
    ]); ?>
    </div>
    </div>
  </div>
</div>
