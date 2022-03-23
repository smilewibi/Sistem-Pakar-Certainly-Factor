<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'BERANDA - HEALTHY MOUTH';
?>
<div class="site-index panel panel-info">
    <div class="panel-body">
      <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?= $countgejala ?></h3>

                <p>Gejala</p>
              </div>
              <div class="icon">
                <i class="fa fa-stethoscope"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $countdiagnosa ?></h3>

                <p>Diagnosa</p>
              </div>
              <div class="icon">
                <i class="fa fa-flask"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?= $counthasil ?></h3>

                <p>Hasil Konsultasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $countkonsultasi ?></h3>

                <p>Konsultasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer"></i></a>
            </div>
          </div>
          <!-- ./col -->
      </div>
      <div class="body-content">
          <h2>Selamat Datang!</h2>
          <p class="lead">HEALTHY - MOUTH (Sistem Pakar Diagnosa Penyakit Mulut dengan Metode <i>Certainty Factor</i>).</p>
          <p>
              <?= Html::a('<i class="fa fa-shield"></i> Mulai Konsultasi', ['/konsultasi/index/'], ['class' => 'btn btn-primary waves-effect waves-light']) ?>
          </p>

          <div class="row">
              <div class="col-lg-4">
                  <h4>Diagnosa</h4>

                  <p>Terdapat 8 diagnosa pada HEALTHY MOUTH yaitu Per Akut, Akut, Sub Akut, dan Kronis merupakan
          tingkat keparahan dalam pada penderita penyakit mulut.</p>

                  <p>
            <?= Html::a('Manajemen Diagnosa &raquo;', ['/diagnosa/index'], ['class' => 'btn btn-default btn-sm']) ?>
          </p>
              </div>
              <div class="col-lg-4">
                  <h4>Gejala</h4>

                  <p>HEALTHY - MOUTH memiliki 35 gejala dalam menentukan diagnosa terhadap penyakit Mulut.</p>

                  <p><?= Html::a('Manajemen Gejala &raquo;', ['/gejala/index'], ['class' => 'btn btn-default btn-sm']) ?></p>
              </div>
              <div class="col-lg-4">
                  <h4>Pakar</h4>

                  <p>Sistem ini meniru seorang pakar yaitu Dokter Gigi & Mulut dalam mendiagnosis penyakit Mulut.</p>

                  <p><?= Html::a('Manajemen Pakar &raquo;', ['/pakar/index'], ['class' => 'btn btn-default btn-sm']) ?></p>
              </div>
          </div>
      </div>
    </div>
</div>
