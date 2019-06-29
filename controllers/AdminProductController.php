<?php 

/**
 * Управление товарами в админпанели
 */
class AdminProductController extends AdminBase
{
	public function actionIndex() {
		// Проверка доступа
		self::checkAdmin();
		// Получаем список товаров
		$productsList = Product::getProductsList();
		// Подключаем вид
		require_once(ROOT . '/views/admin_product/index.php');
		return true;
	}

	public function actionCreate() {
		// Проверка доступа
		self::checkAdmin();
		// Получаем список категорий для выпадающего списка
		$categoriesList = Category::getCategoriesListAdmin();
		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена
			// Получаем данные из формы
			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['sale'] = $_POST['sale'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            $options['count'] = $_POST['count'];

            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
            	$errors[] = 'Заполните поля';
            }

            if ($errors == false) {
            	// Добавляем новый товар
            	$id = Product::createProduct($options);
            	// Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

            	// Перенаправляем пользователя на страницу управлениями товарами
            	header("Location: /admin/product");
            }
		}

		// Подключаем вид
		require_once(ROOT . '/views/admin_product/create.php');
		return true;
	}

	public function actionUpdate($id) {
		// Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем данные о конкретном продукте
        $product = Product::getProductById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
        	// Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['sale'] = $_POST['sale'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            $options['count'] = $_POST['count'];

            // Сохраняем изменения
            Product::updateProductById($id, $options);
            // Проверим, загружалось ли через форму изображение
            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                // Если загружалось, переместим его в нужную папке, дадим новое имя
                move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
         // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
	}

	public function actionDelete($id) {
		// Проверка доступа
		self::checkAdmin();
		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена
			// Удаляем товар
			Product::deleteProductById($id);
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg")) {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
            }
			// Перенаправляем пользователя на страницу удаления товарами
			header("Location: /admin/product");
		}

		// Подключаем вид
		require_once(ROOT . '/views/admin_product/delete.php');
		return true;
	}
}

 ?>