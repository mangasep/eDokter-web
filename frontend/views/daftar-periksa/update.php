<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DaftarPeriksa */

$this->title = 'Update Daftar Periksa';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Periksas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_DAFTAR, 'url' => ['view', 'id' => $model->ID_DAFTAR]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daftar-periksa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
