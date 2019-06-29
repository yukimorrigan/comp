<?php 

class Search
{
	const SHOW_BY_DEFAULT = 5;

	public static function returnKeyword() {
		if (isset($_SESSION['search'])) {
			return $_SESSION['search'];
		}
		return '';
	}

	public static function getTotalProductsSearch($keyword) {
		
		$db = Db::getConnection();

    	$result = $db->query("SELECT count(id) AS count FROM product "
    		. "WHERE status='1' AND name LIKE '%" . $keyword . "%' "
	        . "OR code LIKE '%" . $keyword . "%' "
	        . "OR brand LIKE '%" . $keyword . "%' "
	        . "OR description LIKE '%" . $keyword . "%'");
    	$result->setFetchMode(PDO::FETCH_ASSOC);
    	$row = $result->fetch();

    	return $row['count'];
	}
	
    public static function searchProducts($keyword, $page = 1) {

    	if ($keyword) {
    		$page = intval($page);
	    	$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

	        $db = Db::getConnection();

	        $products = array();

	        $result = $db->query("SELECT * FROM product "
		        . "WHERE status = '1' "
		        . "AND name LIKE '%" . $keyword . "%' "
		        . "OR code LIKE '%" . $keyword . "%' "
		        . "OR brand LIKE '%" . $keyword . "%' "
		        . "OR description LIKE '%" . $keyword . "%' "
		        . "ORDER BY id DESC "
		        . "LIMIT " . self::SHOW_BY_DEFAULT
				. " OFFSET " . $offset);

	    	$i = 0;
	    	while ($row = $result->fetch()) {
	    		$products[$i]['id'] = $row['id'];
	    		$products[$i]['name'] = $row['name'];
	    		$products[$i]['code'] = $row['code'];
	    		$products[$i]['brand'] = $row['brand'];
	    		$products[$i]['price'] = $row['price'];
	    		$products[$i]['description'] = $row['description'];
	    		$i++;
	    	}
	    	return $products;
    	}
    }
}

 ?>