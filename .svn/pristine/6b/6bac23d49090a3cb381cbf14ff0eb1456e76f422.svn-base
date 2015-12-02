<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Questionnaire */
/* @var $form yii\widgets\ActiveForm */
?>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Past Medical history</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Socio economic background</a></li>
  </ul>

          
            <?php $form = ActiveForm::begin(['enableAjaxValidation'=>false]); ?>
  <?= $form->errorSummary($model);?>
  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                    <?php 
                    $yesno = ['Yes' => 'Yes','No' => 'No',];
                     $yesno2 = ['Yes' => 'Yes','No' => 'No','Not started'=>'Not started'];
                    $schoolLevel = [
                        'Kindergarten' => 'Kindergarten',
                        'Lower primary' => 'Lower primary',
                        'Upper primary' => 'Upper primary',
                        'Secondary' => 'Secondary',
                        'College/University' => 'College/University',
                        'Refused to answer' => 'Refused to answer',
                        'Never attended' => 'Never attended'
                    ]?>

                    <?= $form->field($model, 'date_interview')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'], 'clientOptions' => ['changeMonth' => true,'changeYear' => true, 'maxDate'=>'today']])?> 

                    <?= $form->field($model, 'time_interview')->widget(TimePicker::classname(), []);?>
                    
                    <?php if($gender != 'm'){?>
                        <?= $form->field($model, 'pregnant')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'checkpreg($(this).val())']);?>

                  <span class="checkpreg hide"><?= $form->field($model, 'menstruating')->dropDownList($yesno2, ['prompt'=>'--Please select--', 'onChange'=>'checkpreg2($(this).val())']);?>

                      <span class="checkpreg2"> <?= $form->field($model, 'lmp')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'], 'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?></span></span>
                    <?php } ?>
                    <?= $form->field($model, 'ever_diagnosed_hbp')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'checkUnderMed($(this).val())']);?>

                  <span class="under_med_hbp hide"><?= $form->field($model, 'under_med_hbp')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'showHide($(this).val(), "undermed")']);?></span>
                    
                  <span class="undermed hide">
                      <label>List the drugs</label>
                      <div class="row">
                        <div class="col-md-3"><?= $form->field($model,'enalapril')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'atenolol')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'propranolol')->checkbox(); ?> </div>
                    </div>
                      <div class="row">
                        <div class="col-md-3"><?= $form->field($model,'hydrochlorthiazide')->checkbox(); ?> </div>
                      
                        <div class="col-md-3"><?= $form->field($model,'frusemide')->checkbox(); ?> </div>  
                        <div class="col-md-3"><?= $form->field($model,'aldactone')->checkbox(); ?> </div> 
                        </div>
                      <div class="row">
                        <div class="col-md-3"><?= $form->field($model,'methyldopa')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'nifedipine')->checkbox(); ?> </div>  
                        <div class="col-md-3"><?= $form->field($model,'hydralazine')->checkbox(); ?> </div> 
                      </div>
                  </span>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                  
                    <?= $form->field($model, 'suffered_malaria')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'showHide($(this).val(), "sufferedmalaria")']);?>
                <span class="sufferedmalaria hide">
                    <?php $numberitems =[1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,'99'=>'Dont know']?>
                    <?= $form->field($model, 'mal_episodes')->dropDownList($numberitems, ['prompt'=>'--please select--']) ?>

                    <?= $form->field($model, 'dates_mal_occured')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                    <?= $form->field($model, 'mal_hospitalised')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>
                </span>

                    <?= $form->field($model, 'other_med_condition')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'showHide($(this).val(), "othermedcondition")']);?>
                 
                  
                  <span class="othermedcondition hide">
                    <?= $form->field($model, 'other_med_condition_name')->textInput(['maxlength' => true]) ?>
                      
                  
                    <?= $form->field($model, 'med_condition_list')->textarea(['rows' => 2]) ?>
                  </span>
                  
              </div>
          </div> 
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                    <?= $form->field($model, 'place_of_birth_current')->dropDownList($yesno,['prompt'=>'--Please select--', 'onChange'=>'showBirthPlace($(this).val())']) ?>
                    <?php
                        $places = [
                            'Viwandani' => 'Viwandani',
                            'Korogocho' => 'Korogocho',
                        ];
                        $longspecify = [
                            'Years' => 'Years',
                            'Months' => 'Months',
                            'Days' => 'Days',
                        ]
                    ?>
                  <span class="placeyes hide"><?= $form->field($model, 'place_of_birth')->dropDownList($places, ['prompt'=>'--Please select--']) ?></span>
                  
                  <span class="placeno hide">
                      <?= $form->field($model, 'place_of_birth_specify')->widget(Select2::classname(), [
                'data' => app\models\Counties::getcounties(),
                'options' => ['placeholder' => 'Start by typing county'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
                           
                    <?= $form->field($model, 'date_of_relocation')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd','options'=>['class'=>'form-control'],'clientOptions' => ['changeMonth' => true,'changeYear' => true,'maxDate' => 'today',]])?> 

                    <?= $form->field($model, 'places_before_relocation')->textarea(['rows' => 2]) ?></span>

                    <?= $form->field($model, 'Longest_time_away')->textInput(['maxlength' => true, 'onChange'=>'skipPlaces($(this).val())']) ?>
                  
                  <span class="hideplaces"><?= $form->field($model, 'longest_time_specify')->dropDownList($longspecify, ['prompt'=>'--Please specify--']) ?>

                    <?= $form->field($model, 'place_away')->textarea(['rows' => 2]) ?></span>

                    <?= $form->field($model, 'household_school_greater_5')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'household_not_attend_primary')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'mother_edu_level')->dropDownList($schoolLevel, ['prompt'=>'--Please select---']) ?>

                    <?= $form->field($model, 'child_5yrs_late')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                    <?= $form->field($model, 'household_malnourished')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'electricity')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>
                    <?php
                        $toilettype = ['pit latrine' => 'Pit latrine','VIP' => 'VIP','pour flash' => 'pour flash'];
                        $floortype = ['dirt' => 'dirt','concrete'=>'concrete', 'sand' => 'sand','dung' => 'dung','Wooden'=>'Wooden', 'none of these' => 'none'];
                        $fuelttype = ['dung' => 'dung','gas'=>'gas','electrical'=>'electrical','wood' => 'wood','charcoal' => 'charcoal','Kerosine'=>'Kerosine','none of these' => 'none',];
                        $householdown = ['radio' => 'radio','TV' => 'tv','bicycle' => 'bicycle','refrigerator' => 'refrigerator','car' => 'car','none' => 'none,']
                    ?>
                    <?= $form->field($model, 'toilet_type')->dropDownList($toilettype, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'share_toilet')->dropDownList($yesno, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'safe_drinking_water')->dropDownList($yesno, ['prompt'=>'--Please select--', 'onChange'=>'skipSafewater($(this).val())']);?>

                  <span class="safedrinking hide"><?= $form->field($model, 'time_safe_water_access')->textInput(['maxlength' => true]) ?>
                  
                    <?= $form->field($model, 'time_units')->dropDownList(['Seconds'=>'Seconds', 'Minutes'=>'Minutes', 'Hours'=>'Hours'],['prompt' =>'--Please select']) ?>
                  </span>
                    <?= $form->field($model, 'floor_type')->dropDownList($floortype, ['prompt'=>'--Please select--']);?>

                    <?= $form->field($model, 'fuel_type')->dropDownList($fuelttype, ['prompt'=>'--Please select--']);?>
                  
                  
                  <label>Do you own the following?</label>
                    <div class="row">
                        <div class="col-md-3"><?= $form->field($model,'car')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'refridgerator')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'bicycle')->checkbox(); ?> </div>
                    
                        <div class="col-md-3"><?= $form->field($model,'radio')->checkbox(); ?> </div>
                        <div class="col-md-3"><?= $form->field($model,'television')->checkbox(); ?> </div>  
                        <div class="col-md-3"><?= $form->field($model,'own_none')->checkbox(); ?> </div>  
                   
            </div>
                   
              </div>
          </div> 
    </div>
  </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block', 'id'=>'questionnaireSubmit']) ?>
