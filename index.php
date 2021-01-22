<?php 
    require 'config.php';
    if (@$_SESSION['login'] == true) {
    header("Location:main.php");}

    if ( $_POST ) {

        
        $kullanici_mail = $_POST['kullanici_mail'];
        $kullanici_pass = $_POST['kullanici_pass'];

        $kontrol = DB::getRow("SELECT * FROM user WHERE kullanici_mail=? AND kullanici_pass=?",array(
            $kullanici_mail,
            $kullanici_pass
        ));

        /** başarılı ise */
        if ( $kontrol ) {
            $_SESSION['login'] = true;
            $_SESSION['kadi'] = $kontrol->kullanici_id;
            header("Location:main.php?success=1");
            die();
            
        }
        else
        {
            
            die();
        } 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>ScrumTask</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Giriş Yap</h3>
                
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="kullanici_mail" class="form-control" placeholder="Email" required="">
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="kullanici_pass" class="form-control" placeholder="Şifre" required="">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Giriş Yap" class="btn float-right login_btn">
                    </div>

                    <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Üye Değil misin ?  <a href="signin.php">Üye Ol</a>
                    </div>
                
                </div>
                </form>
       
                
            </div>
        </div>
    </div>
</div>
</body>
</html>