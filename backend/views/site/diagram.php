<?php 
                  $this->title = 'Data Pemeriksaan';
                  foreach((array)$ddiagram as $values){ 
                    $a[0]= ($values['TANGGAL_PERIKAS']);
                    $c[]= ($values['TANGGAL_PERIKAS']); 
                    $b[]= array('type'=> 'column', 'name' =>$values['TANGGAL_PERIKAS'], 'data' => array((int)$values['jml']) ); 
                   }
                   echo 
                   Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'Monitoring Collection'],
                        'xAxis' => [
                        'categories' => ['jml']
                        ],
                        'yAxis' => [
                        'title' => ['text' => 'Collection Data']
                        ],
                        'series' => $b
                    ]
                   ]);
                
                    

                   ?>