</div>

<?php ActiveForm::end(); ?>

<style>
    .hasDatepicker{
        position: relative;
        z-index: 99;
    }
</style>
<script>
    $(document).ready(function(){
        $(".navbar").addClass("hide");
        $("#questionnaireSubmit").on('click', function(event){
           var undermed = $("#questionnaire-under_med_hbp").val(),
           hpdruglist = $("#questionnaire-hbp_med_list").val(),
           suffredmalaria = $("#questionnaire-suffered_malaria").val(),
           mal_episode = $("#questionnaire-mal_episodes").val(),
           datemaleepisodeoccured = $("#questionnaire-dates_mal_occured").val(),
           othermdicalcondition = $("#questionnaire-other_med_condition").val(),
           othermecondname = $("#questionnaire-other_med_condition_name").val(),
           curbirthplace = $("#questionnaire-place_of_birth_current").val(),
           birthplace = $("#questionnaire-place_of_birth").val(),
           specifybirthplace = $("#questionnaire-place_of_birth_specify").val(),
           relocationdate = $("#questionnaire-date_of_relocation").val(),
           placesbeforerelocation = $("#questionnaire-places_before_relocation").val(),
           pregnant = $("#questionnaire-pregnant").val(),
           menstruating = $("#questionnaire-menstruating").val();
           if(undermed == 'Yes' && hpdruglist == ''){
               alert("Please enter the list of drugs");
               event.preventDefault();
           }else if(pregnant == 'No' && menstruating ==''){
               alert("Please select if menstruating");
               event.preventDefault();
           }else if(suffredmalaria == 'Yes' && mal_episode ==''){
               alert("Please indicate malaria episode");
               event.preventDefault();
           }else if(suffredmalaria == 'Yes' && datemaleepisodeoccured ==''){
               alert("Please indicate the date when the last episode occured");
               event.preventDefault();
           }else if(othermdicalcondition == 'Yes' && othermecondname == ''){
                alert("Please indicate the other medical condition name");
               event.preventDefault();
           }else if(curbirthplace == 'Yes' && birthplace == ''){
                alert("Please indicate birth place");
               event.preventDefault();
           }else if(curbirthplace == 'No' && specifybirthplace == ''){
                alert("Please specify place of birth");
               event.preventDefault();
           }else if(curbirthplace == 'No' && relocationdate == ''){
                alert("Please enter the date you relocated");
               event.preventDefault();
           }else if(curbirthplace == 'No' && placesbeforerelocation == ''){
                alert("Please indicate the places you were before relocating");
               event.preventDefault();
           }
            
        });
        
         $("#questionnaire-own_none").on('click',function(){
            if($(this).is(":checked")){
                if(confirm("Are you sure on ticking 'none'")){
                     $("input[name='Questionnaire[car]']").attr({'disabled' :true, 'checked': false});
                     $("input[name='Questionnaire[refridgerator]']").attr({'disabled' :true, 'checked': false});
                     $("input[name='Questionnaire[bicycle]']").attr({'disabled' :true, 'checked': false});
                     $("input[name='Questionnaire[television]']").attr({'disabled' :true, 'checked': false});
                     $("input[name='Questionnaire[radio]']").attr({'disabled' :true, 'checked': false});
                }else{
                    $(this).attr('checked', false);
                }
            }else{
                $("input[name='Questionnaire[car]']").attr('disabled', false);
                $("input[name='Questionnaire[refridgerator]']").attr('disabled', false);
                $("input[name='Questionnaire[bicycle]']").attr('disabled', false);
                $("input[name='Questionnaire[television]']").attr('disabled', false);
                $("input[name='Questionnaire[radio]']").attr('disabled', false);
            }
        });
    });
    function showHide(val, divClass){
        if(divClass == 'undermed' && val == 'Yes'){
            $('.undermed').removeClass('hide');
        }else if(divClass == 'undermed' && val != 'Yes'){
            $('.undermed').addClass('hide');
            $("#questionnaire-hbp_med_list").val("");
        }else if(divClass == 'sufferedmalaria' && val == 'Yes'){
             $('.sufferedmalaria').removeClass('hide');
        }else if(divClass == 'sufferedmalaria' && val != 'Yes'){
            $('.sufferedmalaria').addClass('hide');
            $("#questionnaire-mal_episodes, #questionnaire-dates_mal_occured, #questionnaire-mal_hospitalised").val("");
        }else if(divClass == 'othermedcondition' && val =='Yes'){
            $(".othermedcondition").removeClass('hide');
        }else if(divClass == 'othermedcondition' && val !='Yes'){
            $(".othermedcondition").addClass('hide');
            $("#questionnaire-other_med_condition_name, #questionnaire-med_condition_list").val("");
        }
    }
    
    function checkpreg(val){
        if(val =="No"){
            $(".checkpreg").removeClass('hide');
           
        }else{
            $(".checkpreg").addClass('hide');
            $("#questionnaire-menstruating, #questionnaire-lmp").val("");
            if(confirm("Are you sure the participants is pregnant?")){
                var date = $("#questionnaire-date_interview").val(),
                    time = $("#questionnaire-time_interview").val(),
                    id = "<?php echo $_GET['id'];?>";
                    if(date ==""){
                        alert("Please enter the date");
                    }else if(time ==""){
                       alert("Please enter the time"); 
                    }else{
                        var href = "/shinda2/web/index.php/questionnaire/updatepregnancy/"+id+"?date="+date+"&time="+time;
                         window.location.href = href;
                    }
            }
        }
    }
    
    function checkpreg2(val){
        if(val =="Not started"){
           $(".checkpreg2").addClass('hide');
           $("#questionnaire-lmp").val("");
        }else{
            $(".checkpreg2").removeClass('hide');
        }
    }
    
    function showBirthPlace(val){
        if(val == 'Yes'){
            $(".placeyes").removeClass('hide');
            $(".placeno").addClass('hide');
            $("#questionnaire-place_of_birth_specify, #questionnaire-date_of_relocation, #questionnaire-places_before_relocation").val("");
        }else if(val == 'No'){
            $(".placeyes").addClass('hide');
            $(".placeno").removeClass('hide');
            $("#questionnaire-place_of_birth").val("");
        }
    }
    function checkUnderMed(val){
        if(val =='Yes'){
            $(".under_med_hbp").removeClass('hide');
        }else if(val == 'No'){
            $(".under_med_hbp").addClass('hide');
            $("#questionnaire-under_med_hbp").val("");
        }
    }
    
    function skipPlaces(val){
        if(val == 0){
            $(".hideplaces").addClass('hide');
            $("#questionnaire-longest_time_specify, #questionnaire-place_away").val("");
        }else{
           $(".hideplaces").removeClass('hide'); 
        }
    }
    
    function skipSafewater(val){
        if(val == 'No'){
            $(".safedrinking").addClass('hide');
            $("#questionnaire-time_safe_water_access, #questionnaire-time_units").val("");
        }else{
            $(".safedrinking").removeClass('hide');
        }
    }
</script>

