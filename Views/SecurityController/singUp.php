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
    <link rel="stylesheet" href="Public/css/singUp.css">
    <title>WSM</title>
  </head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h3 class="display-4">Cinect</h3>
        </div>
        <div class="row justify-content-center">
            <p class="lead">Hire multimedia out from Cinect!</p>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <h6>Create an Account</h6>
        </div>
        <form action="?page=createAccount" method='POST'>
            <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" name="name" placeholder="name">
                    </div>
                    <div class="col-lg-3 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" name="surname" placeholder="surname">
                    </div>
                </div>
                <?php if(isset($err_surname_name)): ?>
                    <div class="info"><?= $err_surname_name ?></div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11">
                        <input type="email" name="email" placeholder="email">
                    </div>
                </div>
                <?php if(isset($err_email)): ?>
                    <div class="info"><?= $err_email ?></div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11">
                        <input type="password" name="password" placeholder="password">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11">
                        <input type="password" name="confirm_password" placeholder="confirm password">
                    </div>
                </div>
                <?php if(isset($err_pass)): ?>
                    <div class="info"><?= $err_pass ?></div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" name="country" placeholder="country">
                    </div>
                </div>
                <?php if(isset($err_country)): ?>
                    <div class="info"><?= $err_country ?></div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" name="locality" placeholder="locality">
                    </div>
                </div>
                <?php if(isset($err_locality)): ?>
                    <div class="info"><?= $err_locality ?></div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" name="street" placeholder="street">
                    </div>
                    <div class="col-lg-2 col-md-7 col-sm-11 col-xs-11">
                        <input type="number" name="street_number" placeholder="street num">           
                    </div>
                </div>
                <?php if(isset($err_street)): ?>
                    <div class="info"><?= $err_street ?></div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11">
                        <input type="number" name="flat_number" placeholder="flat number">
                    </div>
                </div>
                <?php if(isset($err_flat_number)): ?>
                    <div class="info"><?= $err_flat_number ?></div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-3 col-sm-11 col-xs-11">
                        <input type="text" name="postcode_number" placeholder="xx-xxx">
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-11 col-xs-11">
                        <input type="text" name="postcode_locality" placeholder="postcode locality">
                    </div>
                </div>
                <?php if(isset($err_postcode)): ?>
                    <div class="info"><?= $err_postcode ?></div>
                <?php endif; ?>
                <?php if(isset($err_)): ?>
                    <div class="info"><?= $err ?></div>
                <?php endif; ?>
                <div class="row justify-content-center mt-3">
                    <button class="btn btn-outline-primary" type="submit">CONTINUE</button>
                </div>
                <div class="row justify-content-center mb-3">
                    <a class="btn btn-outline-primary" href="?page=singIn">SING IN</a>
                </div>
            </div>
        </form>    
</body>
</html>