<?php

namespace app\controllers;

use Yii;
use app\models\Bpspot;
use app\models\SearchBpspot;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BpspotController implements the CRUD actions for Bpspot model.
 */
class BpspotController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update', 'create','index', 'view'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bpspot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new \app\models\BpspotSearch();
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
     * Displays a single Bpspot model.
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
     * Creates a new Bpspot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = Bpspot::findOne(['fk_person'=>$id]);
        if(empty($model)){
            $model = new Bpspot();
            $model->fk_person = $id;
            $model->creation_date = new \yii\db\Expression("NOW()");
            $model->creation_name = Yii::$app->user->identity->username;
            $model->altered = 1;
            if($model->save(FALSE)){
                return $this->redirect(["bpspot/update/$model->id_bps"]);
            }
        }else{
            return $this->redirect(["bpspot/update/$model->id_bps"]);
        }
    }

    /**
     * Updates an existing Bpspot model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         if(\Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            \Yii::$app->response->format = 'json';
            return \kartik\widgets\ActiveForm::validate($model);
        }
        
        $fkperson = \app\models\Participant::findOne(['pk_person'=>$model->fk_person]);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->updated_date = new \yii\db\Expression('NOW()');
            $model->update_name = \Yii::$app->user->identity->username;
            $fkperson->filtered = ($fkperson->filtered + 1);
            if($model->save() && $fkperson->save(FALSE)){
                Yii::$app->session->setFlash('success', 'The record has been updated successfully');
                return $this->redirect(['participant/index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'persondetails'=>$fkperson,
            ]);
        }
    }
    
    public function actionUpdatebp($id){
        $model = $this->findModel($id);
        if(\Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
           \Yii::$app->response->format = 'json';
           return \kartik\widgets\ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->updated_date = new \yii\db\Expression('NOW()');
            $model->update_name = \Yii::$app->user->identity->username;
            if($model->save()){
                Yii::$app->session->setFlash('success', 'The record has been updated successfully');
                return $this->redirect(['participant/index']);
            }
        }else {
            $fkperson = \app\models\Participant::findOne(['pk_person'=>$model->fk_person]);
            return $this->render('updatebp', [
                'model' => $model,
                'persondetails'=>$fkperson,
            ]);
        }
    }

    /**
     * Deletes an existing Bpspot model.
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
     * Finds the Bpspot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bpspot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bpspot::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
