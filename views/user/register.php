<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container default-container">	
	<h3 class="h3 text-center mx-auto text-clr">Регистрация</h3>
	<?php if ($result): ?>
		<p class="green">Вы зарегистрированы!</p>
	<?php else: ?>
		<?php if (isset($errors) && is_array($errors)): ?>
			<ul class="red-ul">
				<?php foreach ($errors as $error): ?>
					<li> - <?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

	<form action="#" method="post">
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Имя пользователя</label>
			</div>
			<div class="col-5">
				<input type="text" name="name" placeholder="Введите имя" class="form-control" value="<?php echo $name; ?>">
			</div>
		</div>
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">E-mail</label>
			</div>
			<div class="col-5">
				<input type="email" name="email" placeholder="Введите E-mail" class="form-control" value="<?php echo $email; ?>">
			</div>
		</div>
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Пароль</label>
			</div>
			<div class="col-5">
				<input type="password" name="password" placeholder="Введите пароль" class="form-control" value="<?php echo $password; ?>">
			</div>
		</div>
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Повторите пароль</label>
			</div>
			<div class="col-5">
				<input type="password" name="repeat-password" placeholder="Введите пароль" class="form-control" value="<?php echo $repeatPassword; ?>">
			</div>
		</div>
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Телефон</label>
			</div>
			<div class="col-5">
				<input type="text" name="phone" placeholder="Введите телефон" class="form-control" value="<?php echo $phone; ?>">
			</div>
		</div>

		<div class="form-group row">
		    <div class="col-sm-10 text-right">
		      <input type="submit" name="submit" class="btn btn-primary" value="Регистрация"></input>
		    </div>
		</div>
	</form>

	<?php endif; ?>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>