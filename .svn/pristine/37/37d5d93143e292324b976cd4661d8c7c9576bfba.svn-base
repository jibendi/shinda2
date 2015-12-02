<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blood */

$this->title = \app\models\Participant::findOne(['pk_person'=>$model->fk_person])->names;
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="blood-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_person',
            'blood_collected',
            'reason_blood_not_collected',
            'date_collect_blood',
            'time_blood_collected',
            'sample_labelled',
            'genotype_aliquots',
            'fbc_aliquots',
            'elisa_aliquots',
            'shinda_labels',
            'frozen',
            'fw_visit1',
            'date_visit',
            'time_visit',
            'date_received_blood',
            'time_received_blood',
            'date_result_spot_blood',
            'time_result_spot_blood',
            'sickle_type',
            'alpha_thela',
            'wbc',
            'hb',
            'rbc',
            'mcv',
            'mchc',
            'rdw',
            'plt',
            'na',
            'k',
            'cr',
            'urea',
            'chloride',
            'angiopoietin2',
            'HbA1c',
            'tech_initial',
            'tech_date',
            'tech_time',
        ],
    ]) ?>

</div>
      </div>
    </div>
