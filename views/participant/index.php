<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Participant;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of participants';
?> 
    <?php if(Yii::$app->session->hasFlash('success')): ?>
<div class="alert alert-success" role="alert">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
    <?= Yii::$app->session->getFlash('success') ?><span class="glyphicon glyphicon-ok"></span>
</div>
<?php endif; ?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="participant-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'pk_person',
            'names',
            [
              'format'=>'raw',
              'value'=>function($data){
                    $pkperson=$data->pk_person;
                    return Html::button('Consent',['class'=>'btn btn-xs btn-primary', 'onClick'=>"showModalConsent($data->id_p)"]);
              }
            ], 
            [
              'format'=>'raw',
              'value'=>function($data){
                    $pkperson=$data->pk_person;
                    return Html::button('Change appoint',['class'=>'btn btn-xs btn-danger', 'onClick'=>"showModalAppoint($data->id_p)"]);
              }
            ], 
        ],
    ]); ?>

</div>
</div>
</div>
<script>
    function showModalConsent(id){
        $("#idparticipant").val(id);
       $("#consentModal").modal('show');
    }
    
    function showModalAppoint(id){
        $("#appointModal").modal('show');
        $("#idparticipant2").val(id);
    }
    
    function updateConsent(){
        var consent = $("#participant-consent").val(),
        studyno = $("#participant-study_no").val(),
        rsnnotconsented = $("#participant-reason_notconsented").val();
        if(consent ==''){
            alert("Please select the consent");
        }else if(consent == 'No' && rsnnotconsented ==""){
            alert("Please select the reason");
        }else if(consent == 'Yes' && studyno ==""){
            alert("Please enter the study number");
        }else{
            var id = $("#idparticipant").val();
            var href = "/shinda2/web/index.php/participant/updateconsent/"+id+"?consent="+consent+"&notconsent="+rsnnotconsented+"&studyno="+studyno;
            window.location.href = href;
        }
    }
    
    function toggleReason(val){
        if(val == 'No'){
            $(".reasons").removeClass('hide');
            $(".studyshow").addClass('hide');
            $("#participant-study_no").val("");
        }else{
            $(".reasons").addClass('hide');
            $(".studyshow").removeClass('hide');
            $("#participant-reason_notconsented").val("");
        }
     
    }
    
    function updateAppoint(){
       var appointdate = $("#participant-appoint_date").val();
       if(appointdate ==""){
           alert("Please enter the appointment date");
       }else{
           var id = $("#idparticipant2").val();
            var href = "/shinda2/web/index.php/participant/updateappoint/"+id+"?appointdate="+appointdate;;
            window.location.href = href;
       }
    }
   $(function() {      
 $("#participant-appoint_date").datepicker(
        { beforeShowDay: function(day) {
            var day = day.getDay();
            if (day == 1) {
                return [false, "somecssclass"]
            } else {
                return [true, "someothercssclass"]
            }
         }
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="consentModal" tabindex="-1" role="dialog" aria-labelledby="consentModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Consent form</h4>
      </div>
      <div class="modal-body">
          <?php $model = new Participant();?>
          
          <?php $form = ActiveForm::begin(); ?>
          <?php
            $yesno = [
                'Yes' => 'Yes',
                'No' => 'No',
            ];
          ?>
    <?= $form->field($model, 'consent')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'toggleReason($(this).val())']) ?>

          <span class="reasons hide"><?= $form->field($model, 'reason_notconsented')->dropDownList(app\models\Valuelist::valuelist('refused'), ['prompt'=>'--Please select--']);?></span>
          <span class="studyshow hide"><?= $form->field($model, 'study_no')->textInput();?></span>
          
      </div>
      <div class="modal-footer">
          <input type="hidden" value="" id="idparticipant" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="updateConsent()">Submit</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="appointModal" tabindex="-1" role="dialog" aria-labelledby="consentModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change appointment date</h4>
      </div>
      <div class="modal-body">
          <?php $model = new Participant();?>
          
          <?php $form = ActiveForm::begin(); ?>
          <?= $form->field($model, 'appoint_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'minDate' => 'today',]]) ?>

      </div>
      <div class="modal-footer">
          <input type="hidden" value="" id="idparticipant2" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="updateAppoint()">Submit</button>
      </div>
    </div>
  </div>
</div>

