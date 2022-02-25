<?php

namespace app\controllers;

use app\models\Product;
use app\models\Cart;
use Yii;


class CartController extends AppController
{

	public function actionAdd()
	{

		$id = Yii::$app->request->get('id');

		$product = Product::findOne($id);
		if (empty($product)) {
			return false;
		}

		//создание сессии для хранения данных корзины
		$session = Yii::$app->session;
		$session->open();
		$cart = new Cart();
		//вызов метода из модели
		$cart->addToCart($product);

		//отключаем вывод layout чтобы в модальном окне не подключался header и footer
		$this->layout = false;

		return $this->render('cart-modal', [
			'session' => $session,
		]);
	}

	public function actionClear()
	{

		$session = Yii::$app->session;
		$session->open();
		$session->remove('cart');
		$session->remove('cart.qty');
		$session->remove('cart.sum');

		//отключаем вывод layout чтобы в модальном окне не подключался header и footer
		$this->layout = false;

		return $this->render('cart-modal', [
			'session' => $session,
		]);
	}
}