<?php include ROOT . '/views/layouts/header_admin.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/admin" class="nav-link">Админпанель</a></li>
                        <li class="nav-item active"><a class="nav-link active">Управление фильтрами</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <br>
    <p>Вам доступны такие возможности:</p>
    <div class="row">
        <div class="col">
            <ul>
                <li><a href="/admin/filter/attribute">Управление аттрибутами</a></li>
                <li><a href="/admin/filter/attribute-value">Управление свойствами аттрибутов</a></li>
            </ul>
        </div>
    </div>
    <br>
</div>

<?php include ROOT . '/views/layouts/footer_admin.php' ?>