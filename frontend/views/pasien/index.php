<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title ='Daftar Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index panel panel-info">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel-heading">
    <h4><?= Html::encode($this->title) ?>
    <span class="pull-right">
        <?= Html::a('Daftar Pasien', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </span>
    </h4>
</div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search" aria-hidden="true"></i>Cari Pasien</h3>
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

            //'ID_PASIEN',
            //'ID_USER',
            'NAMA_PASIEN',
            'EMAIL:email',
            //'USERNAME',
            //'PASSWORD',
            'NO_TELPN',
            'ALAMAT',
            //'AGAMA',
            //'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            //'BERAT_BADAN',
            //'TINGGI_BADAN',
            //'GOL_DARAH',
            //'STATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
