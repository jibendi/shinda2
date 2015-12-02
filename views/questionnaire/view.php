<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Questionnaire */

$this->title = \app\models\Participant::findOne(['pk_person'=>$model->fk_person])->names;
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="questionnaire-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_person',
            'date_interview',
            'time_interview',
            'pregnant',
            'menstruating:ntext',
            'lmp:ntext',
            'ever_diagnosed_hbp',
            'under_med_hbp',
            'hbp_med_list:ntext',
            'suffered_malaria',
            'mal_episodes',
            'dates_mal_occured',
            'mal_hospitalised',
            'other_med_condition',
            'med_condition_list',
            'place_of_birth',
            'date_of_relocation',
            'places_before_relocation:ntext',
            'Longest_time_away',
            'left_date',
            'return_date',
            'place_away:ntext',
            'household_school_greater_5',
            'household_not_attend_primary',
            'mother_edu_level',
            'child_5yrs_late',
            'household_malnourished',
            'electricity',
            'toilet_type',
            'share_toilet',
            'safe_drinking_water',
            'time_safe_water_access',
            'floor_type',
            'fuel_type',
            'household_own',
            'creation_name',
        ],
    ]) ?>

</div>
</div>
</div>
