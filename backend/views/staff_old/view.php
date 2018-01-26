<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Staff */

$this->title = $model->ID_STAFF;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID_STAFF], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID_STAFF], [
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
            'ID_STAFF',
            'ID_USER',
            'NAMA_STAFF',
            'EMAIL:email',
            'USERNAME',
            'PASSWORD',
            'NO_TELPN',
            'ALAMAT',
            'AGAMA',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'STATUS',
        ],
    ]) ?>

</div>
