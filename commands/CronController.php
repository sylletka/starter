<?php

namespace app\commands;

use yii;
use yii\console\Controller;
use app\models\Cronjob;
use Cron\CronExpression;

class CronController extends Controller
{
    public function actionIndex()
    {
        $cronjobs = Cronjob::find()->all();
        foreach ($cronjobs as $cronjob) {
            $cron = CronExpression::factory($cronjob->expression);
            if ($cron->isDue()){
                $class = "app\commands\croncommand\\" . $cronjob->cron_command;
                $command = new $class;
                $command->exec($cronjob->params);
                $cronjob->last_execution_time = date('Y-m-d H:i:s');
                $cronjob->save();
                if ($cronjob->log == 1){
                    Yii::info($cronjob->cron_command . ' executed');
                }
            }
        }
    }
}

