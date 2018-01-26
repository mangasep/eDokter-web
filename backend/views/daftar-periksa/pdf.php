<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
$directoryAsset = Yii::getAlias('@web');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Data</title>
    <style>
        .page
        {           
            padding:2cm;
        }
        table
        {
            border-spacing:0;
            border-collapse: collapse; 
            width:100%;
        }

        table, table th
        {
            border: 1px solid #ccc;
        }
        table td, 
        {
            background-color: #FFFFFF;
        }
		
		table th
        {
            background-color:solid #E6E6E6;
        }
    </style>
</head>
<body>	

    <div class="page">
    <table width="100%">
<tr>
<td width="25" align="center"><?= Html::img('@web/img/kemenkes.png', ["class"=>"user-image", "alt"=>"User Image", "width"=>"10%", "height"=>"10%"]);?></td>
<td width="50" align="center"><h3>Poliklinik Pratama Mulia</h3>
<br><h4>Jl. Solo-Sragen KM 10, Sroyo, Jaten, Karanganyar 57771</h4>
<br><h4>Telp: 0271089823, Email: polipratam@gmail.com</td>

</tr>
</table>
<hr>	
        <center><h3>Data Daftar Periksa</h3></center>
        <table border="0">
        <tr>
                <th>No</th>
                <th>Id Daftar</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Waktu Daftar</th>
                <th>Keluhan</th>
                <th>Tanggal Periksa</th>
                <th>Waktu Daftar</th>
                <th>No Urut</th>

        </tr>

        <?php
        $no = 1;
        foreach($dataProvider->getModels() as $daftarperiksa){ 
        ?>
        <tr>
                <td><?= $no++ ?></td>
                <td><?= $daftarperiksa->ID_DAFTAR ?></td>
                <td><?= $daftarperiksa->pasien->NAMA_PASIEN ?></td>
                <td><?= $daftarperiksa->dokter->NAMA_DOKTER ?></td>
                <td><?= $daftarperiksa->WAKTU_DAFTAR ?></td>
                <td><?= $daftarperiksa->KELUHAN ?></td>
                <td><?= $daftarperiksa->TANGGAL_PERIKAS ?></td>
                <td><?= $daftarperiksa->WAKTU_DAFTAR ?></td>
                <td><?= $daftarperiksa->ID_URUT ?></td>
        </tr>
        <?php
        }
        ?>

        </table>
    </div>   
</body>
</html>