<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KonsultasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'HASIL KONSULTASI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konsultasi-index panel panel-info">
    <div class="panel-heading">
		<h4>
			<?= Html::encode($this->title) ?>
			<span class="pull-right">
				<?= Html::a('<span class="btn-label"><i class="fa fa-plus"></i></span> Konsultasi Baru', ['create'], ['class' => 'btn btn-success btn-sm waves-effect waves-light']) ?>
		</h4>
	</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => '{items} {pager}',
        'options' => ['class' => 'full-color-table full-muted-table hover-table'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_konsultasi',
            'nama_penderita',
            'jenkel',
            'usia_penderita',
            'alamat_penderita:ntext',
            //'kkode_diagnosa',
            //'hasil_cf',
            'tanggal',
            //'id_user',

            //['class' => 'yii\grid\ActionColumn'],
            [
            'class'    => 'yii\grid\ActionColumn',
			'header'   => 'Menu',
			'headerOptions' => ['style' => 'width:20%'],
			'template' => '{konsultasi} {hasil} {leadUpdate} {leadDelete}',
			'buttons'  => [
				'konsultasi' => function ($url, $model) {
					//Yii::$app->session->remove('id_konsultasi');
					$url = Url::to(['konsultasi', 'id' => $model->id_konsultasi, 'page'=>"1"]);
					return Html::a('<span class="fa fa-shield"></span>', $url, ['class' => 'btn btn-success']);
				},
				// 'hasil' => function ($url, $model) {
				// 	Yii::$app->session->remove('id_konsultasi');
				// 	$url = Url::to(['/site/no-pengetahuan', 'id' => $model->id_konsultasi]);
				// 	return Html::a('<span class="fa fa-arrow-right"></span>', $url, ['class' => 'btn btn-info']);
				// },
				'leadUpdate' => function ($url, $model) {
					$url = Url::to(['update', 'id' => $model->id_konsultasi]);
					return Html::a('<span class="fa fa-pencil"></span>', $url, ['class' => 'btn btn-warning']);
				},
				'leadDelete' => function ($url, $model) {
					$url = Url::to(['delete', 'id' => $model->id_konsultasi]);
					return Html::a('<span class="fa fa-trash"></span>', $url, [
						'title'        => 'delete',
						'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
						'data-method'  => 'post',
						'class'  => 'btn btn-danger',
					]);
				},
				/* 'leadDelete' => function ($url, $model) {
					$url = Url::to(['delete', 'id' => $model->kode]);
					return Html::beginForm($url, 'post')
					. Html::submitButton(
						'<span class="fa fa-trash"></span>',
						['class' => 'btn btn-danger']
					)
					. Html::endForm();
				}, */
			]
            ]
        ],
    ]); ?>


</div>
