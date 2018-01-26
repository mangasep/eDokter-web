<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\DokterUser */

$this->title = Yii::t('app', 'Create Dokter User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokter Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div> 
    </div>
    <div class="box-body">
    <?= $this->render('_form', [
      'model' => $model,
  ]) ?>

    </div>
  </div>
</div>
</div>

