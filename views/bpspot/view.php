<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bpspot */

$this->title = \app\models\Participant::findOne(['pk_person'=>$model->fk_person])->names;
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="bpspot-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bps',
            'fk_person',
            'date_visit',
            'time_visit',
            'consent_signed',
            'not_consented_rsn',
            'study_info_given',
            'height',
            'weight',
            'muac',
            'ssn',
            'pulse',
            'bp_syst_1',
            'bp_dyst_1',
            'bp_syst_2',
            'bp_dyst_2',
            'bp_syst_3',
            'bp_dyst_3',
            'serial_no_bpm',
        ],
    ]) ?>

</div>
  </div>
</div>