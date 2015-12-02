<?php

namespace app\controllers;

use Yii;
use app\models\Urine;
use app\models\UrineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UrineController implements the CRUD actions for Urine model.
 */
class UrineController extends Controller
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
     * Lists all Urine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UrineSearch();
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
     * Displays a single Urine model.
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
     * Creates a new Urine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
         $model = Urine::findOne(['fk_person'=>$pid]);
        if(empty($model)){
           $model = new Urine();
           $model->fk_person = $pid;
           $model->creation_name = Yii::$app->user->identity->username;
           $model->creation_time = date("Y-m-d H:i:s");
           $model->altered = 1;
           $model->save(FALSE);
        }
        return $this->redirect(["urine/update/$model->id"]);
    }

    /**
     * Updates an existing Urine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $part = \app\models\Participant::findOne(['pk_person'=>$model->fk_person]);             
        if ($model->load(Yii::$app->request->post())) {
            $model->altered = 1;
            $part->filtered = ($part->filtered + 1);
            $part->save(FALSE);
            $model->save(FALSE);
            Yii::$app->session->setFlash('success', 'The record has been updated successfully');
            return $this->redirect(['urine/index']);
        } else {
            
            return $this->render('update', [
                'model' => $model,
                'persondetails'=>$part,
            ]);
        }
    }
    
    public function actionUpdateresults($id){
        if(Yii::$app->user->can('clinic_results') || Yii::$app->user->can('system_admin')){
            $model = $this->findModel($id);
            $part = \app\models\Participant::findOne(['pk_person'=>$model->fk_person]);
            if ($model->load(Yii::$app->request->post())) {
                
            $model->aliquots = $_POST['Urine']['aliquot1'].",".$_POST['Urine']['aliquot2'];
            $model->save(FALSE);
               Yii::$app->session->setFlash('success', 'The record has been updated successfully');
               return $this->redirect(['urine/index']);
           }else{
               return $this->render('updateresult', [
                   'model' => $model,
                   'persondetails'=>$part,
               ]);
           }
        }else{
            throw new \yii\web\ForbiddenHttpException('Currently you do not have permissions to view this section');
        }
        
    }

    /**
     * Deletes an existing Urine model.
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
     * Finds the Urine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Urine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Urine::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
