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

		//переменная $id уже передается через параметр (actionView($id)), поэтому получать ее еще раз через get запрос нет смысла
		//$id = Yii::$app->request->get('id');

		$product = Product::findOne($id); //ленивая загрузка
		// $product = Product::find()->with('category')->where(['id' => $id])-limit(1)->one(); //жадная загрузка

		//если массив продукта пуст, то возвращается ответ 404
		if (empty($category)) { // item does not exist
			throw new \yii\web\HttpException(404, 'Такого товара нет');
		}

		$hits = Product::find()->where(['hit' => '1'])->limit(6)->all();

		//установка метатегов, вызывается метод setMeta() из общего контроллера AppController.php
		$this->setMeta('E_SHOPPER | ' . $product->name, $product->keywords, $product->description);

		return $this->render('view', [
			'product' => $product,
			'hits'    => $hits,
		]);
	}
}
