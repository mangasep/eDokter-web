<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pasien */

$this->title = 'Update Data Pasien';
$this->params['breadcrumbs'][] = ['label' => 'Pasiens', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_PASIEN, 'url' => ['view', 'id' => $model->ID_PASIEN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pasien-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
