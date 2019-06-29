<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item"><a href="/admin/category" class="nav-link">Управление категориями</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Редактировать категорию</a></li>
                    </ul>
                </div>
            </nav>
            <br/>

            <h4>Редактировать категорию "<?php echo $category['name']; ?>"</h4>

            <br/>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group mx-sm-3 mb-2">
                            <label>Название</label>
                            <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Порядковый номер</label>
                            <input type="text" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Изображение категории</label>
                            <img src="<?php echo Category::getImage($category['id']); ?>" width="200" alt="" class="product-img"/>
                            <input type="file" name="image" placeholder="" value="<?php echo $category['image']; ?>" class="form-control-file">
                        </div>
                        </br>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Статус</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                                <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
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