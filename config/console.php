<?php

$config = [
    'id' => 'console',
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'migrate' => [
            'class' => 'cyberz\migrations\controllers\MigrationsController',
            'templateFile' => '@app/views/migration.php',
            'migrationLookup' => [
                '@vendor/yii2mod/yii2-cms/migrations',
                '@vendor/yii2mod/yii2-cron-log/migrations',
                '@vendor/yii2mod/yii2-user/migrations',
                '@vendor/yii2mod/yii2-comments/migrations',
                '@vendor/yii2mod/yii2-settings/migrations',
                '@yii/rbac/migrations',
            ],
        ],
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'app\tests\fixtures',
        ],
    ],
    'components' => [
        'errorHandler' => [
            'class' => 'yii2mod\cron\components\ErrorHandler',
        ],
        'mutex' => [
            'class' => 'yii\mutex\FileMutex',
        ],
    ],
    'modules' => [
        'rbac' => [
            'class' => 'yii2mod\rbac\ConsoleModule',
        ],
        'user' => [
            'class' => 'yii2mod\user\ConsoleModule',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
