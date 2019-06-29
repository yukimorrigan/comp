<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container home-content-container">	
	<div class="row product-list">
		<?php foreach ($latestProducts as $product): ?>
			<div class="col-3 text-center hot-product">
				<div class="row align-items-center img-container home-img-container container">
					<?php if ($product['sale'] == 10 || $product['sale'] == 20 ||  $product['sale'] == 30
						|| $product['sale'] == 50 || $product['sale'] == 70): ?>
						<div class="sale col">
							<img src="/template/img/<?php echo $product['sale'];?>_Off_Sale.png" class="sale-img">
						</div>
					<?php endif; ?>
					<img src="<?php echo Product::getImage($product['id']); ?>" class="rounded mx-auto d-block">
				</div>
				<p class="name fiol home-fiol"><?php echo $product['name'];?></p> 
				<p class="price home-price fiol home-fiol">Цена: <?php echo $product['price'];?><img src="/template/img/grn.png"></p>
				<a href="/product/<?php echo $product['id'];?>" class="see">Просмотреть &rArr;</a>
				<a href="#" data-id="<?php echo $product['id']; ?>" class="tobasket home-tobasket"><p>В корзину </p><img src="/template/img/tobasket.png"></a>
			</div>
		<?php endforeach; ?>		
	</div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>