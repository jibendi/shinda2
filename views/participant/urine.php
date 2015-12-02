<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = "Detailed report";
?>
<div class="panel panel-default">
    <div class="panel-heading"><h4><?=$this->title;?> - <small>Urine</small></h4></div>
  <div class="panel-body">
<div class="row">
    <div class="col-md-2 col-sm-4">
        <div class="list-group">
             <?= $this->render('_sidemenu', [
             'model' =>''
         ]) ?>
                </div>
       
    </div>
    <div class="col-md-10 col-sm-8">
          
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
                'label' => 'view',
                'format' => 'raw',
                'value' => function($model){
                       return Html::a('view', ["urine/$model->id"]);
                }
            ],
           
        ],
    ]); ?>

    </div>
</div>

  </div>
</div>
<style>
.list-group .glyphicon {
    float: right;
}

.list-group .span kbd {
    float: right;
}
</style>
<script>
    $(".list-group-item").removeClass('active');
    $(".urine").addClass('active');
</script>
