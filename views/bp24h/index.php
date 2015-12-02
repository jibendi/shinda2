<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Bp24hSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blood spot 24 hours';
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="bp24h-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'fk_person',
            [
                'label'=>'Names', 
                 'format' => 'raw',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->persondetails->names;
            },
            ],
            [
                'attribute' => 'date_abpm_started',
                'value' => 'date_abpm_started',
                'options' => ['class'=>'form-control'],
                'filter' => \yii\jui\DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'date_abpm_started',
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
            'time_abpm_start',

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{update}'],
        ],
    ]); ?>

</div>
</div>
</div>
