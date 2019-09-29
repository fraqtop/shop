<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'response' => [
            'on beforeSend' => function ($event) {
                $event->sender->headers->add('Access-Control-Allow-Origin', '*');
                $event->sender->headers->add('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, HEAD, OPTIONS');
                $event->sender->headers->add('Access-Control-Allow-Headers', 'Content-Type, session-token, Authorization, tz');
                $event->sender->headers->add('Access-Control-Expose-Headers', 'Content-Type, session-token');
                if (Yii::$app->request->isOptions) {
                    $event->sender->statusCode = 204;
                }
            },
            'format' => yii\web\Response::FORMAT_JSON
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'PhB7J31VQ6UcAmjKu6OWnT9K0gO9GIK4',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'authManager' => [
            'class' => \yii\rbac\DbManager::class
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => yii\rest\UrlRule::class, 'controller' => 'category'],
                ['class' => yii\rest\UrlRule::class, 'controller' => 'country'],
                [
                    'class' => yii\rest\UrlRule::class,
                    'controller' => 'manufacturer',
                ],
                ['class' => yii\rest\UrlRule::class, 'controller' => 'product'],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => 'user',
                    'except' => ['index'],
                    'extraPatterns' => [
                        'POST login' => 'login',
                        'GET me' => 'profile'
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
