<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DokterUser */

$this->title = Yii::t('app', 'Update Dokter User: {nameAttribute}', [
    'nameAttribute' => $model->ID_DOKTER,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokter Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DOKTER, 'url' => ['view', 'id' => $model->ID_DOKTER]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dokter-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
