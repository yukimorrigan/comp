<?php 

class AdminCategoryController extends AdminBase
{
	public function actionIndex()
	{
		// Проверка доступа
		self::checkAdmin();
		// Получаем список категорий
		$categoriesList = Category::getCategoriesListAdmin();
		// Подключаем вид
		require_once(ROOT . '/views/admin_category/index.php');
		return true;
	}
	/**
     * Action для страницы "Добавить категорию"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            // Если ошибок нет
            if ($errors == false) {
                // Добавляем новую категорию
                $id = Category::createCategory($name, $sortOrder, $status);
                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/categories/{$id}.png");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }
    /**
     * Action для страницы "Редактировать категорию"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Category::updateCategoryById($id, $name, $sortOrder, $status);
            // Проверим, загружалось ли через форму изображение
            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                // Если загружалось, переместим его в нужную папке, дадим новое имя
                move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/categories/{$id}.png");
            }
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }
    /**
     * Action для страницы "Удалить категорию"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Category::deleteCategoryById($id);
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/upload/images/categories/{$id}.png")) {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/upload/images/categories/{$id}.png");
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }
}

 ?>