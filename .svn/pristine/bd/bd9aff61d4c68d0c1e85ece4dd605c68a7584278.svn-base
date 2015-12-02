<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Participant;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of participants';
?> 
    <?php if(Yii::$app->session->hasFlash('success')): ?>
<div class="alert alert-success" role="alert">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
    <?= Yii::$app->session->getFlash('success') ?><span class="glyphicon glyphicon-ok"></span>
</div>
<?php endif; ?>
<div class="panel panel-primary">
    
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
<div class="participant-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'pk_person',
            'names',
            [
                 'attribute'=>'sex',
                'value'=>function ($model, $key, $index, $widget) { 
                return $model->sex;
                },
                        'filter'=>['m'=>'m', 'f'=>'f'],
            ],
            [
              'format'=>'raw',
              'value'=>function($data){
                    if(empty($data->date_visit1)){
                        return Html::a('First visit', ['/participant/visit', 'id'=>$data->id_p, 'visit'=>1],['class'=>'btn btn-xs btn-primary']);
                    }else if(!empty($data->date_visit1) && empty($data->date_visit2) &&  ($data->res_status1 != 'Died' && $data->res_status1 != 'Out Migrated' && $data->res_status1 != 'Present')){
                        return Html::a('Second visit', ['/participant/visit', 'id'=>$data->id_p, 'visit'=>2],['class'=>'btn btn-xs btn-primary']);
                    }else if(!empty($data->date_visit1) && !empty($data->date_visit2) && empty($data->date_visit3) &&  ($data->res_status2 != 'Died' && $data->res_status2 != 'Out Migrated' && $data->res_status2 != 'Present')){
                        return Html::a('Third visit', ['/participant/visit', 'id'=>$data->id_p, 'visit'=>3],['class'=>'btn btn-xs btn-primary']);
                    }else{
                        return Html::a('Closed', ['participant/listpart'],['class'=>'btn btn-xs btn-danger', 'disabled'=>'disabled']);
                    }
              }
            ],
        ],
    ]); ?>

</div>
</div>
</div>
