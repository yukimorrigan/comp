<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container default-container">	
	<div class="row">
		<div class="col">		
			<?php if ($result): ?>
				<h4>Результаты поиска для: '<?php echo $keyword; ?>'</h4>
				<?php foreach ($result as $product): ?>
					<div class="row search-row">
						<div class="col-2">
							<img src="<?php echo Product::getImage($product['id']); ?>" class="rounded d-block">
						</div>
						<div class="col">
							<h6><?php echo $product['name'];?></h6>
							<p class="little-cod">Код продукта: <?php echo $product['code'];?></p>
							<p class="fiol search-fiol">Цена: <?php echo $product['price'];?> грн.</p>
							<div class="shadow-search"><div class="fade-search"></div><p class="descr "><?php echo $product['description'];?></p></div>
							<a href="/product/<?php echo $product['id'];?>" class="search-see">Просмотреть &rArr;</a>		
						</div>	
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>По вашему запросу ничего не найдено</p>
			<?php endif; ?>
			<div class="row pagination-search">
				<div class="col">
					<!-- Постраничная навигация -->
					<?php echo $pagination->get(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>