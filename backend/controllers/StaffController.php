<?php

namespace backend\controllers;

use Yii;
use common\models\Staff;
use app\models\StaffSearch;
use app\models\PasswordForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\helpers\RecordHelpers;
use app\models\User;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update','view','create','delete','findModel','update-pic','validate','change-password','change-username'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
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
     * Displays a single Staff model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id = null)
    {
        if ($id != null){
            if (RecordHelpers::userMustBeOwner('staff',$id)) { 
                $modelPassword = new PasswordForm;
                $model = $this->findModel(\Yii::$app->user->identity->id);
                $modelUser = User::find()->where(['username'=>Yii::$app->user->identity->username])->one();
                return $this->render('view',[
                                        'model' => $model,
                                        'modelPassword' => $modelPassword,
                                        'modelUser' => $modelUser,
                ]);
            }else{
                $model = $this->findModelUserId($id);
                    return $this->render('view',[
                        'model' => $model,
                ]);
            }
        }else {
            $modelPassword = new PasswordForm;
            $model = $this->findModel(\Yii::$app->user->identity->id);
            $modelUser = User::find()->where(['username'=>Yii::$app->user->identity->username])->one();
            return $this->render('view',[
                                    'model' => $model,
                                    'modelPassword' => $modelPassword,
                                    'modelUser' => $modelUser,
            ]);
        }
        
    }

    public function actionValidate()
    {
        $modelPassword = new PasswordForm;
        $modelUser = User::find()->where(['username'=>Yii::$app->user->identity->username])->one();
        if(Yii::$app->request->isAjax && $modelPassword->load($_POST)) {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($modelPassword);                  
        }else if (Yii::$app->request->isAjax && $modelUser->load($_POST)) {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($modelUser);                  
        }
    }

    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Staff();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_STAFF]);
        }

        return $this->render('create', [
            'model' => $model,
        ]); 
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('info', 'Update Profile Successfully');
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePic()
    {
            $user_id = \Yii::$app->user->id;
            $model = Staff::find()->where(['user_id' => $user_id])->one();
            $model->scenario = 'update-pic';

            if (\Yii::$app->request->post()){
                $model->pic = \yii\web\UploadedFile::getInstance($model,'pic');
                if ($model->validate()){
                    $saveTo = 'upload/profile/'.$model->user_id.'.'.$model->pic->extension;
                    if($model->pic->saveAs($saveTo)){
                        $model->pic = $saveTo;
                        $model->save(false);
                        Yii::$app->session->setFlash('info', 'Update Data Successfully');
                        return $this->redirect(['staff/view', 'id' => $model->user_id]);
                    }
                }
            }
            return $this->renderAjax('update-pic', [
                'model' => $model,
            ]);
    }

    public function actionChangePassword()
    {
        $modelPassword = new PasswordForm;
        $model = $this->findModel(\Yii::$app->user->identity->id);
        $modeluser = User::find()->where(['username'=>Yii::$app->user->identity->username])->one();
        if($modelPassword->load(Yii::$app->request->post())){
            if($modelPassword->validate()){
                $modeluser->password_hash = Yii::$app->security->generatePasswordHash($_POST['PasswordForm']['newpass']);
                 if($modeluser->save()){
                    Yii::$app->user->logout();
                    Yii::$app->session->setFlash('info','Password changed');
                    return $this->goHome();
                 }else{
                    Yii::$app->getSession()->setFlash('info','Password not changed');
                   return $this->redirect(['staff/view']);
                 }
            }
        }else{
             return $this->redirect(['staff/view']);
        }
    }

    
    public function actionChangeUsername()
    {
        $modelPassword = new PasswordForm;
        $model = $this->findModel(\Yii::$app->user->identity->id);
        $modelUser = User::find()->where(['username'=>Yii::$app->user->identity->username])->one();
        
        if ($modelUser->load(Yii::$app->request->post()) && $modelUser->save()) {
            Yii::$app->session->setFlash('info','Username changed');
             return $this->redirect(['view']);
        } else {
             return $this->redirect(['view']);
        }
    }

    /**
     * Deletes an existing Staff model.
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
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelUserId($id)
    {
        if (($model = Staff::find()->where(['user_id'=>$id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
