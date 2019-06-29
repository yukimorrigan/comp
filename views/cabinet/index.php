<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container cabinet-container">
	<h3 class="h3 text-center mx-auto text-clr">Кабинет пользователя</h3>
	<h4 class="h4 text-clr">Привет, <?php echo $user['name']; ?></h4>
	<div class="row">
		<div class="col">
			<ul class="user-ul">
				<li><a href="/cabinet/edit">Редактировать данные</a></li>
				<li><a href="/cabinet/history">Список покупок</a></li>
			</ul>
		</div>
	</div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>