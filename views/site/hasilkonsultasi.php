<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Gejala;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\HasilKonsultasi */
/* @var $form ActiveForm */
$this->title = "HASIL KONSULTASI #".Yii::$app->session['id_konsultasi'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about"  style="margin-top:70px;">
    <section>
        <div class="row">
        <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <?php
                        foreach($data as $d) {
                        ?>
                        <img class="profile-user-img img-responsive img-circle" src="adminLTE/dist/img/avatar5.png" alt="User profile picture">

                        <h3 class="profile-username text-center"><?= $d->nama_penderita ?></h3>

                        <p class="text-muted text-center">Pasien</p>

                        <strong><i class="fa fa-child"></i> Jenis Kelamin</strong>

                        <p class="text-muted"><?= $d->jenkel ?></p>

                        <strong><i class="fa fa-mobile-phone"></i> Usia</strong>

                        <p class="text-muted"><?= $d->usia_penderita ?> Tahun</p>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                        <p class="text-muted"><?= $d->alamat_penderita ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

                        <div class="panel-body">
                        <h3>Kemungkinan Penyakit</h3>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Penyakit</th>
                                    <th>Skor</th>
                                    <th>Solusi</th>
                                </tr>
                            </thead>
                            <?php
                            // awal fungsi untuk menghitung skor mb
                            $i=1;
                            $nama_diagnosa = array();
                            $temp_solusi = array();
                            $temp_evidence = array();
                            foreach($queryMB as $q2) {
                                
                                if(!in_array($q2['nama_diagnosa'], $nama_diagnosa)) {
                                    array_push($nama_diagnosa, $q2['nama_diagnosa']);   
                                }
                                $temp_evidence[$q2['nama_diagnosa']][$i-1] = $q2['evidence'];
                                $temp_solusi[$q2['nama_diagnosa']] = $q2['solusi'];
                                $i++;
                            }
                            $skors = array();
                            $i = 0; 
                            foreach($temp_evidence as $key => $value) {
                                if(count($value) > 1) {
                                    $skors[$key] = 0;
                                    $temp_skor = 0;
                                    $j = 0;
                                    foreach($value as $evidence) {
                                        if($j == 0)
                                            $temp_skor = $evidence;
                                        else {
                                            $skors[$key] = $temp_skor + $evidence * (1 - $temp_skor);
                                            $temp_skor = $skors[$key];
                                        }
                                        $j++;
                                    }
                                    $skors[$key] = $temp_skor;
                                }
                                $i++;
                            }
                            // akhir fungsi untuk menghitung skor mb

                            // awal fungsi untuk menghitung skor db
                            $i=1;
                            $nama_diagnosa_db = array();
                            $temp_solusi_db = array();
                            $temp_evidence_db = array();
                            foreach($queryDB as $q2) {
                                
                                if(!in_array($q2['nama_diagnosa'], $nama_diagnosa_db)) {
                                    array_push($nama_diagnosa_db, $q2['nama_diagnosa']);   
                                }
                                $temp_evidence_db[$q2['nama_diagnosa']][$i-1] = $q2['evidence'];
                                $temp_solusi_db[$q2['nama_diagnosa']] = $q2['solusi'];
                                $i++;
                            }
                            $skors_db = array();
                            $i = 0; 
                            foreach($temp_evidence_db as $key => $value) {
                                if(count($value) > 1) {
                                    $skors_db[$key] = 0;
                                    $temp_skor = 0;
                                    $j = 0;
                                    foreach($value as $evidence) {
                                        if($j == 0)
                                            $temp_skor = $evidence;
                                        else {
                                            $skors_db[$key] = $temp_skor + $evidence * (1 - $temp_skor);
                                            $temp_skor = $skors_db[$key];
                                        }
                                        $j++;
                                    }
                                    $skors_db[$key] = $temp_skor;
                                }
                                $i++;
                            }
                            // akhir fungsi untuk menghitung skor db
                            ?>
                            <tbody>
                            <?php
                            $no = 1;
                            $real_skors = array();
                            foreach($skors as $key => $value) {
                                if(isset($skors_db[$key])) {
                                    $skors[$key] = $value - $skors_db[$key];
                                } else {
                                    $skors[$key] = $value - 0;
                                }

                                if($skors[$key] > 0) {
                                    $real_skors[$key] = $skors[$key];
                                }
                            }
                            arsort($real_skors); // sorting berdasarkan nilai terbesar
                            if($real_skors) {
                                foreach($real_skors as $sk => $s) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $sk ?></td>
                                <td><?= $s ?></td>
                                <td><?= $temp_solusi[$sk] ?></td>
                            </tr>
                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="4" align="center"><h5>Gejala tidak terdiagnosa!</h5></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                        <h3>Gejala yang Dipilih</h3>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Gejala</th>
                                    <th>Gejala</th>
                                    <th>Jawaban</th>
                                    <th>Evidence</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($query3 as $q3) {
                            ?>
                            
                                <tr>
                                <td><?= $q3['kode_gejala']; ?></td>
                                <td><?= $q3['nama_gejala']; ?></td>
                                <td><?php
                                        if($q3['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                 ?></td>
                                 <td><?= $q3['evidence']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
