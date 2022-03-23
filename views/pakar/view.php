<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pakar */

$this->title = $model->id_pakar;
$this->params['breadcrumbs'][] = ['label' => 'Pakars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pakar-view panel panel-info">
    <div class="panel-heading">
        <h4>
            <?= Html::encode($this->title) ?>
            <span class="pull-right">
                <?= Html::a('Lihat Semua', ['index'], ['class' => 'btn btn-success btn-sm']) ?>
                <?= Html::a('Update', ['update', 'id' => $model->id_pakar], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_pakar], [
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
            'id_pakar',
            'kodeDiagnosa.nama_gejala',
            'kodeGejala.nama_gejala',
            'evidence',
        ],
    ]) ?>

</div>
