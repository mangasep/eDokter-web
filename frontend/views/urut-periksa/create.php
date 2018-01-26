<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UrutPeriksa */

$this->title = 'Nomor Urut Periksa';
$this->params['breadcrumbs'][] = ['label' => 'Nomor Urut Periksa', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urut-periksa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
