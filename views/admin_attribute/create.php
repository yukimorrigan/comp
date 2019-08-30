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
                        <li class="nav-item"><a href="#" class="nav-link active">Добавить аттрибут</a></li>
                    </ul>
                </div>
            </nav>
            <br/>

            <h4>Добавить новый аттрибут</h4>

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
	                        <label>Название</label>
	                        <input type="text" name="name" placeholder="" value="" class="form-control">
	                    </div>

	                    <div class="form-group mx-sm-3 mb-2">
	                        <label>Категория</label>
	                        <select name="category_id" class="form-control">
	                            <?php if (is_array($categoriesList)): ?>
	                                <?php foreach ($categoriesList as $category): ?>
	                                    <option value="<?php echo $category['id']; ?>">
	                                        <?php echo $category['name']; ?>
	                                    </option>
	                                <?php endforeach; ?>
	                            <?php endif; ?>
	                        </select>
	                    </div>

 	                    <div class="form-group mx-sm-3 mb-2">
	                        <label>Значения</label>
	                        <div class="form-inline"> 
	                        	<div class="form-group mb-2 pr-3">                      	
		                        	<input id="new-value" type="text" placeholder="" value="" class="form-control">
		                    	</div>
		                    	<div class="form-group mb-2">
		                        	<button id="add-btn" type="button" class="btn btn-primary">Добавить</button>
		                    	</div>
	                        </div>
	                    </div>
	                    <div id="attr-values" class="form-group mx-sm-3 mb-2"></div>

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