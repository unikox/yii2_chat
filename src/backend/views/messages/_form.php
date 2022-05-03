<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Messages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'owner')->textInput(); ?>

    <?= $form->field($model, 'create_at')->textInput(); ?>

    <?= $form->field($model, 'update_at')->textInput(); ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'blocked')->checkbox(); ?>

    <?= $form->field($model, 'reply')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
