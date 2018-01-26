<?php

/* @var $this yii\web\View */

$this->title = 'eDokter';

?>

<div class="site-index">
    <div class="body-content">
  
    <div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
            <h3><?php echo Yii::$app->db->createCommand(
            "SELECT count(ID_DAFTAR) FROM daftar_periksa ")->queryScalar();?></h3>
            <p>Jumlah Daftar Periksa</p>
        </div>
<div class="icon">
<i class="fa fa-hospital-o"></i>
</div>
    </div>
    </div><!-- ./col -->

<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
        <h3><?php echo Yii::$app->db->createCommand(
        "SELECT count(ID_PASIEN) FROM pasien ")->queryScalar();?></h3>
        <p>Total Jumlah Pasien</p>
    </div>
<div class="icon">
<i class="fa fa-users"></i>
</div>

</div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
        <h3><?php echo Yii::$app->db->createCommand(
        "SELECT count(ID_DOKTER) FROM dokter  ")->queryScalar();?></h3>
        <p>Total Jumlah Dokter</p>
    </div>
<div class="icon">
<i class="fa fa-user-md"></i>
</div>


</div>

    </div>
    

</div>

