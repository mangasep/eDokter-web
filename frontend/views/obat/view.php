<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Obat */

$this->title = "Detail Obat";
$this->params['breadcrumbs'][] = ['label' => 'Data Obat', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Update', ['update', 'id' => $model->ID_OBAT], ['class' => 'btn btn-primary btn-sm']) ?>
    <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID_OBAT',
            'NAMA_OBAT',
            'HARGA',
            'PRODUKSI',
            'JUMLAH_STOK',
            'TANGGAL_MASUK',
        ],
    ]) ?>

</div>
</div>
