<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
	'id' => 'basic',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'language' => 'en',
	'defaultRoute' => 'category/index',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'modules' => [
		'admin' => [
			'class' => 'app\modules\admin\Module',
			'layout' => 'admin',
			'defaultRoute' => 'order/index',
		],
	],
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'jYg9P9Wufto1ZZFpwfK6DwoSTl-2rqE1',
			'baseUrl' => '',
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => true,

			//здесь указывается контроллер куда будет перенаправлен пользователь, если неавторизован и пытается попасть в админку. по умолчанию открывается site/login
			// 'loginUrl' => 'cart'
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure transport
			// for the mailer to send real emails.
			'useFileTransport' => false,
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.yandex.ru',
				'username' => 'test-smr',
				'password' => 'Qwert09876',
				'port' => '465',
				'encryption' => 'ssl',
			],
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

		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
				'category/<id:\d+>/page/<page:\d+>' => 'category/view', //правило для страниц пагинации
				'category/<id:\d+>' => 'category/view',
				'product/<id:\d+>' => 'product/view',
				'search' => 'category/search',
			],
		],

	],

	'controllerMap' => [
		'elfinder' => [
			'class' => 'mihaildev\elfinder\PathController',
			'access' => ['@'],
			'root' => [
				'path' => 'upload/global',
				'name' => 'Global'
			],
			// 'watermark' => [
			// 	'source'         => __DIR__ . '/logo.png', // Path to Water mark image
			// 	'marginRight'    => 5,          // Margin right pixel
			// 	'marginBottom'   => 5,          // Margin bottom pixel
			// 	'quality'        => 95,         // JPEG image save quality
			// 	'transparency'   => 70,         // Water mark image transparency ( other than PNG )
			// 	'targetType'     => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
			// 	'targetMinPixel' => 200         // Target image minimum pixel size
			// ]
		]
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
