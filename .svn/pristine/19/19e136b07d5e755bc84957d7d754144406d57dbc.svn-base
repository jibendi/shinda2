<?php

namespace app\controllers;

use Yii;
use app\models\Blood;
use app\models\BloodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BloodController implements the CRUD actions for Blood model.
 */
class BloodController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blood models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BloodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->user->can('clinics') || Yii::$app->user->can('system_admin')){
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
             throw new \yii\web\ForbiddenHttpException('Currently you do not have permissions to view this section');
        }
    }

    /**
     * Displays a single Blood model.
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
     * Creates a new Blood model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
        $model = Blood::findOne(['fk_person'=>$pid]);
        
        if(empty($model)){
            $model = new Blood();
            $model->fk_person = $pid;
            $model->creation_name = Yii::$app->user->identity->username;
            $model->creation_time = date("Y-m-d H:i:s");
            $model->altered = 1;
            if($model->save(FALSE)){
                return $this->refresh();
            }
        }else{
            return $this->redirect(["blood/update/$model->id"]);
        }
    }

    /**
     * Updates an existing Blood model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $persondetails=  \app\models\Participant::findOne(['pk_person'=>$model->fk_person]);
        if ($model->load(Yii::$app->request->post())) {
            $model->altered = 1;
            $persondetails->filtered = ($persondetails->filtered + 1);
            $persondetails->save(FALSE);
            $model->save(FALSE);
            Yii::$app->session->setFlash('success', 'The record has been updated successfully');
            return $this->redirect(['blood/index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'persondetails' => $persondetails,
            ]);
        }
    }
    
      public function actionUpdateresults($id)
    {
        if(Yii::$app->user->can('clinic_results') || Yii::$app->user->can('system_admin')){
        $model = $this->findModel($id);
        $persondetails=  \app\models\Participant::findOne(['pk_person'=>$model->fk_person]);
        if ($model->load(Yii::$app->request->post())) {
            
            $model->genotype_aliquots = $_POST['Blood']['genaliquot1'].",".$_POST['Blood']['genaliquot2'];
            $model->fbc_aliquots = $_POST['Blood']['fbcaliquot1'].",".$_POST['Blood']['fbcaliquot2'];
            $model->save(FALSE);
            Yii::$app->session->setFlash('success', 'The record has been updated successfully');
            return $this->redirect(['blood/index']);
        } else {
            return $this->render('updateresults', [
                'model' => $model,
                'persondetails' => $persondetails,
            ]);
        }
          }else{
              throw new \yii\web\ForbiddenHttpException('Currently you do not have permissions to view this section'); 
          }
    }

    /**
     * Deletes an existing Blood model.
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
     * Finds the Blood model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blood the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blood::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGeneratebackup(){
        $model = new Blood();
        $data = $model->runDaily();
        if($data){
            Yii::$app->session->setFlash('success', 'The backup has been created successfully');
            return $this->redirect(['participant/index']);
        }else{
           Yii::$app->session->setFlash('error', 'The backup was not successfully');
            return $this->redirect(['participant/index']); 
        }
    }
    
    public function actionRestorebackup(){
        $model = new Blood();
        $data = $model->restoredata();
    }
}
