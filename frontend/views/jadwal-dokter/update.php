<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JadwalDokter */

$this->title = 'Update Jadwal Dokter';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Praktek Dokter', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_JADWAL, 'url' => ['view', 'id' => $model->ID_JADWAL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-dokter-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
