<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Periksa */

$this->title = $model->ID_PERIKSA;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periksas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID_PERIKSA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID_PERIKSA], [
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
            'ID_PERIKSA',
            'DIAGNOSA:ntext',
            'CATATAN:ntext',
            'ID_DOKTER',
            'ID_PASIEN',
        ],
    ]) ?>

</div>
