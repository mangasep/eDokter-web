<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DokterUser */

$this->title = $model->ID_DOKTER;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokter Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID_DOKTER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID_DOKTER], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_DOKTER',
            'ID_USER',
            'NAMA_DOKTER',
            'EMAIL:email',
            'USERNAME',
            'PASSWORD',
            'NO_TELPN',
            'ALAMAT',
            'AGAMA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'NO_PRAKTEK',
            'SPESIALIS',
            'STATUS',
            'STATUS_AKUN',
        ],
    ]) ?>

</div>
