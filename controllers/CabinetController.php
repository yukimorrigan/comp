<?php 

class CabinetController
{
	public function actionIndex() {

		$categories = array();
		$categories = Category::getCategoriesList();
		// Получаем идентификатор пользователя из сессии
		$userId = User::checkLogged();

		// Получаем информацию о пользователе из БД
		$user = User::getUserById($userId);

		require_once(ROOT . '/views/cabinet/index.php');
		return true;
	}

	public function actionEdit() {

		$categories = array();
		$categories = Category::getCategoriesList();

		// Получаем идентификатор пользователя из сессии
		$userId = User::checkLogged();
		// Получаем информацию о пользователе из БД
		$user = User::getUserById($userId);

		$name = $user['name'];
		$password = $user['password'];
		$repeatPassword = $user['password'];
		$phone = $user['phone'];

		$result = false;

		if (isset($_POST['submit'])) {

			$name = $_POST['name'];
			$password = $_POST['password'];
			$repeatPassword = $_POST['repeat-password'];
			$phone = $_POST['phone'];

			$errors = false;

			if (!User::checkName($name)) {
				$errors[] = 'Имя не должно быть короче 2-х символов';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'Пароль не должен быть короче 6-х символов';
			}

			if (!User::checkRepeatPassword($password, $repeatPassword)) {
				$errors[] = 'Пароли не совпадают';
			}

			if (!User::checkPhone($phone)) {
				$errors[] = 'Неверный телефон';
			}

			if ($errors == false) {
				$result = User::edit($userId, $name, $password, $phone);
			}
		}

		require_once(ROOT . '/views/cabinet/edit.php');
		return true;
	}

	public function actionHistory() {

		$categories = array();
		$categories = Category::getCategoriesList();

		$result = false;

		$id = $_SESSION['user'];
		
		// Получаем данные о конкретном заказе
	    $order = Order::getOrderById($id);
	    if ($order != null) {
	        // Получаем массив с идентификаторами и количеством товаров
	        $productsQuantity = json_decode($order['products'], true);   
	        // Получаем массив с индентификаторами товаров
	        $productsIds = array_keys($productsQuantity);
	        // Получаем список товаров в заказе
	        $products = Product::getProductsByIds($productsIds);
	        $result = true;
		}	
        // Подключаем вид
		require_once(ROOT . '/views/cabinet/history.php');
		return true;
	}
}

 ?>