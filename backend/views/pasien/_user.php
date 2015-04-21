<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use dektrium\user\models\User;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('user', 'Create a user account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                
                <?php $form = ActiveForm::begin([
                    'type' => ActiveForm::TYPE_HORIZONTAL,
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>

                <?= $form->field($user, 'username')->textInput(['readonly' => true])?>
                <?= $form->field($user, 'password')->textInput(['readonly' => true])?>
                <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>             

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
