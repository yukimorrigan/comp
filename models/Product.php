<?php 

class Product
{
	const SHOW_BY_DEFAULT = 8;

	public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
	{
		$count = intval($count);

        return R::getAll('SELECT `id`, `name`, `price`, `sale` FROM `product`'
            . ' ORDER BY `id` DESC'
            . ' LIMIT ?', array($count));
	}

	public static function getProductsListByCategory($categoryId = false, $page = 1)
	{
		if ($categoryId) {

			$page = intval($page);
			$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            return R::getAll('SELECT `id`, `name`, `price`, `sale` FROM `product`'
                . ' WHERE `status` = 1 AND category_id = ?'
                . ' ORDER BY `id` DESC'
                . ' LIMIT ? OFFSET ?', array($categoryId, self::SHOW_BY_DEFAULT, $offset));
		}
	}

	public static function getProductById($id)
	{
		$id = intval($id);

		if ($id) {
            return R::load('product', $id);
		}
	}

    /**
     * @return total products
     */

    public static function getTotalProductsInCategory($categoryId)
    {
        $category = R::load('category', $categoryId);
        return $category->countOwn('product');
    }

    //TODO: Сделать связь со списком заказов
    public static function getProductsByIds($idsArray) {

    	$products = array();

    	$db = Db::getConnection();

    	$idsString = implode(',', $idsArray);

    	$sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

    	$result = $db->query($sql);
    	$result->setFetchMode(PDO::FETCH_ASSOC);

    	$i = 0;
    	while ($row = $result->fetch()) {
    		$products[$i]['id'] = $row['id'];
    		$products[$i]['code'] = $row['code'];
    		$products[$i]['name'] = $row['name'];
    		$products[$i]['price'] = $row['price'];
    		$i++;
    	}
    	return $products;
    }

    public static function getProductsList()
    {
        return R::getAll('SELECT `id`, `name`, `price`, `code` FROM `product`'
            . ' ORDER BY `id` ASC');
    }

    public static function deleteProductById($id) {
        $product = R::load('product', $id);
        R::trash($product);
    }

    public static function createProduct($options)
    {
        // таблица категорий
        $category = R::load('category', $options['category_id']);
        // таблица продуктов
        $product = R::dispense('product');
        $product->name = $options['name'];
        $product->code = (int) $options['code'];
        $product->price = (double) $options['price'];
        $product->brand = $options['brand'];
        $product->availability = (int) $options['availability'];
        $product->description = $options['description'];
        $product->sale = (int) $options['sale'];
        $product->is_recommended = (int) $options['is_recommended'];
        $product->status = (int) $options['status'];
        $product->count = (int) $options['count'];
        // сохранить
        $category->ownItemList[] = $product;
        R::store($category);

        return R::getInsertId();
    }

    public static function updateProductById($id, $options)
    {
        $product = R::load('product', $id);

        $product->name = $options['name'];
        $product->code = (int) $options['code'];
        $product->price = (double) $options['price'];
        $product->brand = $options['brand'];
        $product->availability = (int) $options['availability'];
        $product->description = $options['description'];
        $product->sale = (int) $options['sale'];
        $product->is_recommended = (int) $options['is_recommended'];
        $product->status = (int) $options['status'];
        $product->count = (int) $options['count'];
        $product->category_id = (int) $options['category_id'];

        R::store($product);
    }

    public static function getImage($id) {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
}
 ?>