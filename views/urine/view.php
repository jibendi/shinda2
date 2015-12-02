<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Urine */

$this->title = \app\models\Participant::findOne(['pk_person'=>$model->fk_person])->names;
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="urine-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_person',
            'fk_study_no',
            'date_visit',
            'time_visit',
            'spot_urine_collected',
            'reason_not_collected',
            'spot_urine_time',
            'date_collect_urine',
            'date_received_urine',
            'time_received_urine',
            'date_result_spot_urine',
            'time_result_spot_urine',
            'spot_na_urine',
            'spot_k_urine',
            'spot_cr_urine',
            'spot_alb_urine',
            'year',
            'clinician',
            'result_complete',
            'aliquots',
            'sample_labelled',
            'frozen',
            'tech_initials_r',
            'tech_date_r',
            'tech_time_r',
            'tech_initials_p',
            'tech_date_p',
            'tech_time_p',
        ],
    ]) ?>

</div>
  </div>
</div>