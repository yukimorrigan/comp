<?php include ROOT . '/views/layouts/header.php' ?>
<div class="container content-container product-content-container">	
	<div class="row product-info">
		<div class="col-4">
			<div class="product-img-container">
				<?php if ($product['sale'] == 10 || $product['sale'] == 20 ||  $product['sale'] == 30
					|| $product['sale'] == 50 || $product['sale'] == 70): ?>
					<div class="sale product-sale col">
						<img src="/template/img/<?php echo $product['sale'];?>_Off_Sale.png" class="sale-img">
					</div>
				<?php endif; ?>
			<img src="<?php echo Product::getImage($product['id']); ?>" class="rounded mx-auto d-block">
			</div>
		</div>

		<div class="col">
			<div class="row">
				<div class="col">
					<h3 class="product-fiol"><?php echo $product['name'];?></h3>
					<p class="product-cod">Код товара: <?php echo $product['code'];?></p>
				</div>
			</div>

			<div class="row align-items-center count-row">
				<h3 class="product-price product-fiol">Цена: <?php echo $product['price'];?> <img src="/template/img/grn.png" class="product-grn"></h3> 
				<a href="/cart/add/<?php echo $product['id']; ?>" data-id="<?php echo $product['id']; ?>" class="tobasket product-tobasket"><p>В корзину </p><img src="/template/img/tobasket.png"></a>
			</div>

			<!-- <div class="row align-items-center">
				<div class="col"><p class="blue">Характеристики</p></div>
			</div>

			<div class="row align-items-center characteristics">
				<table class="table table-borderless">
					<tbody>
						<?php if ($product['category_id'] == 1): ?>
						<tr>
					    	<td>Производитель</td>
					    	<td>Accord</td>
					    </tr>
					    <tr>
					    	<td>Форм-фактор совместимых плат</td>
					    	<td>E-ATX</td>					     
					    </tr>
					    <tr>
					    	<td>Число внутренних отсеков 3.5"</td>
					    	<td>2</td>
					    </tr>
					    <tr>
					    	<td>Типоразмер</td>
					    	<td>Midi-Tower</td>
					    </tr>
					    <?php endif ?>
					</tbody>
				</table>
			</div> -->
		</div>

		<div class="row description">
			<div class="col">
				<h3>Описание</h3>
				<p><?php echo $product['description'];?></p>
			</div>
		</div>
	</div>
</div>
<?php include ROOT . '/views/layouts/footer.php' ?>