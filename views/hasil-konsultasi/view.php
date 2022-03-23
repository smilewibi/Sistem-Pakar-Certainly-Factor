<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HasilKonsultasi */

$this->title = $model->id_hasil_konsultasi;
$this->params['breadcrumbs'][] = ['label' => 'Hasil Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hasil-konsultasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Lihat Semua', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Edit', ['update', 'id' => $model->id_hasil_konsultasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_hasil_konsultasi], [
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
            //'id_hasil_konsultasi',
            'konsultasi.nama_penderita',
            'kodeGejala.nama_gejala',
            'jawaban:boolean',
            //'cf_user',
        ],
    ]) ?>

</div>
