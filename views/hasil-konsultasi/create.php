<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HasilKonsultasi */

$this->title = 'Create Hasil Konsultasi';
$this->params['breadcrumbs'][] = ['label' => 'Hasil Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hasil-konsultasi-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
