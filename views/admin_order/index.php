<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item active"><a class="nav-link active">Управление заказами</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col">
            <h4>Список заказов</h4>
            <br/>
        </div>
    </div>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID заказа</th>
            <th>Имя покупателя</th>
            <th>Телефон покупателя</th>
            <th>Дата оформления</th>
            <th>Статус</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($ordersList as $order): ?>
            <tr>
                <td>
                    <a href="/admin/order/view/<?php echo $order['id']; ?>">
                        <?php echo $order['id']; ?>
                    </a>
                </td>
                <td><?php echo $order['user_name']; ?></td>
                <td><?php echo $order['user_phone']; ?></td>
                <td><?php echo $order['date']; ?></td>
                <td><?php echo Order::getStatusText($order['status']); ?></td>    
                <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php' ?>