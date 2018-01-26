<?php 
use yii\helpers\Html;
use kartik\icons\Icon;
use kartik\base\BaseAssetBundle;
use common\models\User;

 ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
        <?= Html::img('@web/'.\Yii::$app->user->identity->staff->pic.'?'.rand(1,32000), ['class' => 'img-circle', 'alt'=>'User Image']); ?>
        </div>
        <div class="pull-left info">
            <P><?= \Yii::$app->user->identity->username ?> (<small><?= \Yii::$app->user->identity->staff->JOB_DESC ?></small>)</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Admin Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Daftar Pemeriksaan', 'icon' => 'fa fa-files-o', 'url' => ['/daftar-periksa'],'visible'=>User::isUserAdmin(Yii::$app->user->identity->username) || User::isUserDirektur(Yii::$app->user->identity->username)],
                    ['label' => 'Data Pasien', 'icon' => 'fa fa-files-o', 'url' => ['/pasien'],'visible'=>User::isUserAdmin(Yii::$app->user->identity->username)|| User::isUserDirektur(Yii::$app->user->identity->username)],
                    ['label' => 'Data Dokter', 'icon' => 'fa fa-user-md', 'url' => ['/dokter'],'visible'=>User::isUserAdmin(Yii::$app->user->identity->username)|| User::isUserDirektur(Yii::$app->user->identity->username)],
                    ['label' => 'Data Staff Petugas', 'icon' => 'fa fa-files-o', 'url' => ['/staff'],'visible'=>User::isUserAdmin(Yii::$app->user->identity->username)|| User::isUserDirektur(Yii::$app->user->identity->username)],
                    [
                        'label' => 'User Manager','visible'=>User::isUserAdmin(Yii::$app->user->identity->username),
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Dokter', 'icon' => 'fa fa-hospital-o', 'url' => ['/dokter-user'],],
                            ['label' => 'Staff Petugas', 'icon' => 'file-code-o', 'url' => ['/user-manajemen/'],],
                        ],
                    ],
                    [
                        'label' => 'Setup', 'visible'=>User::isUserAdmin(Yii::$app->user->identity->username),
                        'icon' => 'fa fa-gears',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Backup & Restore', 'icon' => 'fa fa-database', 'url' => ['/backuprestore']],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        ],
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
