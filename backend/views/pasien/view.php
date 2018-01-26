<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use app\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pasien */

$this->title = 'Pasien';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pasien'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$directoryAsset = Yii::getAlias('@web');
$this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");   
?>

<div class="row">
  <div class="col-md-3">
    <div class="box box-widget widget-user">
      <div class="widget-user-header bg-black" style="background: url('<?= $directoryAsset ?>/img/bg_profile.jpg') center center;">
      </div>
      <div class="widget-user-image">
      <?= Html::img('@web/img/pasien.jpg', ['class' => 'img-circle']); ?>
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-12">
            <div class="description-block">
              <h3 class="widget-user-username">
              	<?=	$model->USERNAME; ?>
              </h3>
              <h5 class="widget-user-desc">
              	<b>Pasien</b></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#staff" data-toggle="tab" class="title"><i class="fa fa-address-card-o" aria-hidden="true"></i> Profile</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="staff">
          <div class="row">
          	<div class="col-md-8 col-md-offset-1">
            <p class="profil-title"><b> ID Pasien </b></p>
            <p class="profil-desc"><?= $model->ID_PASIEN ?></p>
            <hr>
            <p class="profil-title"><b> Nama Lengkap </b></p>
            <p class="profil-desc"><?= $model->NAMA_PASIEN ?></p>
            <hr>
            <p class="profil-title"><b> Email </b></p>
            <p class="profil-desc"><?= $model->EMAIL ?></p>
            <hr>
            <p class="profil-title"><b> Username </b></p>
            <p class="profil-desc"><?= $model->USERNAME ?></p>
            <hr>
            <p class="profil-title"><b> No Telp </b></p>
            <p class="profil-desc"><?= $model->NO_TELPN ?></p>
            <hr>
            <p class="profil-title"><b> Alamat </b></p>
            <p class="profil-desc"><?= $model->ALAMAT ?></p>
            <hr>
            <p class="profil-title"><b> Agama </b></p>
            <p class="profil-desc"><?= $model->AGAMA ?></p>
            <hr>
            <p class="profil-title"><b> Tempat Lahir </b></p>
            <p class="profil-desc"><?= $model->TEMPAT_LAHIR ?></p>
            <hr>
            <p class="profil-title"><b> Tanggal Lahir </b></p>
            <p class="profil-desc"><?= $model->TANGGAL_LAHIR ?></p>
            <hr>
            <p class="profil-title"><b> Berat Badan </b></p>
            <p class="profil-desc"><?= $model->BERAT_BADAN ?></p>
            <hr>
            <p class="profil-title"><b> Tinggi Badan </b></p>
            <p class="profil-desc"><?= $model->TINGGI_BADAN ?></p>
            <hr>
            <p class="profil-title"><b> Golongan Darah </b></p>
            <p class="profil-desc"><?= $model->GOL_DARAH ?></p>
          	</div>
            
          </div>
        </div>
  
      </div>
    </div>
  </div>
</div>
<?php
Modal::begin([
    'id' => 'myModal',
    'header' => '<h4 class="modal-title">...</h4>',
    'headerOptions'=>[
    	'style'=> 'background : #3c8dbc;color:white;',
    ]
]);
 
echo '...';
 
Modal::end();
?>
