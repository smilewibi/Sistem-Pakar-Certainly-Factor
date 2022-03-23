<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gejala */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gejala-form">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <?= $this->title ?>
                <span class="pull-right">
                <?= Html::a('<span class="btn-label"><i class="fa fa-arrow-left"></i></span> Kembali', ['index'], ['class' => 'btn btn-danger btn-sm waves-effect waves-light']) ?>
                </span>
            </h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'kode_gejala')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nama_gejala')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('<span class="btn-label"><i class="fa fa-check"></i></span> Simpan', ['class' => 'btn btn-success waves-effect waves-light']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
