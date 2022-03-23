<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Diagnosa;
use app\models\Gejala;

/* @var $this yii\web\View */
/* @var $model app\models\Pakar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pakar-form">
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

            <?php
                $diagnosa=Diagnosa::find()->all();
                echo $form->field($model, 'pkode_diagnosa')->dropDownList(ArrayHelper::map($diagnosa,'kode_diagnosa', function($diagnosa) { return $diagnosa->kode_diagnosa . ' - ' . $diagnosa->nama_diagnosa; }), ['prompt'=>'.: Pilih Diagnosa :.']);		
                /* echo $form->field($model, 'kode_diagnosa')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($diagnosa,'kode', function($diagnosa) { return $diagnosa->kode . ' - ' . $diagnosa->nama; }),
                    'theme' => Select2::THEME_KRAJEE_BS4,
                    'options' => ['placeholder' => '.: Pilih Diagnosa :.'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Diagnosa'); */
            ?>

            <?php
                $gejala=Gejala::find()->all();	
                echo $form->field($model, 'pkode_gejala')->dropDownList(ArrayHelper::map($gejala,'kode_gejala', function($gejala) { return $gejala->kode_gejala . ' - ' . $gejala->nama_gejala; }), ['prompt'=>'.: Pilih Gejala :.']);		
                /* echo $form->field($model, 'kode_gejala')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($gejala,'kode', function($gejala) { return $gejala->kode . ' - ' . $gejala->nama; }),
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => ['placeholder' => '.: Pilih Gejala :.'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Gejala'); */
            ?>

            <?= $form->field($model, 'evidence')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('<span class="btn-label"><i class="fa fa-check"></i></span> Simpan', ['class' => 'btn btn-success waves-effect waves-light']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
