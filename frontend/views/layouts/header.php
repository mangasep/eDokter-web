<?php
use yii\helpers\Html;
use common\models\DaftarPeriksa;
use common\models\Periksa;

$jumlah = DaftarPeriksa::find()->where(['status'=>0])->count();
$datas = DaftarPeriksa::find()->where(['status'=>0])->all();

$jumlah1 = Periksa::find()->where(['status'=>0])->count();
$datas1 = Periksa::find()->where(['status'=>0])->all();

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?=$jumlah?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Anda memiliki <?=$jumlah?> pendaftar periksa baru.</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>

                                    <?php
                                        foreach ($datas as $data) {
                                            ?>
                                                <?=Html::a('<i class="fa fa-warning text-yellow"></i>'.'Nama Pasien '.$data->pASIEN->NAMA_PASIEN,
                                                ['daftar-periksa/index', 'id'=>$data->ID_DAFTAR], ['role'=>'modal-remote', 'data-toggle'=>'tooltip'])?>
                                            <?php
                                        }
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            
                            <?=Html::a('Lihat Semua', ['daftar-periksa/index'])?>

                        </li>
                    </ul>
                </li>

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <span class="label label-success"><?=$jumlah1?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Anda memiliki <?=$jumlah1?> riwayat periksa baru.</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>

                                    <?php
                                        foreach ($datas1 as $data) {
                                            ?>
                                                <?=Html::a('<i class="fa fa-warning text-yellow"></i>'.'Nama Pasien '.$data->pASIEN->NAMA_PASIEN,
                                                ['periksa/index', 'id'=>$data->ID_PERIKSA], ['role'=>'modal-remote', 'data-toggle'=>'tooltip'])?>
                                            <?php
                                        }
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            
                            <?=Html::a('Lihat Semua', ['periksa/index'])?>

                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/avatar5.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">Staff eDokter</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                Staff eDokter
                                <!-- <small>Member since Nov. 2012</small> -->
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                </li>
            </ul>
        </div>
    </nav>
</header>
