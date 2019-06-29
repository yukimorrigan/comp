<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item"><a href="/admin/order" class="nav-link">Управление заказами</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Редактировать заказ</a></li>
                    </ul>
                </div>
            </nav>
            <br/>

            <h4>Редактировать заказ #<?php echo $id; ?></h4>

            <br/>

            <form action="#" method="post">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group mx-sm-3 mb-2">
                            <label>Имя клиента</label>
                            <input type="text" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Телефон клиента</label>
                            <input type="text" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>"" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Коментарий клиента</label>
                            <input type="text" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>"" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Дата оформления заказа</label>
                            <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>"" class="form-control">
                        </div>

                        <div class="form-group mx-sm-3 mb-2">
                            <label>Статус</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                                <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                                <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                                <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
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