<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use app\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DaftarPeriksa */

$this->title = $model->ID_DAFTAR;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Periksas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


        <div class="box-body">
          	<div class="col-md-8 col-md-offset-1">
            <p class="profil-title"><b> ID Pendaftaran </b></p>
            <p class="profil-desc"><?= $model->ID_DAFTAR ?></p>
            <hr>
            <p class="profil-title"><b> ID Pasien </b></p>
            <p class="profil-desc"><?= $model->ID_PASIEN ?></p>
            <hr>
            <p class="profil-title"><b> ID Dokter </b></p>
            <p class="profil-desc"><?= $model->ID_DOKTER ?></p>
            <hr>
            <p class="profil-title"><b> Tanggal Periksa </b></p>
            <p class="profil-desc"><?= $model->TANGGAL_PERIKAS ?></p>
            <hr>
            <p class="profil-title"><b> Keluhan </b></p>
            <p class="profil-desc"><?= $model->KELUHAN ?></p>
            <hr>
            <p class="profil-title"><b> Status </b></p>
            <p class="profil-desc"><?= $model->STATUS ?></p>
            <hr>
            <p class="profil-title"><b> Waktu Daftar </b></p>
            <p class="profil-desc"><?= $model->WAKTU_DAFTAR ?></p>
            <hr>
            <p class="profil-title"><b> ID Urut </b></p>
            <p class="profil-desc"><?= $model->ID_URUT ?></p>
          	</div>
            
          </div>
        </div>
  
      </div>
    </div>
  </div>
</div>