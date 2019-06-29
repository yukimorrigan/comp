<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container default-container">	
	<h3 class="h3 text-center mx-auto text-clr">Обратная связь</h3>

	<?php if ($result): ?>
	    <p class="green">Сообщение отправлено! Мы ответим Вам на указанный email.</p>
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
				<label class="col-form-label">E-mail</label>
			</div>
			<div class="col-5">
				<input type="email" name="userEmail" placeholder="Введите E-mail" class="form-control" value="<?php echo $userEmail; ?>">
			</div>
		</div>
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Тема письма</label>
			</div>
			<div class="col-5">
				<input type="text" name="userTheme" placeholder="Введите тему" class="form-control" value="<?php echo $userTheme; ?>">
			</div>
		</div>
		<div class="form-row register-row">
			<div class="col-5 text-right">
				<label class="col-form-label">Сообщение</label>
			</div>
			<div class="col-5">
				<input type="text" name="userText" placeholder="Введите сообщение" class="form-control" value="<?php echo $userText; ?>">
			</div>
		</div>

		<div class="form-group row">
		    <div class="col-sm-10 text-right">
		      <input type="submit" name="submit" class="btn btn-primary" value="Отправить"></input>
		    </div>
		</div>
	</form>
	<?php endif; ?>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>