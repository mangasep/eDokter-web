<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UrutPeriksa */

$this->title = 'No Urut Periksa';
$this->params['breadcrumbs'][] = ['label' => 'No Urut Periksa', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID_URUT, 'url' => ['view', 'id' => $model->ID_URUT]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="urut-periksa-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
