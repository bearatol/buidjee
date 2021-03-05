<?php
header('Content-Type: text/html; charset=UTF-8');

// 1. Общие настройки
session_start();
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// 2. Подключение файлов системы

//define('ROOT', dirname(__FILE__));
define('ROOT', $_SERVER["DOCUMENT_ROOT"]);
require_once(ROOT . '/application/components/Router.php');
require_once(ROOT . '/application/components/Db.php');

// 3. Установка соединения с БД


// 4. Вызор Router

$router = new Router();
$router->run();

