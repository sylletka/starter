<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use Cron\CronExpression;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cronjobs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cronjob-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cronjob'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'content' => function($model, $key, $index, $column){
                    return Html::a($model->expression . " " . $model->cron_command, Url::to(['update', 'id' => $model->id]));
                },
                'contentOptions' => ['class' => 'monospace']
            ],
            'last_execution_time',
            [
                'header' => Yii::t('app', 'Next execution time'),
                'content' => function($model, $key, $index, $column){
                    $cron = CronExpression::factory($model->expression);
                    return $cron->getNextRunDate()->format('d/m/Y H:i:s');
                }
            ],
            'log',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>
</div>
