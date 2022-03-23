<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use app\models\Gejala;
//use yii\helpers\ArrayHelper;
//use yii\widgets\LinkPager;


/* @var $this yii\web\View */
/* @var $model app\models\HasilKonsultasi */
/* @var $form ActiveForm */
if(isset($_GET['page']) && $_GET['page'] > 35) {
    Yii::$app->response->redirect("?r=site/hasilkonsultasi&id=".$_GET['id']);
}
$this->title = "KONSULTASI #".Yii::$app->session['id_konsultasi'];
$this->params['breadcrumbs'][] = ['label' => 'Aturans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-riwayat" style="margin-top:70px;">
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
                    </div>
                </div>
            </div>            

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h4 class="text-center"><?= Html::encode($this->title) ?></h4>

                        <div class="panel-body">
                            
                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'hid_konsultasi')->hiddenInput(['value'=> $d->id_konsultasi])->label(false); ?>
                            <?php } ?>

                            <?php foreach($tampilgejala as $t) { ?>

                            <h4><b><?= Yii::$app->params['tanya_awal']." ".$t->nama_gejala." ".Yii::$app->params['tanya_akhir'] ?></b></h4>

                            <?= $form->field($model, 'hkode_gejala')->hiddenInput(['value'=> $t->kode_gejala])->label(false); ?>
                            <?php } ?>
                            <?= $form->field($model, 'jawaban')->dropDownList(['1'=>'YA',
                                                                            '0'=>'TIDAK',]) ?>
                            <?= $form->field($model, 'cf_user')->hiddenInput(['value'=> "0"])->label(false); ?>

                            <div class="form-group">
                                <?php if(isset($_GET['page']) && $_GET['page'] < 35) { ?>
                                    <?= Html::submitButton('Selanjutnya', ['class' => 'btn btn-primary']) ?>
                                <?php } ?>
                                <?php if(isset($_GET['page']) && $_GET['page'] >= 35) { ?>
                                    <?php
                                    echo Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
                                    <?php
                                    echo Html::a('Lihat Hasil', ['hasilkonsultasi','id'=>$id], ['class' => 'btn btn-success']) ?>
                                <?php } ?>
                            </div>
                            <?php ActiveForm::end(); ?>

                            <div class="col-md-6">
                                <h5 class="box-title"><b>Tabel Kepercayaan (Measure of Belief)</b></h5>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Gejala</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach($query2 as $q2) {
                                    ?>
                                    <tbody>
                                        <tr>
                                        <td><?= $q2['hkode_gejala']; ?></td>
                                        <td><?= $q2['nama_gejala']; ?></td>
                                        <td><?php
                                                if($q2['jawaban'] > 0){
                                                    echo "YA";
                                                }else{
                                                    echo "TIDAK";
                                                }
                                        ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="box-title"><b>Tabel Ketidakpercayaan (Measure of Disbelief)</b></h5>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach($query3 as $q3) {
                                    ?>
                                    <tbody>
                                        <tr>
                                        <td><?= $q3['hkode_gejala']; ?></td>
                                        <td><?= $q3['nama_gejala']; ?></td>
                                        <td><?php
                                                if($q3['jawaban'] > 0){
                                                    echo "YA";
                                                }else{
                                                    echo "TIDAK";
                                                }
                                        ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- site-riwayat -->
