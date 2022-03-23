<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Konsultasi */

$this->title = 'Ubah Konsultasi:'. $model->id_konsultasi;
$this->params['breadcrumbs'][] = ['label' => 'Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_konsultasi, 'url' => ['view', 'id' => $model->id_konsultasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="konsultasi-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
