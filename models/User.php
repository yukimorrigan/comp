<?php 

class User
{
	public static function register($name, $email, $password, $phone) {
		
		$user = R::dispense('user');

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->phone = $phone;

        R::store($user);

        return R::getInsertId();
	}

	public static function checkName($name) {

		if (strlen($name) >= 2) {
			return true;
		}
		return false;
	}

	public static function checkEmail($email) {

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

	public static function checkEmailExist($email) {
		$user = R::findOne('user', '`email` = ?', array($email));
		if ($user) {
			return true;
		}
		return false;
	}

	public static function checkPassword($password) {

		if (strlen($password) >= 6) {
			return true;
		}
		return false;
	}

	public static function checkRepeatPassword($password, $repeatPassword) {

		if (strcasecmp($password, $repeatPassword) == 0) {
			return true;
		}
		return false;
	}

	public static function checkPhone($phone) {

		$pattern = "/^\+380|380|0\d{3}\d{2}\d{2}\d{2}$/";
		if (preg_match($pattern, $phone)) {
			return true;
		}
		return false;
	}

	public static function checkUserData($email, $password) {
		
		$user = R::findOne('user', '(`email` = ? AND `password` = ?)', array($email, $password));

		if ($user) {
			return $user['id'];
		}

		return false;
	}

	public static function auth($userId) {

		$_SESSION['user'] = $userId;
	}

	public static function isGuest() {

		if (isset($_SESSION['user'])) {
			return false;
		}
		return true;
	}

	public static function checkLogged() {
		// Если сессия есть, вернем идентификатор пользователя
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}

		header("Location: /user/login");
	}

	public static function getUserById($id) {

		if ($id) {
			$id = intval($id);
			$user = R::load('user', $id);
			return $user;
		}
	}

	public static function edit($id, $name, $password, $phone) {

		$user = R::load('user', $id);

        $user->name = $name;
        $user->password = $password;
        $user->phone = $phone;

        R::store($user);
	}
}

 ?>