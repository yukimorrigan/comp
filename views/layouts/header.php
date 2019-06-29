<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Комплектующие компьютера</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/template/css/style.css">
	<link rel="stylesheet" type="text/css" href="/template/css/home.css">
	<link rel="stylesheet" type="text/css" href="/template/css/product.css">
	<link rel="stylesheet" type="text/css" href="/template/css/catalog.css">
	<link rel="stylesheet" type="text/css" href="/template/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/template/css/font-awesome.min.css">
	<link type="image/png" href="/template/img/logo_100.png" rel="icon">
	<script type="text/javascript" src="/template/libs/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="/template/libs/jquery-migrate-1.4.1.min.js"></script>
	<script type="text/javascript" src="/template/js/filter.js"></script>
	<script type="text/javascript" src="/template/js/cart.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navigation">
				<ul class="nav nav-pills nav-fill">
					<li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
					<li class="nav-item"><a href="/about/" class="nav-link">О магазине</a></li>
					<li class="nav-item"><a href="/contacts/" class="nav-link">Контакты</a></li>
					<!-- <li class="nav-item"><a href="/payment-and-delivery/" class="nav-link">Оплата и доставка</a></li>
					<li class="nav-item"><a href="/guarantees/" class="nav-link">Гарантии</a></li>
					<li class="nav-item"><a href="/promotions/" class="nav-link">Акции</a></li>
					<li class="nav-item"><a href="/rewiews/" class="nav-link">Отзывы</a></li> -->

					<?php if (User::isGuest()): ?>
						<li class="nav-item"><a href="/user/login/" class="nav-link">Войти</a></li>
					<?php else: ?>
						<li class="nav-item"><a href="/cabinet/" class="nav-link">Аккаунт</a></li>
						<li class="nav-item"><a href="/user/logout/" class="nav-link">Выйти</a></li>
					<?php endif; ?>
				</ul>		
			</div>
		</div>
	</nav>
	<div class="container content">
		<div class="row align-items-center">
		    <div class="col">
		    	<a href="/catalog/"><img src="/template/img/logo.png" class="rounded mx-auto d-block logo"></a>
		    </div> 
		    <div class="col">
		    	<form action="/search/" class="form-inline justify-content-center form-wrapper" method="post">
		    		<div class="form-group">
		    			<?php if (preg_match('/search/', $_SERVER['REQUEST_URI'])): ?>
				    		<input class="form-control search-form serch-active" type="search" name="search" placeholder="Поиск" value="<?php echo Search::returnKeyword(); ?>">
				    	<?php else: ?>
				    		<input class="form-control search-form serch-active" type="search" name="search" placeholder="Поиск">
				    	<?php endif; ?>
					</div>
					<div class="form-group">
				    	<button class="btn my-2 my-sm-0 search-btn" type="submit" name="find"><img src="/template/img/find.png"></button>
				    </div>			  
				</form>
			</div>
		    <div class="col">
		    	<div class="text-center justify-content-center align-items-center">
					<a href="/cart/index" class="box">Корзина (<span id="cart-count" class="count"><?php echo Cart::countItems();?></span>)<img src="/template/img/basket.png"></a>
				</div>
		    </div>
		</div>

		<nav class="row">
			<div class="catalog">
					<ul class="nav nav-fill">
						<?php foreach ($categories as $categoryItem): ?>
							<li class="nav-item <?php if ($categoryId == $categoryItem['id']) echo 'active' ?>">
								<a href="/category/<?php echo $categoryItem['id'];?>" class="nav-link">
									<?php if ($categoryItem['image'] != null): ?>
										<img src="/upload/images/categories/<?php echo $categoryItem['image'];?>">
									<?php else: ?>
										<img src="/upload/images/categories/empty.png">
									<?php endif; ?>
									<p><?php echo $categoryItem['name'];?></p>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>		
			</div>
		</nav>