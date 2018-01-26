<?php

namespace frontend\controllers;

use Yii;
use common\models\Periksa;
use frontend\models\PeriksaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


/**
 * PeriksaController implements the CRUD actions for Periksa model.
 */
class PeriksaController extends Controller
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
     * Lists all Periksa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeriksaSearch();
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
     * Displays a single Periksa model.
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
     * Creates a new Periksa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Periksa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PERIKSA]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Periksa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PERIKSA]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Periksa model.
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
     * Finds the Periksa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Periksa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Periksa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCetakriwayat()
    {
        $searchModel = new PeriksaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $content = $this->renderPartial('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);

        $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE,
        'format' => Pdf::FORMAT_A4,
        'filename' => 'Riwayat_Periksa',
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'destination' => Pdf::DEST_BROWSER,
        'content' => $content,
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
        'cssInline' => '.kv-heading-1{font-size:18px}',
        'options' => ['title' => 'REKAP RIWAYAT PERIKSA PASIEN'],
        'methods' => [
            'SetHeader'=>['e-Dokter || Riwayat Periksa Pasien'],
            'SetFooter'=>['{PAGENO}'],
            ]
            ]);

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');

        return $pdf->render();
    }

          /**
     * Change status user to inactive
     * @param integer $id
     * @return mixed
     */
    public function actionInactive($id = null)
    {
        if ($id != null){
            $model = $this->findModel($id);
            $model->STATUS = 0;
            if ($model->save()){
                return $this->redirect(['index']);
            }else{
                print_r($model->getErrors());
            }           
        }else{
            $model = $this->findModel(\Yii::$app->user->identity->ID_PERIKSA);
            $model->STATUS = 0;
            $model->save();
            //if ($model->save()){
                //Yii::$app->user->logout();
                //Yii::$app->session->setFlash('info','Account inactive');
                //return $this->goHome();
            //}
        }
       
    }

    /**
     * Change status user to Active
     * @param integer $id
     * @return mixed
     */
    public function actionActive($id)
    {
        $model = $this->findModel($id);
        $model->STATUS= 10;
        $model->save();
        return $this->redirect(['index']);
    }
}