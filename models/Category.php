<?php 

class Category
{
	public static function getCategoriesList()
	{
		return R::getAll('SELECT `id`, `name` FROM `category`'
            . ' WHERE `status` = 1 '
            . ' ORDER BY `sort_order` ASC');
	}

	public static function getCategoriesListAdmin()
	{
        return R::getAll('SELECT `id`, `name`, `sort_order`, `status` FROM `category`'
            . ' ORDER BY `sort_order` ASC');
	}

	/**
     * Добавляет новую категорию
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createCategory($name, $sortOrder, $status)
    {
        $category = R::dispense('category');

        $category->name = $name;
        $category->sort_order = (int) $sortOrder;
        $category->status = (int) $status;

        R::store($category);

        return R::getInsertId();
    }
    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCategoryById($id)
    {
        $category = R::load('category', $id);
        R::trash($category);
    }

    /**
     * Редактирование категории с заданным id
     * @param integer $id <p>id категории</p>
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $category = R::load('category', $id);

        $category->name = $name;
        $category->sort_order = (int) $sortOrder;
        $category->status = (int) $status;

        R::store($category);
    }

    /**
     * Возвращает категорию с указанным id
     * @param integer $id <p>id категории</p>
     * @return array <p>Массив с информацией о категории</p>
     */
    public static function getCategoryById($id)
    {
        return R::load('category', $id);
    }

	public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    public static function getImage($id) {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/categories/';
        // Путь к изображению товара
        $pathToCategoryImage = $path . $id . '.png';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToCategoryImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToCategoryImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
}

 ?>