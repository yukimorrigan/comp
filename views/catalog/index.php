<?php include ROOT . '/views/layouts/header.php' ?>
<div class="container content-container">
	<div class="row">
		<div class="col filters">
			<p class="name-of-filter">Название фильтра</p>
			<div class="filter-group filter-num">
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
			</div>

			<p class="name-of-filter">Название фильтра</p>
			<div class="filter-group filter-num">
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
			</div>

			<p class="name-of-filter">Название фильтра</p>
			<div class="filter-group filter-num">
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
			</div>

			<p class="name-of-filter">Название фильтра</p>
			<div class="filter-group filter-num">
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
			</div>

			<p class="name-of-filter">Название фильтра</p>
			<div class="filter-group filter-num">
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
			</div>

			<p class="name-of-filter">Название фильтра</p>
			<div class="filter-group filter-num">
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
			</div>

			<p class="name-of-filter">Название фильтра</p>
			<div class="filter-group filter-num">
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
				<a href="#">фильтр</a>
			</div>
		</div>

		<div class="col products">
			<div class="row">
			<?php foreach ($latestProducts as $product): ?>
				<div class="col-3 text-center product">
						<div class="row align-items-center img-container catalog-img-container">
							<?php if ($product['sale'] == 10 || $product['sale'] == 20 ||  $product['sale'] == 30
								|| $product['sale'] == 50 || $product['sale'] == 70): ?>
								<div class="sale col">
									<img src="/template/img/<?php echo $product['sale'];?>_Off_Sale.png" class="sale-img">
								</div>
							<?php endif; ?>
							<img src="<?php echo Product::getImage($product['id']); ?>" class="rounded mx-auto d-block">
						</div>
						<p class="name catalog-name fiol catalog-fiol"><?php echo $product['name'];?></p>
						<p class="price fiol catalog-fiol"><?php echo $product['price'];?><img src="/template/img/grn.png"></p>
						<a href="/product/<?php echo $product['id'];?>" class="see catalog-see">Просмотреть &rArr;</a>
						<a href="#" data-id="<?php echo $product['id']; ?>" class="tobasket catalog-tobasket"><p>В корзину </p><img src="/template/img/tobasket.png"></a>
					</div>
			<?php endforeach; ?>	
			</div>
		</div>
	</div>
</div>
<?php include ROOT . '/views/layouts/footer.php' ?>