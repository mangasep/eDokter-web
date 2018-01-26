<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Periksa */

$this->title = Yii::t('app', 'Update Periksa: {nameAttribute}', [
    'nameAttribute' => $model->ID_PERIKSA,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periksas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PERIKSA, 'url' => ['view', 'id' => $model->ID_PERIKSA]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="periksa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
