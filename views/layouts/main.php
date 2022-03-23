<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="main-header">
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>H</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Heal</b>- Mouth</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="adminLTE/dist/img/avatar5.png" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?=Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="adminLTE/dist/img/avatar5.png" class="img-circle" alt="User Image">

                        <p>
                        <?=Yii::$app->user->identity->username ?>
                        <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                        </div>
                        <div class="pull-right">
                        <?=html::a('Keluar', ['site/logout'], ['data-method'=>'post','class'=>'btn btn-default btn-flat']) ?>
                        </div>
                    </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="adminLTE/dist/img/avatar5.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?=Yii::$app->user->identity->username ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <?= Html::a('<i class="fa fa-dashboard"></i><span class="hide-menu">dashboard </span>', ['/site/index']) ?>
                </li>
                <li class="treeview">
                    <?= Html::a('<i class="fa fa-stethoscope"></i><span class="hide-menu">Gejala </span>', ['/gejala/index']) ?>
                </li>
                <li class="treeview">
                    <?= Html::a('<i class="fa fa-flask"></i><span class="hide-menu">Diagnosa </span>', ['/diagnosa/index']) ?>
                </li>
                <li class="treeview">
                    <?= Html::a('<i class="fa fa-random"></i><span class="hide-menu">Aturan </span>', ['/pakar/index']) ?>
                </li>
                <li class="treeview">
                    <?= Html::a('<i class="fa fa-medkit"></i><span class="hide-menu">Konsultasi </span>', ['/konsultasi/index']) ?>
                </li>
                <li class="treeview">
                    <?= Html::a('<i class="fa fa-clipboard"></i><span class="hide-menu">Hasil Konsultasi </span>', ['/hasil-konsultasi/index']) ?>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
        </section>
        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
    </div>
    
</div>

<?php $this->endBody() ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
$('.dttable').DataTable();
</script>
</body>
</html>
<?php $this->endPage() ?>
