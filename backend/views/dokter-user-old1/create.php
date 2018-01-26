<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DokterUser */

$this->title = Yii::t('app', 'Create Dokter User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dokter Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
