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

    	return R::count( 'product', ' status = 1 AND (name LIKE ?'
    		. ' OR code LIKE ?'
    		. ' OR brand LIKE ?'
    		. ' OR description LIKE ?)', 
    	array ( '%'.$keyword.'%', 
    			'%'.$keyword.'%', 
    			'%'.$keyword.'%', 
    			'%'.$keyword.'%') );
	}
	
    public static function searchProducts($keyword, $page = 1) {

    	$page = intval($page);
    	$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

    	return R::findAll( 'product', ' `status` = 1 AND (`name` LIKE ?'
    		. ' OR `code` LIKE ?'
    		. ' OR `brand` LIKE ?'
    		. ' OR `description` LIKE ?)'
    		. ' ORDER BY `id` DESC'
    		. ' LIMIT ?'
    		. ' OFFSET ?', 
    	array ( '%'.$keyword.'%', 
    			'%'.$keyword.'%', 
    			'%'.$keyword.'%', 
    			'%'.$keyword.'%',
    			self::SHOW_BY_DEFAULT,
    			$offset) );
    }
}

 ?>