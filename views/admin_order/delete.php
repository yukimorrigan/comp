<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item"><a href="/admin/order" class="nav-link">Управление заказами</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Удалить заказ</a></li>
                    </ul>
                </div>
            </nav>
            <br/>
            <h4>Удалить заказ #<?php echo $id; ?></h4>
            <p>Вы действительно хотите удалить этот заказ?</p>
            <form method="post">
                <input type="submit" name="submit" value="Удалить" class="btn btn-primary" />
            </form>
            <br/>
        </div>
    </div>
    
</div>

<?php include ROOT . '/views/layouts/footer_admin.php' ?>