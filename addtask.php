<?php require 'config.php'; 

if ( isset($_GET['cikisYap']) ) {
    unset($_SESSION['login']);
    unset($_SESSION['kadi']);
    header("Location:index.php");
    die();
}

if ( !isset($_SESSION['login']) ) {
    header("Location:index.php");
    die();
}

$kullanici_id= $_SESSION['kadi'];
$kullanici = DB::getRow("SELECT * FROM user WHERE kullanici_id =?", array($kullanici_id));

if ( $_POST ) {
        $task_type             = '1';
        $task_ad               = $_POST['task_ad'];
        $task_teknikuzman      = $_POST['task_teknikuzman'];
        $task_tahminisure      = $_POST['task_tahminisure'];
        $task_aciklama         = $_POST['task_aciklama'];
        $task_notes            = $_POST['task_notes'];

        $id = DB::insert("INSERT INTO tasks(kullanici_id,task_ad,task_teknikuzman,task_tahminisure,task_type,task_aciklama,task_notes) VALUES(?,?,?,?,?,?,?)",array(
            $kullanici_id,
            $task_ad,
            $task_teknikuzman,
            $task_tahminisure,
            $task_type,
            $task_aciklama,
            $task_notes
        ));

        header("Location:tasks.php?success=1");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".hamburger-btn .fa-times").hide();

            $(".hamburger-btn .fa-bars").click(function() {
                $(this).hide();
                $(".hamburger-btn .fa-times").show();
                $(".mob ul").addClass("aktif");
            });

            $(".hamburger-btn .fa-times").click(function() {
                $(this).hide();
                $(".hamburger-btn .fa-bars").show();
                $(".mob ul").removeClass("aktif");
            });
        });

    </script>
</head>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Roboto');


* {
    margin: 0;
    padding: 0;
    user-select: none;
}


.mob,
.btn {
    display: none;
}


.genel nav.desk,
.genel nav.mob {
    position: fixed;
    top: 60;
    left: 0;
    width: 100%;
    height: 60px;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.50);
}

nav.desk ul {
    width: 100%;
    height: 60px;
    list-style: none;
    margin: 0 auto;
    
}

nav.desk ul li {
    width: 25%;
    float: left;
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.5s ease;
}

nav ul li a {
    text-decoration: none;
    color: #fff;

}

nav.desk ul li:hover,
nav.mob ul li:hover {
    background: tomato;
}

@media screen and (max-width:750px) {

    nav.desk {
        display: none;
    }

    .mob,
    .btn {
        display: block;
    }

    .btn {
        position: relative
    }

    .hamburger-btn .fa-bars,
    .hamburger-btn .fa-times {
        position: fixed;
        right: 25px;
        top: 15px;
        font-size: 35px;
        color: #fff;
        cursor: pointer;
    }

    .mob ul {

        margin-top: 60px;
        background: gray;
        display: none;
    }

    .mob ul li {
        text-align: center;
        padding: 20px;
        text-transform: uppercase;
        cursor: pointer;
    }

    .mob ul.aktif {
        display: block;
    }

    .header {
        text-align: center;
        margin: 120px;
    }


}
#anasayfa {
    color: whitesmoke;
    width: 70%;
    padding: 20px;
    display: block;
    margin: 100px auto;
    box-shadow: 5px 5px 5px 0 rgba(0, 0, 0, 0.50);
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 0.9em;
}

</style>


<body style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    font-family: 'Numans', sans-serif;">


    <div class="genel">

        <nav class="desk">
            <ul>
                <li><a href="main.php">Anasayfa</a></li>
                <li><a href="addtask.php">Proje Ekle</a></li>
                <li><a href="tasks.php">Projelerim</a></li>
                <li><a href="main.php?cikisYap=1">Çıkış yap</a></li>
            </ul>
        </nav>

        <nav class="mob">

            <div class="hamburger-btn">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <ul>
                <li><a href="main.php">Anasayfa</a></li>
                <li><a href="addtask.php">Proje Ekle</a></li>
                <li><a href="tasks.php">Projelerim</a></li>
                <li><a href="main.php?cikisYap=1">Çıkış yap</a></li>
            </ul>
        </nav>

    </div>
    <h1 id="header"><br></h1>

    <div id="anasayfa">
        <div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Proje Ekle</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group form-group">
                        
                        <input type="text" name="task_ad" class="form-control" placeholder="Proje adı">
                    </div>
                    <div class="input-group form-group">
                        
                        <input type="text" name="task_teknikuzman" class="form-control" placeholder="Teknik Uzman">
                    </div>
                    <div class="input-group form-group">
                        
                        <input type="text" name="task_tahminisure" class="form-control" placeholder="Tahmini Süre">
                    </div>
                    <div class="input-group form-group">
                        
                        <input type="text" name="task_aciklama" class="form-control" placeholder="Açıklama">
                    </div>
                    <div class="input-group form-group">
                        
                        <input type="text" name="task_notes" class="form-control" placeholder="Notlar">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Projeyi Ekle">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    </div>
</body>

</html>
