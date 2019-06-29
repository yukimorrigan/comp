<?php 

class AdminController extends AdminBase
{
	public function ActionIndex() {
		// Проверка доступа
		self::checkAdmin();
		// Подключаем вид
		require_once(ROOT . '/views/admin/index.php');
		return true;
	}
}

 ?>