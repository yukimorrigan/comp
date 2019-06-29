<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container cart-container">
	<h3 class="h3 text-clr text-center">Оформление заказа</h3>
	<?php if ($result): ?>
		<p class="green">Заказ оформлен. Мы Вам перезвоним.</p>
	<?php else: ?>
		<p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн.</p>

		<?php if (isset($errors) && is_array($errors)): ?>
			<ul>
				<?php foreach ($errors as $error): ?>
					<li> - <?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

		<form action="#" method="post">
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Ваше имя</label>
			</div>
			<div class="col-5">
				<input type="text" name="userName" placeholder="Введите имя" class="form-control" value="<?php echo $userName; ?>">
			</div>
		</div>	
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Ваш телефон</label>
			</div>
			<div class="col-5">
				<input type="text" name="userPhone" placeholder="Введите телефон" class="form-control" value="<?php echo $userPhone; ?>">
			</div>
		</div>
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Коментарий к заказу</label>
			</div>
			<div class="col-5">
				<input type="text" name="userComment" placeholder="Введите коментарий" class="form-control" value="<?php echo $userComment; ?>">
			</div>
		</div>

		<div class="form-group row">
		    <div class="col-sm-10 text-right">
		      <input type="submit" name="submit" class="btn btn-primary" value="Оформить"></input>
		    </div>
		</div>
		</form>
	<?php endif; ?>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>