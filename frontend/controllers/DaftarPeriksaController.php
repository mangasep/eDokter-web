<?php

namespace frontend\controllers;

use Yii;
use common\models\DaftarPeriksa;
use frontend\models\DaftarPeriksaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DaftarPeriksaController implements the CRUD actions for DaftarPeriksa model.
 */
class DaftarPeriksaController extends Controller
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
     * Lists all DaftarPeriksa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DaftarPeriksaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = [
            'pageSize' => 8
        ];

        $daftarperiksa = \common\models\Dokter::find()->all();
        $daftarperiksa = ArrayHelper::map($daftarperiksa,'ID_DOKTER','NAMA_DOKTER');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'daftarperiksa' => $daftarperiksa,
        ]);
    }

    /**
     * Displays a single DaftarPeriksa model.
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
     * Creates a new DaftarPeriksa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DaftarPeriksa();

        if ($model->load(Yii::$app->request->post())){
            try{
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash(
                        'success','Data Berhasil Disimpan'
                    );

                    return $this->redirect(['index']);

                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash(
                    'error',"{$e->getMessage()}"
                );
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
        /*if(isset($_POST['DaftarPeriksa']))
		{
			$model->attributes=$_POST['DaftarPeriksa'];
			$model->STATUS=0;
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_DAFTAR));
		}
		$this->render('create',array(
			'model'=>$model,
		));*/


    /**
     * Updates an existing DaftarPeriksa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            try{
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash(
                        'success','Update Data Berhasil'
                    );

                    return $this->redirect(['view', 'id' => $model->ID_DAFTAR]);
                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash(
                    'error',"{$e->getMessage()}"
                );
            }
        } else {
        return $this->render('update', [
            'model' => $model,
        ]);
        }


        /*$model->STATUS=1;
		if($model->save())
			$this->redirect(array('view','id'=>$model->ID_DAFTAR));

		$this->render('update',array(
			'model'=>$model,
		));*/
    }

    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            try{
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash(
                        'success','Update Data Berhasil'
                    );

                    return $this->redirect(['index']);
                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash(
                    'error',"{$e->getMessage()}"
                );
            }
        } else {
        return $this->render('update2', [
            'model' => $model,
        ]);
        }
    }

    /**
     * Deletes an existing DaftarPeriksa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()){
            Yii::$app->getSession()->setFlash(
                'danger','Hapus Data Berhasil'
            );

        }

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
            $model = $this->findModel(\Yii::$app->user->identity->ID_DAFTAR);
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
        $id_pasien =  $model->getId($id);
        define( 'API_ACCESS_KEY', 'AAAA7VQ0DWs:APA91bGUMF0SyTcn3VPKvo-odzNGu0LSGOmh7vQE0tIt0zjDHgCbSDkhyMY1CFp5J2zyplyjhAbUZ6LY_wLEnBZML9AFLJL3LGehOCw05-spbLegprwe7NwSzNK3kJ5C_j5JKvErhB44' );
        $singleID = $model->getToken($id_pasien);
        $no_urut = $model->getNomorUrut($id);
        $fcmMsg = array(
            'body' => 'No Antrian '.$no_urut,
            'title' => 'eDokter : Permintaan Disetujui',
            'sound' => "default",
                'color' => "#203E78"
        );
        $fcmFields = array(
            'to' => $singleID,
                'priority' => 'high',
            'notification' => $fcmMsg
        );

        $headers = array(
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $this->redirect(['daftar-periksa/update2', 'id' => $model->ID_DAFTAR]);
    }

    /**
     * Finds the DaftarPeriksa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DaftarPeriksa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DaftarPeriksa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
