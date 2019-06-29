<?php 

/**
 * Управление фильтрами в админпанели
 */
class AdminFilterController extends AdminBase
{
	public function actionIndex() {
		// Проверка доступа
		self::checkAdmin();	
		// Подключаем вид
		require_once(ROOT . '/views/admin_filter/index.php');
		return true;
	}
}

 ?>