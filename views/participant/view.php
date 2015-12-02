<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */

$this->title = $model->id_p;
$this->params['breadcrumbs'][] = ['label' => 'Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_p], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_p], [
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
            'id_p',
            'pk_person',
            'name1',
            'name2',
            'name3',
            'sex',
            'dob',
            'study_no',
            'age',
            'agecat',
            'pk_res',
            'ez_hm',
            'locn',
            'sublocn',
            'latt',
            'longd',
            'shinda2',
            'shinda3',
            'visited1',
            'visited2',
            'visited3',
            'studyArea',
            'visited2nd',
        ],
    ]) ?>

</div>
