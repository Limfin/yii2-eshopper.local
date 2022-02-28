<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
	</p>


	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'created_at',
			'updated_at',
			'qty',
			'sum',

			//заменяет выводимое значение, вместо 0 и 1 в статусе заказа выводятся слова: "Не обработан" или "Завершен"
			[
				'attribute' => 'status', //здесь указывается название атрибута
				'value' => function ($data) {
					return !$data->status ? '<span class="text-danger">Не обработан</span>' : '<span class="text-success">Завершен</span>';
				},
				'format' => 'raw' //позволяет обрабывать html теги, в примере выше текст обернут в <span ></span>
			],

			//'status',
			//'name',
			//'email:email',
			//'phone',
			//'address',
			[
				'class' => ActionColumn::className(),
				//  'urlCreator' => function ($action, Order $model, $key, $index, $column) {
				//      return Url::toRoute([$action, 'id' => $model->id]);
				//   }
			],
		],
	]); ?>


</div>