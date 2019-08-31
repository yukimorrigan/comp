<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item active"><a class="nav-link active">Управление аттрибутами</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/admin/attribute/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить аттрибут</a>
        </div>   
    </div>
    <div class="row">
        <div class="col">
            <h4>Список аттрибутов</h4>
            <br/>
        </div>
    </div>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID аттрибута</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Кол-во значений</th>
            <th>Статус</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($attributesList as $attribute): ?>
            <tr>
                <td><?php echo $attribute['id']; ?></td>
                <td><?php echo $attribute['name']; ?></td>
                <td>
                    <?php 
                        $category = Category::getCategoryById($attribute['category_id']);
                        echo $category['name'];
                    ?>        
                </td>
                <td><?php echo $attribute->countOwn('attributevalue'); ?></td>  
                <td>
                    <?php echo ($attribute['status']) ? 'Отображается' : 'Скрыт';?>    
                </td>  
                <td><a href="/admin/attribute/update/<?php echo $attribute['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/admin/attribute/delete/<?php echo $attribute['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php' ?>