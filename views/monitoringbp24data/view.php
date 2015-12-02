<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Monitoringbp24data */

$this->title = $model->id_monitor;
$this->params['breadcrumbs'][] = ['label' => 'Monitoringbp24datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitoringbp24data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_monitor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_monitor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_monitor',
            'time',
            'SBPbr',
            'dia',
            'pulse',
            'SBPao',
            'AIXao',
            'AIXbr',
            'PWVao',
            'PWVsd',
            'fk_person',
            'date_creation',
            'fk_id24h',
            'fk_study_no',
            'comments:ntext',
        ],
    ]) ?>

</div>
