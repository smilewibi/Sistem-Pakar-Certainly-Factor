<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Gejala;
use app\models\VListAturan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Aturan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aturan-form">
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

        JIKA
        <?php
            $gejala=Gejala::find()->all();	
            $mix=VListAturan::find()->all();
            echo $form->field($model, 'kode_gejala')->dropDownList(ArrayHelper::map($gejala,'kode', function($gejala) { return $gejala->kode . ' - ' . $gejala->nama; }), ['prompt'=>'.: Pilih Gejala :.'])->label(false);		
            /*echo $form->field($model, 'kode_gejala')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($gejala,'kode', function($gejala) { return $gejala->kode . ' - ' . $gejala->nama; }),
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => '.: Pilih Gejala :.'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false); */
        ?>
        MAKA
        <?php	
            echo $form->field($model, 'ya')->dropDownList(ArrayHelper::map($gejala,'kode',function($gejala) { 
                        return $gejala->kode . ' - ' . $gejala->nama; 
                    }), ['prompt'=>'Tidak Cukup Pengetahuan'])->label(false);		
            /* echo $form->field($model, 'ya')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($mix,'kode',function($mix) { 
                        return $mix->kode . ' - ' . $mix->nama; 
                    }),
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => '-- Pilih Tindakan Ya --'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false); */
        ?>
        JIKA TIDAK MAKA
        <?php	
            echo $form->field($model, 'tidak')->dropDownList(ArrayHelper::map($gejala,'kode',function($gejala) { 
                        return $gejala->kode . ' - ' . $gejala->nama; 
                    }), ['prompt'=>'Tidak Cukup Pengetahuan'])->label(false);
            /* echo $form->field($model, 'tidak')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($mix,'kode',function($mix) { 
                        return $mix->kode . ' - ' . $mix->nama; 
                    }),
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => '-- Pilih Tindakan Ya --'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false); */
        ?>

        <div class="form-group">
            <?= Html::submitButton('<span class="btn-label"><i class="fa fa-check"></i></span> Simpan', ['class' => 'btn btn-success waves-effect waves-light']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
