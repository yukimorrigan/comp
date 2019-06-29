<?php 

/**
 * Управление аттрибутами в админпанели
 */
class AdminAttributeController extends AdminBase
{
	public function actionIndex() {
		// Проверка доступа
		self::checkAdmin();	
		// Получаем список аттрибутов
		$attributesList = Attribute::getAttributesListAdmin();
        //Получаем наименования категорий по id в таблице атрибутов
        for ($i = 0; $i < count($attributesList); $i++) {
            $category = Category::getCategoryNameById($attributesList[$i]['category_id']);
            $attributesList[$i]['category_name'] = $category['name'];;
        }
		// Подключаем вид
		require_once(ROOT . '/views/admin_attribute/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $category = $_POST['category_id'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый аттрибут
                Attribute::createAttribute($name, $category, $sortOrder, $status);
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/filter/attribute");
            }
        }
        require_once(ROOT . '/views/admin_attribute/create.php');
        return true;
    }

    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Attribute::deleteAttributeById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/filter/attribute");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_attribute/delete.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем данные о конкретном аттрибуте
        $attribute = Attribute::getAttributeById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $category = $_POST['category_id'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Attribute::updateAttributeById($id, $category, $name, $sortOrder, $status);
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/filter/attribute");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_attribute/update.php');
        return true;
    }
}

 ?>