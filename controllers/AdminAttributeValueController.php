<?php 

/**
 * Управление свойствами аттрибутов в админпанели
 */
class AdminAttributeValueController extends AdminBase
{
	public function actionIndex() {
		// Проверка доступа
		self::checkAdmin();	
		// Получаем список свойств аттрибутов
		$attributeValuesList = AttributeValue::getAttributeValuesListAdmin();
		// Получаем наименования аттрибутов по полю id в таблице свойств
		for ($i = 0; $i < count($attributeValuesList); $i++) {
			$attribute = Attribute::getAttributeNameById($attributeValuesList[$i]['attribute_id']);
			$attributeValuesList[$i]['attribute_name'] = $attribute['name'];;
		}

		// Подключаем вид
		require_once(ROOT . '/views/admin_attribute_value/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем список аттрибутов для выпадающего списка
        $attributesList = Attribute::getAttributesListAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $attribute = $_POST['attribute_id'];
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
                AttributeValue::createAttributeValue($name, $attribute, $sortOrder, $status);
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/filter/attribute-value");
            }
        }
        require_once(ROOT . '/views/admin_attribute_value/create.php');
        return true;
    }
}

 ?>