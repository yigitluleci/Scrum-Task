<?php require 'config.php' ;

$id = $_GET['task_id'];
//echo $id;
$task = DB::getRow("SELECT * FROM tasks WHERE task_id = $id");

if ( $_POST ){

	$task_notes = $_POST['task_notes'];

	$a = DB::insert("UPDATE tasks SET task_notes = '$task_notes' WHERE task_id= $id");
	header("Location:continuedtasks.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ScrumTask</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	#notes{
		width: 100%;
		height: 250px;
		text-align: 0 ;
	}

</style>
<body style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    font-family: 'Numans', sans-serif;">

    <div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Not düzenle</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group form-group">
                    	<textarea class="form-control" name="task_notes" id="notes"><?php echo$task->task_notes ?></textarea>
                        

                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Not Düzenle">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>