<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\helpers\Html;


class CategoryController extends AppController
{

	public function actionIndex()
	{

		$hits = Product::find()->where(['hit' => '1'])->limit(6)->all();

		// echo ('<pre>');
		// print_r($hits);
		// exit;

		return $this->render('index', [
			'hits' => $hits,
		]);
	}
}
