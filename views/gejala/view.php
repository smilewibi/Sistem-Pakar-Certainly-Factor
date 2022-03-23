<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gejala */

$this->title = $model->kode_gejala;
$this->params['breadcrumbs'][] = ['label' => 'Gejalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gejala-view panel panel-info">
    <div class="panel-heading">
        <h4>
            <?= Html::encode($this->title) ?>
            <span class="pull-right">
                <?= Html::a('Lihat Semua', ['index'], ['class' => 'btn btn-success btn-sm']) ?>
                <?= Html::a('Edit', ['update', 'id' => $model->kode_gejala], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Hapus', ['delete', 'id' => $model->kode_gejala], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </span>
        </h4>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_gejala',
            'nama_gejala',
        ],
    ]) ?>

</div>
