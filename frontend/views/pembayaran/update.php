<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */

$this->title = 'Bayar';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_PEMBAYARAN, 'url' => ['view', 'id' => $model->ID_PEMBAYARAN]];
$this->params['breadcrumbs'][] = 'Bayar';
?>
<div class="pembayaran-update">

    <?= $this->render('form2', [
        'model' => $model,
    ]) ?>

</div>
