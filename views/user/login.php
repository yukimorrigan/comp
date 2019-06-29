<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container default-container">	
	<h3 class="h3 text-center mx-auto text-clr">Вход</h3>
	
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

		<div class="form-group row">
		    <div class="col-sm-10 text-right">
		      <input type="submit" name="submit" class="btn btn-primary" value="Вход"></input>
		    </div>
		</div>
	</form>

	<div class="col-10">
		<a href="/user/register" class="text-right register-link">Вы зарегистированы? <u>Зарегистрироваться</u></a>
	</div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>