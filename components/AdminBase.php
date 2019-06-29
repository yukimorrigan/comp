<?php 

abstract class AdminBase
{
	public static function checkAdmin() {
		// Проверяем авторизирован ли пользователь. Если нет - он будет переадресован
		$userId = User::checkLogged();
		// Проверяем информацию о текущем пользователе
		$user = User::getUserById($userId);
		// Если роль текушего пользователя "admin" - пропускаем его в админпанель
		if ($user['role'] == 'admin') {
			return true;
		}
		// Иначе завершаем работу с сообщением о закрытии доступа
		die('Доступ запрещен');
	}
}

 ?>