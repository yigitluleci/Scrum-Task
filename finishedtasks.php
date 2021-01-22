<?php require 'baglan.php'; 

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


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ScrumTask</title>
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
    width: 90%;
    padding: 20px;
    display: block;
    margin: 100px auto;
    box-shadow: 5px 5px 5px 0 rgba(0, 0, 0, 0.50);
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 0.9em;
}
nav.tasks ul {
    width: 100%;
    height: 60px;
    list-style: none;
    margin: 0 auto;
    
}
nav.tasks ul li {
    width: 33.3333333333%;
    float: left;
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.5s ease;
}
nav.tasks ul li:hover
{
    background: tomato;
}

</style>


<body style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
    font-family: 'Numans', sans-serif;
    background-size: cover;
background-repeat: no-repeat;">


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
    <h1 id="header">ScrumTask</h1>

    <div id="anasayfa">
        <nav class="tasks">
            <ul>
                <li><a  href="tasks.php">Henüz başlanmamış projeler</a></li>
                <li><a  href="continuedtasks.php">Üzerinde Calıştığın projeler</a></li>
                <li><a href="finishedtasks.php">Tamamlanmış projeler</a></li>
            </ul>            
        </nav>
        <br>
        <h2 style="text-align: center;">Tamamladığın projeleri görüntülüyorsun.</h2>
        <br>
        <table style="width: 100%" border="1">
        
        <tr>
            
            <th style="width: 10%">Proje Adı</th>
            <th style="width: 10%">Teknik Uzman</th>
            <th style="width: 10%">Başlangıç Tarihi</th>
            <th style="width: 10%">Bitiş Tarihi</th>
            <th style="width: 30%">Açıklama</th>
            <th style="width: 25%">Notlar</th>
            <th style="width: 5%">İşlemler</th>
        </tr>

        <?php 

        $bilgilerimsor=$db->prepare("SELECT * FROM tasks ");
        $bilgilerimsor->execute();

        

        while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { ?>



        <?php if ($bilgilerimcek['kullanici_id'] == $kullanici_id && $bilgilerimcek['task_type'] == '3') {?>

                <tr>
            
            <td><?php echo $bilgilerimcek['task_ad'] ?></td>
            <td><?php echo $bilgilerimcek['task_teknikuzman'] ?></td>
            <td><?php echo $bilgilerimcek['task_tarih'] ?></td>
            <td><?php echo $bilgilerimcek['task_bitistarihi'] ?></td>
            <td><textarea readonly style="width: 100%; height: 200px; background-color: rgba(0,0,0,0.3); color: white; "><?php echo $bilgilerimcek['task_aciklama'] ?></textarea></td>  
            <td><textarea readonly style="width: 100%; height: 200px; background-color: rgba(0,0,0,0.3); color: white; "><?php echo $bilgilerimcek['task_notes'] ?></textarea></td>
            <td align="center"><a href="duzenle.php?task_id=<?php echo $bilgilerimcek['task_id'] ?>"><button>Projeyi düzenle</button></td></a>
            <?php } ?>


        <?php } ?>

    </table>



    </div>
</body>

</html>
