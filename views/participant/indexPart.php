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
              'format'=>'raw',
              'value'=>function($data){
                    $checkbpsot = app\models\Bpspot::findOne(['fk_person'=>$data->pk_person]);
                    if(!empty($checkbpsot)){
                        return Html::a('Spot BP', ['bpspot/update', 'id'=>$checkbpsot->id_bps],['class'=>'btn btn-xs btn-primary']);
                    }else{
                        return Html::a('Spot BP', ['bpspot/create', 'id'=>$data->pk_person],['class'=>'btn btn-xs btn-primary']);
                    }
              }
            ],
            [
              'format'=>'raw',
              'value'=>function($data){
                    $pkperson=$data->pk_person;
                    return Html::a('24 BP', ['/bp24h/create', 'pid'=>$pkperson],['class'=>'btn btn-xs btn-primary']);
              }
            ],  
            [
              'format'=>'raw',
              'value'=>function($data){
                $pkperson=$data->pk_person;
                    return Html::a('Urine', ['/urine/create', 'pid'=>$pkperson],['class'=>'btn btn-xs btn-primary']);
              }
            ],  
            [
              'format'=>'raw',
              'value'=>function($data){
                $pkperson=$data->pk_person;
                    return Html::a('Blood', ['/blood/create', 'pid'=>$pkperson],['class'=>'btn btn-xs btn-primary']);
              }
            ]
        ],
    ]); ?>

</div>
</div>
</div>
