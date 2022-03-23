<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gejala */

$this->title = 'Ubah Gejala: ' . $model->kode_gejala;
$this->params['breadcrumbs'][] = ['label' => 'Gejalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_gejala, 'url' => ['view', 'id' => $model->kode_gejala]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gejala-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
