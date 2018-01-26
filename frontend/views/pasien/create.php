<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pasien */

$this->title = 'Tambah Pasien Baru';
$this->params['breadcrumbs'][] = ['label' => 'Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
