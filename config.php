<?php
/*
*
* Veritabanı bağlantısı için
* gerekli bağlantı bilgilerinin
* bulunduğu ayar dosyası.
*
*/

session_start();
header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'scrumtask');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'12345678');

include 'db.php';
