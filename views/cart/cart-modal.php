<?php
use yii\helpers\Html;
?>
<?php if (!empty($session['cart'])) : ?>
	<h2>Корзина полна</h2>
	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($session['cart'] as $id => $item) : ?>
							<tr>
								<td class="cart_product">
									<a href=""><?= Html::img('@web/images/products/'.$item['img'], ['alt' => $item['name']]) ?></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?= $item['name'] ?></a></h4>
									<p>Web ID: 1089772</p>
								</td>
								<td class="cart_price">
									<p>$<?= $item['price'] ?></p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="<?= $item['qty'] ?>" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">$<?= $item['price'] * $item['qty'] ?></p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td colspan="4" class="cart_sum">
								<h4 class="cart_sum_price">Общая стоимость: </h4>
							</td>
							<td class="cart_total_qty">
							<p class="cart_sum_price cart_total_price">$<?= $session['cart.sum'] ?></p>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</section>
	<!--/#cart_items-->
<?php else : ?>
	<div class="container">
		<h2>Корзина пуста!</h2>
	</div>
<?php endif; ?>