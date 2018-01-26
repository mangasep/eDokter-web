<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UrutPeriksaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Urut Periksas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urut-periksa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Urut Periksa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_URUT',
            'NO_URUT',
            'WAKTU_PERIKSA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
