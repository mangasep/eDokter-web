<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DaftarPeriksa */

$this->title = Yii::t('app', 'Create Daftar Periksa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Periksas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daftar-periksa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
