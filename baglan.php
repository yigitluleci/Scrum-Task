<?php 
session_start();
try {

	$db=new PDO("mysql:host=localhost;dbname=scrumtask;charset=utf8",'root','12345678');

	//echo "Veritabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

	echo $e->getMessage();
}

include 'db.php';

?>