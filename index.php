<?php 

// FRONT CONTROLLER

// 1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/libs/rb.php');

// 3. Подключение к базе данных
// установить соединение с базой данных
R::setup('mysql:host=127.0.0.1;dbname=comp', 'root', '');
// логика авто-создания полей и таблиц
R::freeze(true);
// проверка подключения
if (!R::testConnection()) {
	exit('Нет подключения к БД');
}

// 4. Вызов Router
$router = new Router();
$router->run();

 ?>