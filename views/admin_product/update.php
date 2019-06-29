<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item"><a href="/admin/product" class="nav-link">Управление товарами</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Редактировать товар</a></li>
                    </ul>
                </div>
            </nav>
            <br/>

            <h4>Редактировать товар #<?php echo $id; ?></h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul class="red-ul">
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group mx-sm-3 mb-2">
                            <label>Название товара</label>
                            <input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Артикул</label>
                            <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Количество</label>
                            <input type="text" name="count" placeholder="" value="<?php echo $product['count']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Стоимость, $</label>
                            <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Категория</label>
                            <select name="category_id" class="form-control">
                                <?php if (is_array($categoriesList)): ?>
                                    <?php foreach ($categoriesList as $category): ?>
                                        <option value="<?php echo $category['id']; ?>" 
                                            <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Производитель</label>
                            <input type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Изображение товара</label>
                            <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" class="product-img"/>
                            <input type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>" class="form-control-file">
                        </div>
                        </br>
                        <div class="form-group mx-sm-3 mb-2">
                            <label>Детальное описание</label>
                            <textarea name="description" class="form-control"><?php echo $product['description']; ?></textarea>
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Наличие на складе</label>
                            <select name="availability" class="form-control">
                                <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                                <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                            </select>
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Скидка, %</label>
                            <input type="text" name="sale" placeholder="" value="<?php echo $product['sale']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Рекомендуемые</label>
                            <select name="is_recommended" class="form-control">
                                <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                                <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                            </select>
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Статус</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                                <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                            </select>
                        </div>
                        </br>
                        <div class="col text-right"><input type="submit" name="submit" class="btn btn-primary" value="Сохранить"></div>
                        </br>                   
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>