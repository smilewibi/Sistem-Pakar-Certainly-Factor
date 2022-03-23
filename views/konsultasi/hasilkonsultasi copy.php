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
<div class="site-about">
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
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Diagnosa</th>
                                <th>Nilai Certainly Factor</th>
                            </tr>
                        </thead>
                        <?php foreach($diagnosa as $diagnosa) { ?>
                        <tbody>
                            <tr>
                                <td><?= $diagnosa->nama_diagnosa ?></td>
                                <td>0,99</td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

                    <div class="panel-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Penyakit</th>
                                    <th>Gejala</th>
                                    <th>Jawaban</th>
                                    <th>Evidence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($PM001 as $PM1) {
                                ?>
                                <tr>
                                <td><?= $PM1['nama_diagnosa']; ?></td>
                                <td><?= $PM1['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM1['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                
                                    <?= $PM1['evidence']; ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                foreach($PM002 as $PM2) {
                                ?>
                                <tr>
                                <td><?= $PM2['nama_diagnosa']; ?></td>
                                <td><?= $PM2['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM2['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                
                                    <?= $PM2['evidence']; ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                foreach($PM003 as $PM3) {
                                ?>
                                <tr>
                                <td><?= $PM3['nama_diagnosa']; ?></td>
                                <td><?= $PM3['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM3['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                
                                    <?= $PM3['evidence']; ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                foreach($PM004 as $PM4) {
                                ?>
                                <tr>
                                <td><?= $PM4['nama_diagnosa']; ?></td>
                                <td><?= $PM4['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM4['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                
                                    <?= $PM4['evidence']; ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                foreach($PM005 as $PM5) {
                                ?>
                                <tr>
                                <td><?= $PM5['nama_diagnosa']; ?></td>
                                <td><?= $PM5['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM5['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                
                                    <?= $PM5['evidence']; ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                foreach($PM006 as $PM6) {
                                ?>
                                <tr>
                                <td><?= $PM6['nama_diagnosa']; ?></td>
                                <td><?= $PM6['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM6['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                    <?php
                                    echo $PM6['evidence']+$PM6['evidence']*(1-$PM6['evidence']) ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                foreach($PM007 as $PM7) {
                                ?>
                                <tr>
                                <td><?= $PM7['nama_diagnosa']; ?></td>
                                <td><?= $PM7['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM7['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                
                                    <?= $PM7['evidence']; ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                foreach($PM008 as $PM8) {
                                ?>
                                <tr>
                                <td><?= $PM8['nama_diagnosa']; ?></td>
                                <td><?= $PM8['nama_gejala']; ?></td>
                                <td><?php
                                        if($PM8['jawaban'] > 0){
                                            echo "YA";
                                        }else{
                                            echo "TIDAK";
                                        }
                                ?></td>
                                <td>
                                    <?= $PM8['evidence']; ?>
                                </td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>   
                        </table>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Solusi #Radang Gusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        - membersihkan gigi dengan benang (minimal sekali sehari)<br>
                                        - menyikat gigi (2x sehari)<br>
                                        - menggunakan pasta gigi dan obat kumur<br>
                                    </th>
                                </tr>
                            </tbody>
                        </table>







<!--
/////////////////////////////////Experiment//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br>

<table id="example2" class="table table-bordered table-hover">
<thead><tr><td>Penyakit</td><td>Gejala</td><td>Jawaban</td><td>Evidence</td></tr></thead>

<?php
//$getpm1 = $_GET[$PM1['evidence']];
/*
$mahasiswa = array(
		array($PM6['nama_diagnosa'], $PM6['nama_gejala'], "YA",$PM6['evidence']),
		array($PM6['nama_diagnosa'], $PM6['nama_gejala'], "YA",$PM6['evidence']),
		array($PM6['nama_diagnosa'], $PM6['nama_gejala'], "YA",$PM6['evidence']),
        array($PM6['nama_diagnosa'], $PM6['nama_gejala'], "YA",$PM6['evidence']),
        array($PM6['nama_diagnosa'], $PM6['nama_gejala'], "YA",$PM6['evidence'])
		);
			
	for ($row = 0; $row < 5; $row++) {
		echo "<tr>";
		for ($col = 0; $col < 4; $col++) {
			echo "<td>".$mahasiswa[$row][$col]."</td>";
		}
    echo "</tr>";
}
$hitungtemp1 = round($mahasiswa[0][3]+$mahasiswa[1][3]*(1-$mahasiswa[0][3]), 2);
$hitungtemp2 = round($hitungtemp1+$mahasiswa[2][3]*(1-$hitungtemp1), 2);
$hitungtemp3 = round($hitungtemp2+$mahasiswa[3][3]*(1-$hitungtemp2), 2);
$hitungtemp4 = round($hitungtemp3+$mahasiswa[4][3]*(1-$hitungtemp3), 2);
echo "Total Nilai CF dari Radang Gusi :".$hitungtemp4;
//echo $PM6['evidence']; */
?>

</table>    

/////////////////////////////////Experiment//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-->  




                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
