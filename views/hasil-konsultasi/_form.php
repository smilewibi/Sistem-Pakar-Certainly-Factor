<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HasilKonsultasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hasil-konsultasi-form">
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

        <?= $form->field($model, 'hid_konsultasi')->textInput() ?>

        <?= $form->field($model, 'hkode_gejala')->textInput() ?>

        <?= $form->field($model, 'jawaban')->textInput() ?>

        <?= $form->field($model, 'cf_user')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
