<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container content-container default-container">	
	<h3 class="h3 text-center mx-auto text-clr">Список покупок</h3>
    <?php if ($result): ?>
	<table class="table-admin-medium table-bordered table-striped table ">
        <tr>
            <th>ID товара</th>
            <th>Артикул товара</th>
            <th>Название</th>
            <th>Количество</th>
            <th>Цена</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['code']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $productsQuantity[$product['id']]; ?></td>
                <td>$<?php echo $product['price']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p class="text-clr">Вы еще ни разу не оформляли заказ</p>
    <?php endif; ?>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>