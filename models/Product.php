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

			$db = Db::getConnection();
			$products = array();
			$result = $db->query("SELECT id, name, price, image, sale FROM product "
			. "WHERE status = '1' AND category_id = '$categoryId' "
			. "ORDER BY id DESC "
			. "LIMIT " . self::SHOW_BY_DEFAULT
			. " OFFSET " . $offset);

			$i = 0;
			while ($row = $result->fetch()) {
				$products[$i]['id'] = $row['id'];
				$products[$i]['name'] = $row['name'];
				$products[$i]['price'] = $row['price'];
				$products[$i]['image'] = $row['image'];
				$products[$i]['sale'] = $row['sale'];
				$i++;
			}

			return $products;
		}
	}

	public static function getProductById($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query('SELECT * FROM product WHERE id=' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

    /**
     * @return total products
     */

    public static function getTotalProductsInCategory($categoryId)
    {
    	$db = Db::getConnection();

    	$result = $db->query('SELECT count(id) AS count FROM product '
    		. 'WHERE status="1" AND category_id="' . $categoryId . '"');
    	$result->setFetchMode(PDO::FETCH_ASSOC);
    	$row = $result->fetch();

    	return $row['count'];
    }

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
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
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