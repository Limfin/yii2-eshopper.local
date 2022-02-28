<table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse;" class="table table-condensed">
	<thead>
		<tr style="background: #f9f9f9;" class="cart_menu">
			<td style="padding: 8px; border: 1px solid #ddd;" class="description">Name</td>
			<td style="padding: 8px; border: 1px solid #ddd;" class="price">Price</td>
			<td style="padding: 8px; border: 1px solid #ddd;" class="quantity">Quantity</td>
			<td style="padding: 8px; border: 1px solid #ddd;" class="total">Total</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($session['cart'] as $id => $item) : ?>
			<tr>
				<td style="padding: 8px; border: 1px solid #ddd;" class="cart_description">
					<h4><a href=""><?= $item['name'] ?></a></h4>
				</td>
				<td style="padding: 8px; border: 1px solid #ddd;" class="cart_price">
					<p>$<?= $item['price'] ?></p>
				</td>
				<td style="padding: 8px; border: 1px solid #ddd;" class="cart_quantity">
					<div class="cart_quantity_button">
						<span class="cart_quantity_input"><?= $item['qty'] ?></span>
					</div>
				</td>
				<td style="padding: 8px; border: 1px solid #ddd;" class="cart_total">
					<p class="cart_total_price">$<?= $item['price'] * $item['qty'] ?></p>
				</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td style="padding: 8px; border: 1px solid #ddd;" colspan="3" class="cart_sum">
				<h4 class="cart_sum_price">Общая стоимость: </h4>
			</td>
			<td style="padding: 8px; border: 1px solid #ddd;" class="cart_total_qty">
				<p class="cart_sum_price cart_total_price">$<?= $session['cart.sum'] ?></p>
			</td>
		</tr>
	</tbody>
</table>