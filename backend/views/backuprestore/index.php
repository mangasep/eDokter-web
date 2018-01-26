<div class="backup-default-index">

    <?php
    $this->params ['breadcrumbs'] [] = [
        'label' => 'Backup & Restore Data',
        'url' => array(
            'index'
        )
    ];
    ?>


    <div class="row">
        <div class="col-md-12">
            <?php
            echo $this->render('_list', array(
                'dataProvider' => $dataProvider
            ));
            ?>
        </div>
    </div>

</div>