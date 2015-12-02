<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBpspot */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of all Bpspots';
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="bpspot-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'fk_person',
            [
                'label'=>'Names', 
                 'format' => 'raw',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->fkPerson->names;
            },
            ],
            [
                'attribute' => 'date_visit',
                'value' => 'date_visit',
                'options' => ['class'=>'form-control'],
                'filter' => \yii\jui\DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'date_visit',
                    'options'=>['class'=>'form-control'],
                    'clientOptions' => [
                         'changeMonth' => true,
                         'changeYear' => true,
                         'maxDate' => 'today',
                     ],
                    'language' => 'en',
                    'dateFormat' => 'yyyy-MM-dd',
                ]),
                'format' => 'html',
            ],
            'time_visit',
          [
                'attribute' => 'Basics',
                'format' => 'raw',
                'value' => function($model){
                       return Html::a('Basic', ["bpspot/update/$model->id_bps"]);
                }
            ],
            [
                'attribute' => 'Results',
                'format' => 'raw',
                'value' => function($model){
                       return Html::a('Results', ["bpspot/updatebp/$model->id_bps"]);
                }
            ],
        ],
    ]); ?>

</div>
      </div>
    </div>
