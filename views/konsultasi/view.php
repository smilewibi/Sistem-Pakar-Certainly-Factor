<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Konsultasi */

$this->title = $model->id_konsultasi;
$this->params['breadcrumbs'][] = ['label' => 'Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="konsultasi-view panel panel-info">
    <div class="panel-heading">
        <h4>
            <?= Html::encode($this->title) ?>
            <span class="pull-right">
                <?= Html::a('<span class="btn-label"><i class="fa fa-shield"></i></span> Mulai Konsultasi', ['index'], ['class' => 'btn btn-success btn-sm']) ?>
                <?= Html::a('Update', ['Update', 'id' => $model->id_konsultasi], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['Delete', 'id' => $model->id_konsultasi], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </span>
        </h4>
    </div>
    <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_konsultasi',
                'nama_penderita',
                'jenkel',
                'alamat_penderita:ntext',
                //'kkode_diagnosa',
                //'hasil_cf',
                //'tanggal',
                //'id_user',
            ],
        ]) ?>
    </div>
</div>
