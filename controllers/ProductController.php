<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\helpers\Html;


class ProductController extends AppController
{

	public function actionView($id)
	{

		$id = Yii::$app->request->get('id');

		$product = Product::findOne($id); //ленивая загрузка
		// $product = Product::find()->with('category')->where(['id' => $id])-limit(1)->one(); //жадная загрузка

		return $this->render('view', [
			'product' => $product,
		]);
	}
}
