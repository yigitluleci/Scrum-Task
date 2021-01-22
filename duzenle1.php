<?php require 'config.php';

date_default_timezone_set('Europe/Istanbul');
$date = date('Y-m-d H:i:s', time());
//echo $date;

$id = $_GET['task_id'];
//echo $id


DB:: insert("UPDATE tasks SET task_type='3' WHERE task_id =$id");
DB:: insert("UPDATE tasks SET task_bitistarihi='$date' WHERE task_id =$id");

header("Location:finishedtasks.php");
 ?>