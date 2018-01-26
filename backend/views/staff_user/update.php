<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Staff */

$this->title = Yii::t('app', 'Update Staff: {nameAttribute}', [
    'nameAttribute' => $model->ID_STAFF,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_STAFF, 'url' => ['view', 'id' => $model->ID_STAFF]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
