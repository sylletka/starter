<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cronjob".
 *
 * @property string $id
 * @property string $expression
 * @property string $cron_command
 * @property string $params
 * @property string $last_execution_time
 * @property integer $log
 */
class Cronjob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cronjob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expression', 'cron_command'], 'required'],
            [['expression', 'cron_command', 'params'], 'string'],
            [['last_execution_time'], 'safe'],
            [['log'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'expression' => Yii::t('app', 'Expression'),
            'cron_command' => Yii::t('app', 'Cron Command'),
            'params' => Yii::t('app', 'Params'),
            'last_execution_time' => Yii::t('app', 'Last Execution Time'),
            'log' => Yii::t('app', 'Log'),
        ];
    }
}
