<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\icons\Icon;
use kartik\base\BaseAssetBundle;
//use app\assets\HighchartsAsset;
//use dosamigos\highcharts\HighCharts;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dashboard Administrator');
$this->params['breadcrumbs'][] = $this->title;

?>
<br>
 <!-- Main content -->
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo Yii::$app->db->createCommand("SELECT count(ID_DAFTAR) FROM daftar_periksa")->queryScalar();?></h3>
                        <p>Jumlah Daftar Periksa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-hospital-o"></i>
                    </div>
                    <a href="<?= Url::to(['daftar-periksa/'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6"> <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo Yii::$app->db->createCommand("SELECT count(ID_PASIEN) FROM pasien")->queryScalar();?></h3>
                    <p>Jumlah Pasien</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?= Url::to(['pasien/'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6"> <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo Yii::$app->db->createCommand("SELECT count(ID_DOKTER) FROM dokter")->queryScalar();?></h3>
                <p>Jumlah Dokter</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-md"></i>
            </div>
            <a href="<?= Url::to(['dokter/'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6"> <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo Yii::$app->db->createCommand("SELECT count(ID_STAFF) FROM staff")->queryScalar();?></h3>
                    <p>Jumlah Staff</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="<?= Url::to(['staff/'])?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        </div>  <!-- body -->
        <div class="row">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div id="my-chart" style="min-width: 310px; "></div>
                  
                  <?php 
                
                  foreach((array)$ddiagram as $values){ 
                    $a[0]= ($values['TANGGAL_PERIKAS']);
                    $c[]= ($values['TANGGAL_PERIKAS']); 
                    $b[]= array('type'=> 'column', 'name' =>$values['TANGGAL_PERIKAS'], 'data' => array((int)$values['jml']) ); 
                   }
                   echo 
                   Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'Monitoring Daftar Periksa'],
                        'xAxis' => [
                        'categories' => ['Jumlah Pasien']
                        ],
                        'yAxis' => [
                        'title' => ['text' => 'Collection Data']
                        ],
                        'series' => $b
                    ]
                   ]);
                
                    

                   ?>
                  
                  </div>
                  </div>
     
        </div>
    <!-- site-index -->
</div>

