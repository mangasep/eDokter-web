<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Obat */

$this->title = 'Update Obat';
$this->params['breadcrumbs'][] = ['label' => 'Obat', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_OBAT, 'url' => ['view', 'id' => $model->ID_OBAT]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
