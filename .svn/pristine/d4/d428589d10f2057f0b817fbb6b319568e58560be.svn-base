<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UrineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Urines samples';
?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
          <?php if(Yii::$app->session->hasFlash('success')): ?>
<div class="alert alert-success" role="alert">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
    <?= Yii::$app->session->getFlash('success') ?><span class="glyphicon glyphicon-ok"></span>
</div>
<?php endif; ?>
<div class="urine-index">

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
                'filter' => \yii\jui\DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'date_visit',
                    'options' => ['class'=>'form-control'],
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
                    return yii\bootstrap\Html::a('Urine basic', ["urine/update/$model->id"], ['class'=>'btn btn-xs btn-link']);
                }
            ],
            [
                'attribute' => 'Results',
                'format' => 'raw',
                'value' => function($model){
                    return yii\bootstrap\Html::a('Result', ["urine/updateresults/$model->id"], ['class'=>'btn btn-xs btn-link']);
                }
            ],
        ],
    ]); ?>

</div>
</div>
</div>