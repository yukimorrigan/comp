<?php 

class AdminAttributeController extends AdminBase {

	public function actionIndex()
	{
		// Проверка доступа
		self::checkAdmin();
		// Получаем список аттрибутов
		$attributesList = Attribute::getAttributesList();
		// Подключаем вид
		require_once(ROOT . '/views/admin_attribute/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
		$categoriesList = Category::getCategoriesListAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $categoryId = $_POST['category_id'];
            $values = $_POST['value'];

            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            // Если ошибок нет
            if ($errors == false) {
                // Добавляем новую категорию
                $id = Attribute::createAttribute($name, $categoryId, $values);
                // Перенаправляем пользователя на страницу управлениями аттрибутами
                header("Location: /admin/attribute");
            }
        }
        require_once(ROOT . '/views/admin_attribute/create.php');
        return true;
    }

    public function actionUpdate($id) {
		// Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем данные о конкретном аттрибуте
        $attribute = Attribute::getAttributeById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
        	// Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $name = $_POST['name'];
            $categoryId = $_POST['category_id'];
            $values = $_POST['value'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Attribute::updateAttributeById($id, $name, $categoryId, $values, $status);

            // Перенаправляем пользователя на страницу управлениями аттрибутами
            header("Location: /admin/attribute");
        }
         // Подключаем вид
        require_once(ROOT . '/views/admin_attribute/update.php');
        return true;
	}

    public function actionDelete($id) {
		// Проверка доступа
		self::checkAdmin();
		// Обработка формы
		if (isset($_POST['submit'])) {
			// Если форма отправлена
			// Удаляем аттрибут
			Attribute::deleteAttributeById($id);
			// Перенаправляем пользователя на страницу аттрибутов
			header("Location: /admin/attribute");
		}

		// Подключаем вид
		require_once(ROOT . '/views/admin_attribute/delete.php');
		return true;
	}
}

 ?>