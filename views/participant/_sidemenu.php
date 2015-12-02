<?php
use yii\helpers\Html;
?>
<?= Html::a('Participants<i class="glyphicon glyphicon-chevron-right"></i>', ['participant/summary'], ['class' =>'list-group-item active']);?>
               <?= Html::a('Qustionnairre<i class="glyphicon glyphicon-chevron-right"></i>', ['participant/questionnaire'], ['class' =>'list-group-item questionnaire']);?>
               <?= Html::a('Bp spot<i class="glyphicon glyphicon-chevron-right"></i>', ['participant/bpspot'], ['class' =>'list-group-item bpspot']);?>
               <?= Html::a('Bp 24 h<i class="glyphicon glyphicon-chevron-right"></i>', ['participant/bp24h'], ['class' =>'list-group-item bp24h']);?>
            
             <?= Html::a('Blood<i class="glyphicon glyphicon-chevron-right"></i>', ['participant/blood'], ['class' =>'list-group-item blood']);?>
             <?= Html::a('Urine<i class="glyphicon glyphicon-chevron-right"></i>', ['participant/urine'], ['class' =>'list-group-item urine']);?>
       