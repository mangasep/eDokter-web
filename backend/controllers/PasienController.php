<?php

namespace backend\controllers;

use Yii;
use common\models\Pasien;
use app\models\PasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\helpers\Url;

/**
 * PasienController implements the CRUD actions for Pasien model.
 */
class PasienController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pasien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = [
            'pageSize' => 8
        ];
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pasien model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pasien();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PASIEN]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PASIEN]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pasien::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionPdf() {
        //$searchModel = new PasienSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $content = $this->renderPartial('pdf',['dataProvider'=>$dataProvider]);
        
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, 
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'options' => ['title' => 'Laporan Harian']
             
        ]);
        //return $pdf->render();
        return $pdf->render();
    }

    public function actionExportPdf()
    {
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $pdf = $this->renderPartial('pdf',['dataProvider'=>$dataProvider]);
        $mpdf=new \mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);  
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($pdf);
        $mpdf->Output();
        exit;
    }

    /*
	EXPORT WITH PHPEXCEL
	*/ 
	public function actionExportExcel()
    {
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
        $template = Yii::getAlias('@hscstudio/export').'/templates/phpexcel/export.xlsx';
        $objPHPExcel = $objReader->load($template);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_FOLIO);
        $baseRow=2; // line 2
        foreach($dataProvider->getModels() as $pasien){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$baseRow, $baseRow-1);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$baseRow, $pasien->ID_PASIEN);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$baseRow, $pasien->NAMA_PASIEN);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$baseRow, $pasien->EMAIL);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$baseRow, $pasien->ALAMAT);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$baseRow, $pasien->TEMPAT_LAHIR);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$baseRow, $pasien->TANGGAL_LAHIR);
            $baseRow++;
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="export.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        $objWriter->save('php://output');
        exit;
    }

    /*
	EXPORT WITH OPENTBS
	*/
    public function actionExportExcel2()
    {
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        // Initalize the TBS instance
        $OpenTBS = new \hscstudio\export\OpenTBS; // new instance of TBS
        // Change with Your template kaka
		$template = Yii::getAlias('@hscstudio/export').'/templates/opentbs/ms-excel.xlsx';
        $OpenTBS->LoadTemplate($template); // Also merge some [onload] automatic fields (depends of the type of document).
        //$OpenTBS->VarRef['modelName']= "Mahasiswa";				
        $data = [];
        $no=1;
        foreach($dataProvider->getModels() as $pasien){
            $data[] = [
                'No.'=>$no++,
                'Id Pasien'=>$pasien->ID_PASIEN,
                'Nama Pasien'=>$pasien->NAMA_PASIEN,
                'Email'=>$pasien->EMAIL,
                'Alamat'=>$pasien->ALAMAT,
                'Tempat Lahir'=>$pasien->TEMPAT_LAHIR,
                'Tanggal Lahir'=>$pasien->TANGGAL_LAHIR,
            ];
        }
        
    
        $OpenTBS->MergeBlock('data', $data);
      
        // Output the result as a file on the server. You can change output file
        $OpenTBS->Show(OPENTBS_DOWNLOAD, 'export.xlsx'); // Also merges all [onshow] automatic fields.			
        exit;
    } 
    
    public function actionExport(){
        $model = Mahasiswa::find()->All();
        $filename = 'Data-'.Date('YmdGis').'-Mahasiswa.xls';
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
            <thead>
                <tr>
                    <th>Mim</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                </tr>
            </thead>';
            foreach($model as $data){
                echo '
                    <tr>
                        <td>'.$data['nim'].'</td>
                        <td>'.$data['nama'].'</td>
                        <td>'.$data['jurusan'].'</td>
                        <td>'.$data['angkatan'].'</td>
                        <td>'.$data['alamat'].'</td>
                        <td><img src="'.Yii::$app->request->baseUrl.'/uploads/'.$data['foto'].'" width="100px"></td>
                    </tr>
                ';
            }
        echo '</table>';
    
    }
}
