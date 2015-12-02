<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\jui\DatePicker;
use kartik\widgets\TimePicker;



/* @var $this yii\web\View */
/* @var $model app\models\Bp24h */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #kbdm{
        margin-left:0px;
    }
</style>
    
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
      <div class="row">
          <?php if(Yii::$app->session->hasFlash('success')): ?>
<div class="alert alert-success" role="alert">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
    <?= Yii::$app->session->getFlash('success') ?><span class="glyphicon glyphicon-ok"></span>
</div>
<?php endif; ?>
    <div class="col-lg-12">
        <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="panel-title">Blood spot 24 hours</div>
              </div>
            <div class="panel-body">
                  <div id="kbdm">
                        <kbd>Study No : <small><?= $persondetails->study_no;?></small>   Names : <small><?= $persondetails->names;?></small>  PID : <small><?= $persondetails->pk_person;?></small>      DOB : <small><?= date("d/m/Y", strtotime($persondetails->dob));?></small>     Gender : <small><?= $persondetails->sex;?></small>      From : <small><?= $persondetails->sublocn;?></small>    Sub loc: <small><?= $persondetails->sublocn;?></small> </kbd>
                    </div>
                       <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-primary">

                                    <div class="panel-body">
                                        
                                <?= $form->field($model, 'date_abpm_started')->widget(DatePicker::className(), [
                    'dateFormat' => 'yyyy-MM-dd',
                    'options'=>['class'=>'form-control'],
                     'clientOptions' => [
                         'changeMonth' => true,
                         'changeYear' => true,
                         'maxDate' => 'today',
                         ]])?> 
                                         <?php
                                   $items = [
                                       'yes'=>'yes',
                                       'no'=>'no',
                                   ];
                                ?>
                               <?= $form->field($model, 'leaflet_given')->dropDownList($items, ['prompt'=>'--Please select--']) ?>
                                
                                <?= $form->field($model, 'diary_given')->dropDownList($items, ['prompt'=>'--Please select--']) ?>
                                <?= $form->field($model, 'diary_collected')->dropDownList($items, ['prompt'=>'--Please select--']) ?>
                           
                               
                                   
                                    </div>
                                </div>
                            </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-primary">

                                    <div class="panel-body">
                                                                    
                                <?= $form->field($model, 'time_bed')->widget(TimePicker::classname(), []);?>

                                <?= $form->field($model, 'time_woke')->widget(TimePicker::classname(), []);?>
                                <?= $form->field($model, 'serial_no_abpm')->dropDownList(app\models\Valuelist::valuelist('serials'), ['prompt'=>'--Please select--']) ?>
                                <?php if($model->wasuploaded != 1){ ?>
                                <?= $form->field($model, 'file')->fileInput() ?>
                                <?php } ?>
                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
                                    </div>
                                </div>
                            </div>
                <!--///////////-->
                
     
            </div>
        </div>
    </div>
    </div>
  

        <!--- A panel to hold the grid displaying a patient BP 24 monitoring data -->
    
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Participant Arteriography Results</h3>
              </div>
            <div class="panel-body">
                <?= GridView::widget([
        'dataProvider' => $dataProvider,
                    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'time',
            'SBPbr',
            'dia',
            'pulse',
            'SBPao',
            'AIXao',
             'AIXbr',
             'PWVao',
             'PWVsd',
            // 'fk_person',
            // 'date_creation',
            // 'fk_id24h',
            // 'fk_study_no',
            // 'comments:ntext',

        ],
    ]); ?>
            </div>
        </div>
    </div>
    </div>

<div class="bp24h-form">


    <?php ActiveForm::end(); ?>

</div>

