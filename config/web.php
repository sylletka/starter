<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'   => 'en',
    'sourceLanguage' => 'en_GB',
    'components' => [
	    'request' => require(__DIR__ . '/request.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => require(__DIR__ . '/mailer.php'),
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
         /*   'rules' => [
            ],*/
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                ],
            ],
        ],  
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableRegistration' => false,
            'adminPermission' => 'administrator',
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule',
            'adminPermission' => 'administrator',            
        ],
        'menu' => [
            'class' => 'cornernote\menu\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
