<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Bpspot */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #kbdm{
        top: 20px;
    }
    .hasDatepicker {
        position: relative;
        z-index: 9999;
    }
</style>
<?php $form = ActiveForm::begin(['enableAjaxValidation'=>true, 'id'=>'bspotbasic']); ?>
 <?=$form->errorSummary($model);?>
     <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Blood pressure spot basic</h3>
              </div>
            <div class="panel-body">
                <div id="kbdm">
                        <kbd>Study No : <small><?= $persondetails->study_no;?></small>   Names : <small><?= $persondetails->names;?></small>   PID : <small><?= $persondetails->pk_person;?></small>      DOB : <small><?= date("d/m/Y", strtotime($persondetails->dob));?></small>     Gender : <small><?= $persondetails->sex;?></small>      From : <small><?= $persondetails->sublocn;?></small>    Sub loc: <small><?= $persondetails->sublocn;?></small> </kbd>
                    </div>

                    <?= $form->field($model, 'date_visit')->widget(DatePicker::className(), 
                    [
                    'dateFormat' => 'yyyy-MM-dd',
                    'options'=>['class'=>'form-control'],
                     'clientOptions' => [
                         'changeMonth' => true,
                         'changeYear' => true,
                         'maxDate' => 'today',
                     ]])?> 

                    <?= $form->field($model, 'time_visit')->widget(TimePicker::classname(), []);?>
                    <?php
                        $list = [
                            'yes'=>'Yes',
                            'no'=>'No',
                        ];
                    ?>
                    <?= $form->field($model, 'study_info_given')->dropDownList($list, ['prompt'=>'--Please select']) ?>

                    <?= $form->field($model, 'serial_no_bpm')->dropDownList(app\models\Valuelist::valuelist("spotbpmachines"), ['prompt'=>'--Please select--']) ?>
          
                <input type="hidden" value="<?= $model->date_visit;?>" id="datevisit" />
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block', 'id'=>'bpspotsubmit']) ?>

    </div>
</div>
</div>
</div>
        </div>
         </div>
<?php ActiveForm::end(); ?>


<script>
    $(document).ready(function(){
        var datevisit = $("#datevisit").val();
        if(datevisit != ""){
            $('#bspotbasic *').filter(':input').each(function(){
              var ids = $(this).attr('id');
                $("#"+ids).attr("disabled", "disabled");
            });
        }
       
       $("#bpspotsubmit").on('click', function(event){
           var consent = $("#bpspot-consent_signed").val(),
           rsnnotconsented = $("#bpspot-not_consented_rsn").val(),
           serialbp = $("#bpspot-serial_no_bpm").val(),
           height = $("#bpspot-height").val(),
           weight = $("#bpspot-weight").val(),
           muac = $("#bpspot-muac").val(),
           ssn = $("#bpspot-ssn").val(),
           pulse = $("#bpspot-pulse").val(),
           bpsys1 = $("#bpspot-bp_syst_1").val(),
           bpdist1 = $("#bpspot-bp_dyst_1").val(),
           bpsys2 = $("#bpspot-bp_syst_2").val(),
           bpdist2 = $("#bpspot-bp_dyst_2").val(),
           bpsys3 = $("#bpspot-bp_syst_3").val(),
           bpdist3 = $("#bpspot-bp_dyst_3").val();
           if(consent == "no"){
                if(rsnnotconsented ==""){
                   alert("The reason for not consenting has to be provided");
                   event.preventDefault();
                }
            }else if(consent == "yes"){
                if(serialbp ==""){
                    alert("Please enter the serial number of bp machine");
                   event.preventDefault();
                }else if(height ==""){
                    alert("Please enter the height value");
                   event.preventDefault();
                }else if(weight ==""){
                    alert("Please enter the weight value");
                   event.preventDefault();
                }else if(muac ==""){
                    alert("Please enter the muac");
                   event.preventDefault();
                }else if(ssn ==""){
                    alert("The enter ssn value");
                   event.preventDefault();
                }else if(pulse ==""){
                    alert("The enter pulse value");
                   event.preventDefault();
                }else if(bpsys1 ==""){
                    alert("Please enter bp measurement 1, systolic");
                   event.preventDefault();
                }else if(bpdist1 ==""){
                    alert("Please enter bp measurement 1, distolic");
                   event.preventDefault();
                }else if(bpsys2 ==""){
                    alert("Please enter bp measurement 2, systolic");
                   event.preventDefault();
                }else if(bpdist2 ==""){
                    alert("Please enter bp measurement 2, distolic");
                   event.preventDefault();
                }else if(bpsys3 ==""){
                    alert("Please enter bp measurement 3, systolic");
                   event.preventDefault();
                }else if(bpdist3 ==""){
                    alert("Please enter bp measurement 3, distolic");
                   event.preventDefault();
                }
            }
       });
    });
    
 
    
   
</script>