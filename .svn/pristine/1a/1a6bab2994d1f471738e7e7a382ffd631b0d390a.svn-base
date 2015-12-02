<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Monitoringbp24dataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitoringbp24datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitoringbp24data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Monitoringbp24data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_monitor',
            'time',
            'SBPbr',
            'dia',
            'pulse',
            // 'SBPao',
            // 'AIXao',
            // 'AIXbr',
            // 'PWVao',
            // 'PWVsd',
            // 'fk_person',
            // 'date_creation',
            // 'fk_id24h',
            // 'fk_study_no',
            // 'comments:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
