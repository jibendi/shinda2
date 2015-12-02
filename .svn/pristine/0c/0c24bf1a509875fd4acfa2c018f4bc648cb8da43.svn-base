<?php

namespace app\controllers;

use Yii;
use app\models\Participant;
use app\models\ParticipantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\web\UploadedFile;


/**
 * ParticipantController implements the CRUD actions for Participant model.
 */
class ParticipantController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update', 'create','index', 'view', 'listpart'],
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
     * Lists all Participant models.
     * @return mixed
     */
    public function actionIndex($date_appoint = '')
    {
        $searchModel = new ParticipantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $date_appoint, $filters='');
            if(!empty($date_appoint) && (Yii::$app->user->can('field_workers') || Yii::$app->user->can('system_admin'))){
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }else if(Yii::$app->user->can('participants') || Yii::$app->user->can('clinics') || Yii::$app->user->can('system_admin')){
                return $this->render('indexPart', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }else{
            throw new \yii\web\ForbiddenHttpException('Currently you do not have permissions to view this section');
        }
    }
    
    public function actionListpart(){
        $searchModel = new ParticipantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $date ='', 1);

        return $this->render('listpart', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Participant model.
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
     * Creates a new Participant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Participant();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_p]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Participant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_p]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Participant model.
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
     * Finds the Participant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Participant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Participant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionVisit($id, $visit){
        $model = $this->findModel($id);
         if(\Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            \Yii::$app->response->format = 'json';
            return \kartik\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->appoint_date = date("Y-m-d", strtotime($model->appoint_date));
            $model->updated_name = Yii::$app->user->identity->username;
            $model->updated_time = date("Y-m-d H:i:s");
            $model->altered = 1;
            $model->save(FALSE);
            Yii::$app->session->setFlash('success', 'The record has been updated successfully');
            return $this->redirect(['participant/listpart']);
        }else{
            return $this->render('updatevisit', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionApptmnts(){
        if(Yii::$app->user->can('appointments') || Yii::$app->user->can('system_admin')){
            $model = new Participant();
            $year = date("Y");
            $mon = date("m");
            $data = $model->build_calendar($mon,$year);
            return $this->render('appointments', ['model'=>$data]);
        }else{
            throw new \yii\web\ForbiddenHttpException('Currently you do not have permissions to view this section');
        }
    }
    
     function actionCalendar(){
        $model = new Participant();
        $year = $_POST['year'];
        $month = $_POST['id'];
        $data = $model->build_calendar($month,$year);
        return $data;
    }
    
    public function actionPermissions(){
        if(Yii::$app->user->can('give_permissions') || Yii::$app->user->can('system_admin')){
         return $this->redirect(["/admin"]);
        }else{
            throw new \yii\web\ForbiddenHttpException('Currently you do not have permissions to view this section');
        }
    }
    
    public function actionSync(){
      $model = new \app\models\Fragments();
      return $this->render('syncdata',[
          'model' => $model,
      ]);
    }
    
    public function actionGetdata(){
        $model = new \app\models\Fragments();
        $data = $model->getdata();
        $part = $model->pushparticpants();
        if($part){
            \Yii::$app->session->setFlash('success', 'Data syncd successfully' );
            return $this->redirect(['participant/index']);
        }
    }
    
    public function actionUpdateconsent($id, $consent, $notconsent, $studyno){
        $model = $this->findModel($id);
        $model->consent = $consent;
        $model->reason_notconsented = $notconsent;
        $model->study_no = $studyno;
        $model->save(FALSE);
        if($consent == 'No'){
            return $this->redirect(['participant/apptmnts']);
        }else{
            return $this->redirect(["questionnaire/create", "pid"=>$model->pk_person]);
        }
    }
    
    public function actionUpdateappoint($id, $appointdate){
       $model = $this->findModel($id);
       $prevdate = $model->appoint_date;
       $model->appoint_date = date("Y-m-d", strtotime($appointdate));
       $model->appoint_level = ($model->appoint_level + 1);
       if($model->save(FALSE)){
           Yii::$app->session->setFlash('success', 'The appointment date has been changed successfully');
           return $this->redirect(["participant/index", 'date_appoint'=>$prevdate]);
       }
    }
    
    public function actionSummary(){
        $searchModel = new ParticipantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, "", $filters=3);
        return $this->render('summary',[
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionQuestionnaire(){
        $searchModel = new \app\models\QuestionnaireSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('questionnaire',[
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionBpspot(){
        $searchModel = new \app\models\BpspotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter=1);
        return $this->render('bpspot',[
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionBlood(){
        $searchModel = new \app\models\BloodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter=1);
        return $this->render('blood',[
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionBp24h(){
        $searchModel = new \app\models\Bp24hSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter=1);
        return $this->render('bp24h',[
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionUrine(){
        $searchModel = new \app\models\UrineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter=1);
        return $this->render('urine',[
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionTestuplaod(){
        $model = new \app\models\Bp24h();
         if ($model->load(Yii::$app->request->post())) {
             $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension)){
                 $fileContent= file_get_contents('uploads/' . $model->file->baseName . '.' . $model->file->extension);
    
    
    $file_handle = fopen('uploads/' . $model->file->baseName . '.' . $model->file->extension, "rb");
    
    
                $myFile = file_get_contents('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                $lines = explode(PHP_EOL, $myFile);
                foreach ($lines as $line) {
                  echo $line;
                  echo "<br>";
                }
   
                }   
         }
        return $this->render('uploadtest',[
            'model'=>$model,
        ]);
    }
    
}
    
