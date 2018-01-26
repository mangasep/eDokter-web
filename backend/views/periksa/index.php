<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeriksaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Periksas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Periksa'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PERIKSA',
            'DIAGNOSA:ntext',
            'CATATAN:ntext',
            'ID_DOKTER',
            'ID_PASIEN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
