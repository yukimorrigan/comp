<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container cart-container">
	<div class="row">
		<div class="col">
			<h3 class="h3 text-clr">Ваша корзина</h3>
			<?php if ($productsInCart): ?>
			<table class="table table-borderless">
				<thead>
					<tr>
						<th>Код товара</th>
						<th>Название</th>
						<th>Количество, шт</th>
						<th>Стоимость, грн</th>
						<th>Удалить</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($products as $product): ?>
						<tr>
							<td><?php echo $product['code']; ?></td>
							<td>
								<a href="/product/<?php echo $product['id'];?>"><?php echo $product['name']; ?></a>
							</td>
							<td class="text-center"><?php echo $productsInCart[$product['id']]; ?></td>
							<td class="text-center"><?php echo $product['price']; ?></td>
							<td class="text-center">
                                <a href="/cart/delete/<?php echo $product['id'];?>"">X</a>
                            </td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td colspan="3">Общая стоимость: </td>
						<td  class="text-center"><?php echo $totalPrice; ?></td>
					</tr>
				</tbody>
			</table>
			<?php else: ?>
				<p>Корзина пуста</p>
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col text-right">
			<a href="/cart/checkout" class="btn btn-primary send-btn">Оформить заказ</a>
		</div>
	</div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>