<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item active"><a class="nav-link active">Управление категориями</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>
        </div>   
    </div>
    <div class="row">
        <div class="col">
            <h4>Список категорий</h4>
            <br/>
        </div>
    </div>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID категории</th>
            <th>Название категории</th>
            <th>Порядковый номер</th>
            <th>Статус</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($categoriesList as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $category['sort_order']; ?></td>
                <td><?php echo Category::getStatusText($category['status']); ?></td>  
                <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php' ?>