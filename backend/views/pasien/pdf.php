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

        table , table th
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
        <h3>Data Pasien</h3>
        <table border="0">
        <tr>
                <th>No</th>
                <th>Id Pasien</th>
                <th>Nama Pasien</th>
                <th>Email</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>

        </tr>

        <?php
        $no = 1;
        foreach($dataProvider->getModels() as $pasien){ 
        ?>
        <tr>
                <td><?= $no++ ?></td>
                <td><?= $pasien->ID_PASIEN ?></td>
                <td><?= $pasien->NAMA_PASIEN ?></td>
                <td><?= $pasien->EMAIL ?></td>
                <td><?= $pasien->NO_TELPN ?></td>
                <td><?= $pasien->ALAMAT ?></td>
                <td><?= $pasien->TEMPAT_LAHIR ?></td>
                <td><?= $pasien->TANGGAL_LAHIR ?></td>
        </tr>
        <?php
        }
        ?>

        </table>
    </div>   
</body>
</html>