<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bp24h */

$this->title = \app\models\Participant::findOne(['pk_person'=>$model->fk_person])->names;
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="bp24h-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idbp24',
            'fk_person',
            'date_abpm_started',
            'time_abpm_start',
            'time_abpm_end',
            'leaflet_given',
            'diary_given',
            'time_bed',
            'time_woke',
            'succ_readings',
            'serial_no_abpm',
            'diary_collected',
            'wasuploaded',
        ],
    ]) ?>

</div>
      </div>
    </div>
