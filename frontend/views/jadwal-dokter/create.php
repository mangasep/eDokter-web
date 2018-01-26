<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JadwalDokter */

$this->title = 'Tambah Jadwal Dokter';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Dokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-dokter-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
