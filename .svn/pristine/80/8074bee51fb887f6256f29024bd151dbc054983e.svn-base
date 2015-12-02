<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Questionnaire */

$this->title = 'Questionnaire'
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
      <div id="kbdm">
                        <kbd>Study No : <small><?= $persondetails->study_no;?></small>   Names : <small><?= $persondetails->names;?></small>  PID : <small><?= $persondetails->pk_person;?></small>      DOB : <small><?= date("d/m/Y", strtotime($persondetails->dob));?></small>     Gender : <small><?= $persondetails->sex;?></small>      From : <small><?= $persondetails->sublocn;?></small>    Sub loc: <small><?= $persondetails->sublocn;?></small> </kbd>
                    </div>
<div class="questionnaire-update">

    <?= $this->render('_form', [
        'model' => $model,
        'gender' => $persondetails->sex,
    ]) ?>

</div>
</div>
 </div>
