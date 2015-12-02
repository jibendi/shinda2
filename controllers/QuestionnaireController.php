<?php

namespace app\controllers;

use Yii;
use app\models\Questionnaire;
use app\models\QuestionnaireSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestionnaireController implements the CRUD actions for Questionnaire model.
 */
class QuestionnaireController extends Controller
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
     * Lists all Questionnaire models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionnaireSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('participants/questionnaire', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Questionnaire model.
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
     * Creates a new Questionnaire model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
        $model = Questionnaire::findOne(['fk_person'=>$pid]);

        if(empty($model)){
            $model = new Questionnaire();
            $model->fk_person = $pid;
            $model->altered = 1;
            $model->save(FALSE);
        }
        
        return $this->redirect(["questionnaire/update/$model->id"]);
    }

    /**
     * Updates an existing Questionnaire model.
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
        
        $persondetails=  \app\models\Participant::findOne(['pk_person'=>$model->fk_person]);
        
        if ($model->load(Yii::$app->request->post())) {
            $model->creation_name = Yii::$app->user->identity->username;
            $model->altered = 1;
            $persondetails->filtered = ($persondetails->filtered + 1);
            $model->hbp_med_list = $_POST['Questionnaire']['enalapril'].",".$_POST['Questionnaire']['atenolol'].", ".$_POST['Questionnaire']['propranolol'].",".$_POST['Questionnaire']['hydrochlorthiazide'].",".$_POST['Questionnaire']['frusemide'].",".$_POST['Questionnaire']['aldactone'].",".$_POST['Questionnaire']['methyldopa'].",".$_POST['Questionnaire']['nifedipine'].",".$_POST['Questionnaire']['hydralazine'];
             
            if($_POST['Questionnaire']['own_none']==1){
                $model->household_own = "0,0,0,0,0,0,1";
            }else{
                $model->household_own = $_POST['Questionnaire']['car'].",".$_POST['Questionnaire']['refridgerator'].", ".$_POST['Questionnaire']['bicycle'].",".$_POST['Questionnaire']['radio'].",".$_POST['Questionnaire']['television'].",".$_POST['Questionnaire']['own_none'];
            }
            $persondetails->filtered = 1;
            
            if($model->save(FALSE) && $persondetails->save(FALSE)){
                Yii::$app->session->setFlash('success', 'The questionnaire saved successfully');
                return $this->redirect(['participant/apptmnts']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'persondetails' => $persondetails,
            ]);
        }
    }

    /**
     * Deletes an existing Questionnaire model.
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
     * Finds the Questionnaire model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Questionnaire the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questionnaire::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUpdatepregnancy($id, $date, $time){
        $model = $this->findModel($id);
        $model->date_interview = $date;
        $model->time_interview = $time;
        $model->pregnant = "No";
        if($model->save(FALSE)){
            Yii::$app->session->setFlash('success', 'The record has been updated successfully');
            return $this->redirect(['participant/listpart']);
        }
    }
}
