<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\helpers\Html;
use yii\data\Pagination;


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

		$category = Category::findOne($id);

		//если массив категории пуст, то возвращается ответ 404
		if (empty($category)) { // item does not exist
			throw new \yii\web\HttpException(404, 'Такой категории нет');
		}

		// $products = Product::find()->where(['category_id' => $id])->all();

		//настройка пагинации
		$query = Product::find()->where(['category_id' => $id]);
		$pages = new Pagination([
			'totalCount' => $query->count(),
			'pageSize' => 3,
			'forcePageParam' => false, //параметр который отвечает за вывод ЧПУ вместо get параметров на страницах пагинации(так же убирает get параметр "?page=1" с первой страницы)
			'pageSizeParam' => false, //параметр отвечает за вывод доплнительного get параметра ("per-page") в строке браузера, чтобы отключить показ устанавливается в "false"
		]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();

		$category = Category::findOne($id);


		//установка метатегов, вызывается метод setMeta() из общего контроллера AppController.php
		$this->setMeta('E_SHOPPER | ' . $category->name, $category->keywords, $category->description);

		return $this->render('view', [
			'products' => $products,
			'pages'    => $pages,
			'category' => $category,
		]);
	}
}
