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

		//установка метатегов, вызывается метод setMeta() из общего контроллера AppController.php
		$this->setMeta('E_SHOPPER');


		// echo ('<pre>');
		// print_r($hits);
		// exit;

		return $this->render('index', [
			'hits' => $hits,
		]);
	}

	public function actionView($id)
	{

		$id = Yii::$app->request->get('id');

		$products = Product::find()->where(['category_id' => $id])->all();
		$category = Category::findOne($id);


		//установка метатегов, вызывается метод setMeta() из общего контроллера AppController.php
		$this->setMeta('E_SHOPPER | ' . $category->name, $category->keywords, $category->description);

		return $this->render('view', [
			'products' => $products,
			'category' => $category,
		]);
	}
}
