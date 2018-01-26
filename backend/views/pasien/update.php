<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pasien */

$this->title = Yii::t('app', 'Update Pasien: {nameAttribute}', [
    'nameAttribute' => $model->ID_PASIEN,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pasiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PASIEN, 'url' => ['view', 'id' => $model->ID_PASIEN]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pasien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
