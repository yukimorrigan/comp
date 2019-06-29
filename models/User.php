<?php 

class User
{
	public static function register($name, $email, $password, $phone) {
		
		$db = Db::getConnection();

		$sql = 'INSERT INTO user (name, email, password, phone) '
			. 'VALUES (:name, :email, :password, :phone)';

		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->bindParam(':phone', $phone, PDO::PARAM_STR);

		return $result->execute();
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
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if ($result->fetchColumn()) {
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

		$db = Db::getConnection();

		$sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_INT);
		$result->bindParam(':password', $password, PDO::PARAM_INT);
		$result->execute();

		$user = $result->fetch();
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

			$db = Db::getConnection();
			$sql = 'SELECT * FROM user WHERE id = :id';

			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);

			// Указываем, что хотим получить данные в виде массива
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$result->execute();

			return $result->fetch();
		}
	}

	public static function edit($id, $name, $password, $phone) {

		$db = Db::getConnection();

		$sql = "UPDATE user 
			SET name = :name, password = :password, phone = :phone 
			WHERE id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->bindParam(':phone', $phone, PDO::PARAM_STR);
		return $result->execute();
	}
}

 ?>