<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item"><a href="/admin/attribute" class="nav-link">Управление аттрибутами</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Редактировать аттрибут</a></li>
                    </ul>
                </div>
            </nav>
            <br/>

            <h4>Редактировать аттрибут #<?php echo $id; ?></h4>

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
                            <label>Название аттрибута</label>
                            <input type="text" name="name" placeholder="" value="<?php echo $attribute['name']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Категория</label>
                            <select name="category_id" class="form-control">
                                <?php if (is_array($categoriesList)): ?>
                                    <?php foreach ($categoriesList as $category): ?>
                                        <option value="<?php echo $category['id']; ?>" 
                                            <?php if ($attribute['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Значения</label>
                            <button id="add-attr" type="button" class="btn btn-link"><i class="fa fa-plus"></i></button>
                            <div id="attr">
                                <?php $i = 0; ?>
                                <?php foreach($attribute->ownAttributevalueList as $value): ?>
                                    <div class="form-inline">
                                        <div class="form-group mb-2 pr-3"> 
                                            <input type="text" name="value[<?php echo $i; ?>]" placeholder="" value="<?php echo $value['name']; ?>" class="form-control mb-2">
                                        </div>
                                        <div class="form-group mb-2 pr-3"> 
                                            <button type="button" class="btn btn-link remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Статус</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php if ($attribute['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                                <option value="0" <?php if ($attribute['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
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