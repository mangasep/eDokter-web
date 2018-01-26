<?php

namespace frontend\controllers;

use Yii;
use common\models\Pembayaran;
use frontend\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembayaranController implements the CRUD actions for Pembayaran model.
 */
class PembayaranController extends Controller
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
     * Lists all Pembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembayaranSearch();
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
     * Displays a single Pembayaran model.
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
     * Creates a new Pembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembayaran();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post('Pembayaran');
            $biayaperiksa = $post['BIAYA_PERIKSA'];
            $biayaobat = $post['TOTAL'];
            $total = $biayaobat + $biayaperiksa;
            $model->BAYAR = (string)$total;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->ID_PEMBAYARAN]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pembayaran model.
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
            $model = $this->findModel(\Yii::$app->user->identity->ID_PEMBAYARAN);
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
        return $this->redirect(['update','id' => $model->ID_PEMBAYARAN]);
    }

    /**
     * Finds the Pembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembayaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
