<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container-fluid">
	<div class="row">
		<div class="col">
			<br>
			<h4 class="h4">Добрый день, администратор!</h4>
			<p>Вам доступны такие возможности:</p>

			<ul>
	            <li><a href="/admin/product">Управление товарами</a></li>
	            <li><a href="/admin/category">Управление категориями</a></li>
	            <li><a href="/admin/order">Управление заказами</a></li>
	            <li><a href="/admin/filter">Управление фильтрами</a></li>
	        </ul>
		</div>
	</div>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php' ?>