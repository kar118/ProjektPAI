<?php
    if(isset($_SESSION['id'])){
      $url = "http://$_SERVER[HTTP_HOST]/";
      header("Location: {$url}projekt/index.php?page=main");
      exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
      include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/head.php');
    ?>
    <link rel="stylesheet" href="Public/css/singIn.css">
    <title>WSM</title>
  </head>
<body>
    <div class="container">
        <div class="logo my-4">
            <div class="row justify-content-center">
                <h3 class="display-4">Cinect</h3>
            </div>
            <div class="row justify-content-center">
                <p class="lead">Hire multimedia out from Cinect!</p>
            </div>
        </div>

        <div class="items">
            <?php if(isset($message)): ?>
                <?php foreach($message as $item): ?>
                    <div class="info"><?= $item ?>!</div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <h6>Sing in</h6>
                </div>
            </div>
            <form action='?page=login' method='POST'>
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" name="email" placeholder="email">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="password" name="password" placeholder="password">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <a href="?page=resetPass">Forgot password? Reset now!</a>
                    </div>
                </div> 
                <div class="row justify-content-center mt-3">
                    <button class="btn btn-outline-primary" type="submit">CONTINUE</button>
                </div>
            </form>   
            <div class="row justify-content-center mt-2">
                <a class="btn btn-outline-primary" href="?page=singUp">SING UP</a>
            </div>    
        </div>
    </div>    
</body>
</html>