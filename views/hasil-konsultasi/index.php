<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HasilKonsultasuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MANAJEMEN HASIL KONSULTASI';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="/web/adminLTE/plugins/datatablse/dataTables.bootstrap.min.css">
<div class="hasil-konsultasi-index panel panel-info">
    <div class="panel-heading">
		<h4>
			<?= Html::encode($this->title) ?>
			<span class="pull-right">
			<?= Html::a('<span class="btn-label"><i class="fa fa-plus"></i></span> Data Baru', ['create'], ['class' => 'btn btn-success btn-sm waves-effect waves-light']) ?>
			</span>
		</h4>
	</div>

	<table class="dttable table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Pasien</th>
				<th>Jenis Kelamin</th>
				<th>Usia</th>
				<th>Diagnosa</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach($dataProvider as $data) { ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data['nama_penderita'] ?></td>
				<td><?= $data['jenkel'] ?></td>
				<td><?= $data['usia_penderita'] ?></td>
				<td><?= $data['nama_diagnosa'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>


</div>
<!-- <script src="/web/adminLTE/plugins/datatablse/jquery.dataTables.min.js"></script> -->

