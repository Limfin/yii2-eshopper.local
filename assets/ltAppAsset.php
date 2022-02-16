<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ltAppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';

	//подключение скриптов происходит по условию, которое записано в массиве $jsOptions, в данном случае скрипты подключаться если браузер IE меньше 9 версии
	public $js = [
		'js/html5shiv.js',
		'js/respond.min.js',
	];
	public $jsOptions = [
		'condition' => 'lte IE9',
		'position' => \yii\web\View::POS_HEAD
	];
}
