<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php',
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        's3' => function () {
            return new Aws\S3\S3Client([
                'version' => 'latest',
                'region'  => 'default',
                'endpoint' => 'https://s3.ir-thr-at1.arvanstorage.com',
                'use_path_style_endpoint' => true,
                'credentials' => [
                    'key'    => '4d541e2c-05fb-4ed5-bd96-dc8286518282',
                    'secret' => 'ed44d05c9e1a90823bff8c22eb636b431460dbe0dac16a1ed57477fc741890a2',
                ],
            ]);
        },
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
                'home' => 'blog/blog',
            ],
        ],
        'assetManager' => [
            // تنظیمات مربوط به
        ],
    ],
    'params' => $params,
];
 