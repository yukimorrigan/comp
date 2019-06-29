<?php 

class UserController
{
	public function actionRegister() {

		$categories = array();
		$categories = Category::getCategoriesList();

		$name = '';
		$email = '';
		$password = '';
		$repeatPassword = '';
		$phone = '';
		$result = false;

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$repeatPassword = $_POST['repeat-password'];
			$phone = $_POST['phone'];
			$errors = false;

			if (!User::checkName($name)) {
				$errors[] = 'Имя не должно быть короче 2-х символов';
			}

			if (!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}

			if (User::checkEmailExist($email)) {
				$errors[] = 'Такой email уже используется';
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
				$result = User::register($name, $email, $password, $phone);
			}
		}

		require_once(ROOT . '/views/user/register.php');
		return true;
	}

	public function actionLogin()
	{
		$categories = array();
		$categories = Category::getCategoriesList();

		$email = '';
		$password = '';

		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			// Валидация полей
			if (!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'Пароль не должен быть короче 6-х символов';
			}

			// Проверяем существует ли пользователь
			$userId = User::checkUserData($email, $password);

			if ($userId == false) {
				$errors[] = 'Такого пользователя не существует';
			} else {
				// запоминаем пользователя (сессия)
				User::auth($userId);

				// Перенаправляем пользователя в закрытую часть - кабинет
				header("Location: /cabinet/");
			}
		}

		require_once(ROOT . '/views/user/login.php');
		return true;
	}

	public function actionLogout() {

		unset($_SESSION['user']);
		header("Location: /");
	}
}

 ?>