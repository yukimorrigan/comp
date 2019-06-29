<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item"><a href="/admin/filter" class="nav-link">Управление фильтрами</a></li>
                        <li class="nav-item active"><a class="nav-link active">Управление свойствами аттрибутов</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <br>
    <p>Страница на этапе разработки</p>
    <div class="row">
        <div class="col">
            <a href="/admin/filter/attribute-value/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить свойство аттрибута</a>  
        </div>   
    </div>

    <div class="row">
        <div class="col">
            <h4>Список свойств аттрибутов</h4>
            <br/>
        </div>
    </div>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID свойства аттрибута</th>
            <th>Наименование свойства</th>
            <th>Принадлежит аттрибуту</th>
            <th>Порядковый номер</th>
            <th>Статус</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($attributeValuesList as $attributeValue): ?>
            <tr>
                <td><?php echo $attributeValue['id']; ?></td>
                <td><?php echo $attributeValue['name']; ?></td>
                <td><?php echo $attributeValue['attribute_name']; ?></td>
                <td><?php echo $attributeValue['sort_order']; ?></td>
                <td><?php echo AttributeValue::getStatusText($attributeValue['status']); ?></td>  
                <td><a href="/admin/filter/attribute-value/update/<?php echo $attributeValue['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/admin/filter/attribute-value/delete/<?php echo $attributeValue['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
</div>