<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BloodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blood samples';
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
<div class="blood-index">

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
            'blood_collected',
            [
                'attribute' => 'Basics',
                'format' => 'raw',
                'value' => function($model){
                       return Html::a('Basic', ["blood/update/$model->id"]);
                }
            ],
            [
                'attribute' => 'Results',
                'format' => 'raw',
                'value' => function($model){
                       return Html::a('Results', ["blood/updateresults/$model->id"]);
                }
            ],
        ],
    ]); ?>

</div>
</div>
</div>