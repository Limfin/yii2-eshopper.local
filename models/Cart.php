<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

	public function addToCart($product, $qty = 1)
	{ //передается сам продукт($product) и количество($qty) по умолчанию равно 1
		echo 'Worked';
	}
}
