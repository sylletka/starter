<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\checkboxFieldRow;

/* @var $this yii\web\View */
/* @var $model app\models\Cronjob */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cronjob-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'expression')->textinput() ?>

    <?= $form->field($model, 'cron_command')->textinput() ?>

    <?= $form->field($model, 'params')->textinput() ?>

    <?= checkboxFieldRow::widget([
       'label' => 'Log',
       'firstColumnWidth' => 2,
       'secondColumnWidth' => 10,
       'tagName' => 'Cronjob[log]',
       'wrapperOptions' => [ 'class' => 'question']
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
