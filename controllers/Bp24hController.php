<?php

namespace app\controllers;

use Yii;
use app\models\Bp24h;
use app\models\Bp24hSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
 use yii\filters\AccessControl;
use yii\db\Expression;
use yii\web\UploadedFile;
use app\models\UploadForm;


/**
 * Bp24hController implements the CRUD actions for Bp24h model.
 */
class Bp24hController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update', 'create','index','RegisterBPMeasurements',],
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
     * Lists all Bp24h models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Bp24hSearch();
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
     * Displays a single Bp24h model.
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
     * Creates a new Bp24h model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
        $model = Bp24h::findOne(['fk_person'=>$pid]);
        if(empty($model)){
           $model = new Bp24h();
           $model->fk_person = $pid;
           $model->altered = 1;
           $model->creation_time = date("Y-m-d H:i:s");
           $model->creation_name = Yii::$app->user->identity->username;
           $model->save(FALSE);
           return $this->redirect(["bp24h/update/$model->idbp24"]); 
        }else{
         return $this->redirect(["bp24h/update/$model->idbp24"]);   
        }
       
    }

    /**
     * Updates an existing Bp24h model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $upload = new UploadForm();
        $bp24= new Bp24h;
        $_24hdata= $bp24->pull24hoursdata($id);
        
        $pid=$model->fk_person;
        $persondetails=  \app\models\Participant::findOne(['pk_person'=>$pid]);
        if ($model->load(Yii::$app->request->post())) {
            $model->altered = 1;
            $persondetails->filtered = ($persondetails->filtered + 1);
            if($model->wasuploaded != 1){
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                $model->wasuploaded = 1;
            }
            $persondetails->save(FALSE);
            $model->save(FALSE);
            if(!empty($model->file)){
                return $this->redirect(['bp24h/uploadexcel', 'fkperson'=>$model->fk_person, 'idbp24'=>$model->idbp24, 'name'=>$model->file->baseName]);
            }else{
                Yii::$app->session->setFlash('success', 'The record has been updated successfully');
                return $this->redirect(['participant/index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'upload' => $upload,
                'dataProvider' => $_24hdata,
                'persondetails' => $persondetails,
            ]);
        }
        }
        
        
        public function actionUpload(){
            $model = new UploadForm();
            
            if (Yii::$app->request->isPost) {
                $model->excelfile = UploadedFile::getInstances($model, 'excelfile');
                if ($model->upload()) {
                    echo "uploaded";
                }
            }
            
            print_r($model->getErrors());

            //return $this->render('upload', ['model' => $model]);
        }

        public function actionRegisterBPMeasurements($fkperson,$fkstudyno){
            echo "I am here";exit;
             $modelcheck = Bp24h::findone(['fk_person'=>$fkperson]);
            if(!$modelcheck){
              $bpmodel=new Bp24h;
              $bpmodel->fk_person=$fkperson;
              $bpmodel->fk_study_no=$fkstudyno;
              if($bpmodel->save(false)){
                 $modelcheck = Bp24h::findone(['fk_person'=>$fkperson]);  
              }
            }
            $id=$modelcheck->idbp24;
        $model = $this->findModel($id);
        
        $bp24= new Bp24h;
        $_24hdata= $bp24->pull24hoursdata($id);
        
        $pid=$model->fk_person;
        $patmodel=  \app\models\Participant::find([]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idbp24]);
        } else {
            return $this->render('update', [
                'model' => $model,
                //'searchModel' => $searchModel,
                'dataProvider' => $_24hdata,
            ]);
        }
        }
    

    /**
     * Deletes an existing Bp24h model.
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
     * Finds the Bp24h model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bp24h the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bp24h::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUploadexcel($fkperson, $idbp24, $name){
        $uploadfile = "uploads/".$name."".".xlsx";
        try{
            $inputfiletype = \PHPExcel_IOFactory::identify($uploadfile);
            $objreader = \PHPExcel_IOFactory::createReader($inputfiletype);
            $objPHPExcel = $objreader->load($uploadfile);
        }catch(Exception $e){
            die('Error');
        }
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for($row =1; $row <= $highestRow; $row++){
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, NULL, TRUE, FALSE);
            
            
            if($row == 1){
                continue;
            }
            $model = new \app\models\Monitoringbp24data();
            
            $time = $rowData[0][0];
            $model->time = \PHPExcel_Style_NumberFormat::toFormattedString($time,'hh:mm:ss');
            $model->SBPbr = $rowData[0][1];
            $model->dia = $rowData[0][2];
            $model->pulse = $rowData[0][3];
            $model->SBPao = $rowData[0][4];
            $model->AIXao = $rowData[0][5];
            $model->AIXbr = $rowData[0][6];
            $model->PWVao = $rowData[0][7];
            $model->PWVsd = $rowData[0][8];
            $model->date_creation = date("Y-m-d");
            $model->fk_person = $fkperson;
            $model->fk_id24h = $idbp24;
            $model->altered = 1;
            $model->save(FALSE);
        }
        
        if(file_exists($uploadfile)){ 
           unlink($uploadfile);
        }
        Yii::$app->session->setFlash('success', 'Records saved and excel uploaded successfully');
        return $this->redirect(["bp24h/update/$idbp24"]);
    }
        
    
    
}
