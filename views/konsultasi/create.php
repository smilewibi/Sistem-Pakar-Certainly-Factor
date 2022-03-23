<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Konsultasi */

$this->title = 'Create Konsultasi';
$this->params['breadcrumbs'][] = ['label' => 'Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konsultasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
