<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
