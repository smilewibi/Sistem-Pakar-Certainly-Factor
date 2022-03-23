<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HasilKonsultasi */

$this->title = 'Update Hasil Konsultasi: ' . $model->id_hasil_konsultasi;
$this->params['breadcrumbs'][] = ['label' => 'Hasil Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hasil_konsultasi, 'url' => ['view', 'id' => $model->id_hasil_konsultasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hasil-konsultasi-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
