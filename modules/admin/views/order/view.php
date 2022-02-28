<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

	<h1>Просмотр заказа №<?= $model['id'] ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'created_at',
			'updated_at',
			'qty',
			'sum',
			
			// 'status',
			//заменяет выводимое значение, вместо 0 и 1 в статусе заказа выводятся слова: "Не обработан" или "Завершен"
			[
				'attribute' => 'status', //здесь указывается название атрибута
				'value' => function ($data) {
					return !$data->status ? '<span class="text-danger">Не обработан</span>' : '<span class="text-success">Завершен</span>';
				},
				'format' => 'raw' //позволяет обрабывать html теги, в примере выше текст обернут в <span ></span>
			],

			'name',
			'email:email',
			'phone',
			'address',
		],
	]) ?>

	<?php $items = $model->orderItems; ?>
	<div class="table-responsive cart_info">
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="description">Name</td>
					<td class="price">Price</td>
					<td class="quantity">Quantity</td>
					<td class="total">Total</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($items as $item) : ?>
					<tr>
						<td class="cart_description">
							<h4><a href="<?= Url::to(['/product/view', 'id' => $item['product_id']]); ?>"><?= $item['name'] ?></a></h4>
						</td>
						<td class="cart_price">
							<p>$<?= $item['price'] ?></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<span><?= $item['qty_item'] ?></span>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">$<?= $item['sum_item'] ?></p>
						</td>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>

</div>