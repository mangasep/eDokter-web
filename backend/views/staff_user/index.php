<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;


/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Staff Petugas Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

<center><h1><?= Html::encode($this->title) ?></h1></center>
<?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<!--<p>
     //Html::a(Yii::t('app', 'Create Staff'), ['create'], ['class' => 'btn btn-success']) 
</p>-->

<div class="row">
<div class="col-md-12">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-list-alt" aria-hidden="true"></i> List Staff Petugas Users</h3>
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

            'ID_STAFF',
            //'user_id',
            'NAMA_STAFF',
            'EMAIL:email',
            //'USERNAME',
            //'PASSWORD',
            'NO_TELPN',
            'ALAMAT',
            'AGAMA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'JOB_DESC',
            //'STATUS',
            //'pic',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['width' => '180'],
            'template' => '{view}&nbsp{delete}',   //{view}&nbsp;
             'buttons' => [
                 'view' => function($url, $model)   {
                        return Html::a('<button class="btn btn-success">View &nbsp;<i class="glyphicon glyphicon-eye-open"></i></button>',['staff/view', 'id'=>$model->ID_STAFF]);
                    },
                 'delete' => function($url, $model) {
                      return Html::a('<button class="btn btn-danger">Delete &nbsp;<i class="glyphicon glyphicon-trash"></i></button>', $url, 
                             ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' =>'POST']
                          );
                    }
          
          ],
        ],
        ],
    ]); ?>
    </div>
    </div>
  </div>
</div>

