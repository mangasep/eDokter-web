<?php
namespace backend\controllers;

use Yii;

use yii\web\Controller;
use app\models\DaftarPeriksa;
use yii\helpers\Json;


class HighchartsController extends Controller
{
     public function actionIndex()
    {

       // $data = Yii::$app->db->createCommand('SELECT TANGGAL_PERIKAS, COUNT(*) as jml FROM daftar_periksa GROUP BY TANGGAL_PERIKAS')->queryAll();
       // return $this->render('diagram', [
         //   'ddiagram' => $data 

         $data = Yii::$app->db->createCommand('SELECT TANGGAL_PERIKAS, COUNT(*) as jml FROM daftar_periksa GROUP BY TANGGAL_PERIKAS')->queryAll();
         //print_r($data);
         return $this->render('diagram', [
         'ddiagram' => $data 
         ]);

    
    }


}