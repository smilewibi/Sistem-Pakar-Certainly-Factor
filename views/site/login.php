<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">
                <b>HEALTHY - MOUTH</b>
            </a>
            <h4>(Sistem Pakar Penyakit Mulut)</h4>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Masuk untuk melanjutkan</p>
			
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                <div class="col-lg-offset-1" style="color:#999;">
                
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
