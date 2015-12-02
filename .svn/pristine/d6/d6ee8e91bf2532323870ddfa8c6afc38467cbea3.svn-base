<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="<?php echo url::base();?>/js/jquery.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php
    $clinics = false;
    $appointments = false;
    $participants = false;
    $permissions = false;
    $sychronization = false;
    $field_workers = false;
    $settings = false;
    if(Yii::$app->user->can('clinics') || Yii::$app->user->can('system_admin')){
        $clinics = true;
    }
    if(Yii::$app->user->can('appointments') || Yii::$app->user->can('system_admin')){
        $appointments = true;
    }
    if(Yii::$app->user->can('participants') || Yii::$app->user->can('system_admin')){
        $participants = true;
    }
    if(Yii::$app->user->can('give_permissions') || Yii::$app->user->can('system_admin')){
        $permissions = true;
    }
    if(Yii::$app->user->can('sychronization') || Yii::$app->user->can('system_admin')){
        $sychronization = true;
    }
    if(Yii::$app->user->can('field_workers') || Yii::$app->user->can('system_admin')){
        $field_workers = true;
    }
    if(Yii::$app->user->can('settings') || Yii::$app->user->can('system_admin')){
        $settings = true;
    }
?>
<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'SHINDA 2',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index'], 'visible'=>$field_workers],
                    ['label' => 'Participants', 'url' => ['participant/index'], 'visible'=>$participants],
                    ['label' => 'Appointments', 'url' => ['participant/apptmnts'], 'visible'=>$appointments],
                     [
                        'label' => 'Labs',
                        'visible' => $clinics,
                        'items' => [
                           ['label' => 'Bpspot results', 'url' => ['/bpspot/index']],
                           ['label' => 'Bp24h', 'url' => ['bp24h/index']],
                           ['label' => 'Urine results', 'url' => ['urine/index']],
                            ['label' => 'Blood results', 'url' => ['blood/index']],
                        ]
                    ],
                    [
                        'label' => 'Settings',
                        'visible' => $settings,
                        'items' => [
                           ['label' => 'Backup', 'url' => ['blood/generatebackup']],
                           ['label' => 'Restore', 'url' => ['blood/restorebackup']],
                           ['label' => 'Sychronization', 'url' => ['participant/sync']],
                           ['label' => 'Permissions', 'url' => ['participant/permissions']],
                           ['label' => 'Summary', 'url' => ['participant/summary']],
                        ]
                    ],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; KEMRI WELLCOME TRUST <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script>
    $(document).ready(function(){
        var curdate = "<?php echo date("Y-m-d");?>"
        $("#bpspot-date_visit, #urine-date_visit, #blood-date_collect_blood, #questionnaire-date_interview, #blood-date_visit, #blood-date_received_blood").val(curdate);
    });
</script>
