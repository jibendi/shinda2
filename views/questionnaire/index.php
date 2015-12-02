<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = "Detailed report";
?>
<div class="panel panel-default">
    <div class="panel-heading"><h4><?=$this->title;?> - <small>Attended participants</small></h4></div>
  <div class="panel-body">
<div class="row">
    <div class="col-md-2 col-sm-4">
        <div class="list-group">
             <?= $this->render('_sidemenu', [
             'model' =>''
         ]) ?>
                </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Summary at glance</div>
            <div class="panel-body">
               <div class="list-group">
                   <span class="list-group-item">New Mothers <kbd></kbd></span>
                   <span class="list-group-item">New Children <kbd></kbd></span>
                   <span class="list-group-item">Vaccination <kbd></kbd></span>
                   <span class="list-group-item">Vaccine cards <kbd></kbd></span>
                   <span class="list-group-item">Vaccine queue <kbd></kbd></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 col-sm-8">
          <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'fk_person',
            'date_interview',
            'time_interview',
            'pregnant',
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
