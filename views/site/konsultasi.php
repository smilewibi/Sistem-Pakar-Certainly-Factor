<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Konsultasi */
/* @var $form ActiveForm */

?> 
?>
<div class="konsultasi-form" style="margin-top:70px;">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                Konsultasi Online
            </h4>
        </div>
        <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama_penderita')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jenkel')->dropDownList(
            [
                'Laki-laki' => 'Laki-laki', 
                'Perempuan' => 'Perempuan'
            ], ['prompt'=>'-- Pilih Jenis --']
        ); ?>

        <?= $form->field($model, 'usia_penderita')->textInput(['maxlength' => true, 'placeholder' => 'Isikan usia (dalam Tahun)']) ?>

        <?= $form->field($model, 'alamat_penderita')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('<span class="btn-label"><i class="fa fa-save"></i></span> Simpan', ['class' => 'btn btn-success waves-effect waves-light']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
