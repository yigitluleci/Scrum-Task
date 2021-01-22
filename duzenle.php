<?php require 'config.php';

$id = $_GET['task_id'];
///echo $id;

DB:: insert("UPDATE tasks SET task_type='2' WHERE task_id =$id");

header("Location:continuedtasks.php");

 ?>