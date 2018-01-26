<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pasien */

$this->title = 'Detail Data Pasien';
$this->params['breadcrumbs'][] = ['label' => 'Detail Pasien', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PASIEN], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </p>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_PASIEN',
            //'ID_USER',
            'NAMA_PASIEN',
            //'EMAIL:email',
            //'USERNAME',
            //'PASSWORD',
            'NO_TELPN',
            'ALAMAT',
            'AGAMA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'BERAT_BADAN',
            'TINGGI_BADAN',
            'GOL_DARAH',
            //'STATUS',
        ],
    ]) ?>

</div>
</div>
