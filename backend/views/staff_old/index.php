<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data Staff');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <center><h1><?= Html::encode($this->title) ?></h1></center>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list-alt" aria-hidden="true"></i> List Staff</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body"> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID_STAFF',
            //'ID_USER',
            'NAMA_STAFF',
            'EMAIL:email',
            'USERNAME',
            //'PASSWORD',
            'NO_TELPN',
            //'ALAMAT',
            //'AGAMA',
            //'TEMPAT_LAHIR',
            //'TANGGAL_LAHIR',
            'STATUS',
         
        ],
    ]); ?>
    </div>
    </div>
  </div>
</div>

