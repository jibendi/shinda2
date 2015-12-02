<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use kartik\icons\Icon;
// Initialize framework as per <code>icon-framework</code> param in Yii config
Icon::map($this);
 

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

<?php $this->beginBody() ?>
    <div class="wrap">
        <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span></button><a class="navbar-brand" href="/shinda2/web/index.php">SHINDA 2 BP Monitoring</a></div><div id="w0-collapse" class="collapse navbar-collapse"><ul id="w1" class="navbar-nav navbar-right nav">
                    <?php if(Yii::$app->user->can('field_workers') || Yii::$app->user->can('system_admin')) {?><li><a href="/shinda2/web/index.php/site/index">Home</a></li><?php }?>
            <?php if(Yii::$app->user->can('appointments') || Yii::$app->user->can('system_admin')) {?><li><a href="/shinda2/web/index.php/participant/apptmnts">Appointments</a></li><?php }?>
            <?php if(Yii::$app->user->can('clinics') || Yii::$app->user->can('system_admin')) {?>
                <li><a href="/shinda2/web/index.php/participant/index">Participant</a></li>
                <li><a href="/shinda2/web/index.php/bpspot/index">Bpspot</a></li>
                <li><a href="/shinda2/web/index.php/bp24h/index">Bp24h</a></li>
                <li><a href="/shinda2/web/index.php/urine/index">Urine</a></li>
                <li><a href="/shinda2/web/index.php/blood/index">Blood</a></li>
            <?php }?>
            <li class="dropdown"><a class="dropdown-toggle"  data-toggle="dropdown">Settings <b class="caret"></b></a><ul id="w2" class="dropdown-menu"><li><a href="/shinda2/web/index.php/blood/generatebackup" tabindex="-1">Backup</a></li>
            <li><a href="/shinda2/web/index.php/blood/restorebackup" tabindex="-1">Restore</a></li>
             <?php if(Yii::$app->user->can('give_permissions') || Yii::$app->user->can('system_admin')) {?><li><a href="/shinda2/web/index.php/bpspot/#" tabindex="-1">Sychronization</a></li> <?php }?>
            <?php if(Yii::$app->user->can('sychronization') || Yii::$app->user->can('system_admin')) {?><li><a href="/shinda2/web/index.php/participant/permissions" tabindex="-1">Permissions</a></li></ul></li><?php }?>
            <li><a href="/shinda2/web/index.php/site/logout" data-method="post">Logout (emundia)</a></li></ul></div></div>
        </nav>

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


<div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'SHINDA 2 BP Monitoring',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Appointments', 'url' => ['participant/apptmnts']],
                    ['label' => 'Bpspot', 'url' => ['/bpspot/index']],
                    ['label' => 'Bp24h', 'url' => ['bp24h/index']],
                    ['label' => 'Urine', 'url' => ['urine/index']],
                    ['label' => 'Blood', 'url' => ['blood/index']],
                    [
                        'label' => 'Settings',
                        'items' => [
                           ['label' => 'Backup', 'url' => ['blood/generatebackup']],
                           ['label' => 'Restore', 'url' => ['blood/restorebackup']],
                           ['label' => 'Sychronization', 'url' => ['#']],
                           ['label' => 'Permissions', 'url' => ['#']],
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
