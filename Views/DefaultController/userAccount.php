<?php
    if(!isset($_SESSION['id'])){
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}projekt/index.php?page=singIn");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
      include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/head.php');
    ?>
    <link rel="stylesheet" href="Public/css/userAccount.css">
    <title>WSM</title>
  </head>
<body>
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/menu.php');
    ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=main">Main</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </nav>
        <div class="items">
            <form action="">
                <div class="row justify-content-center">
                    <h6 class="lead display-4">Informations abaut you</h6>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" placeholder="name">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" placeholder="surname">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="email" placeholder="email">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" placeholder="country">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" placeholder="locality">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-5 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" placeholder="street">
                    </div>
                    <div class="col-lg-2 col-md-7 col-sm-11 col-xs-11">
                        <input type="number" placeholder="street num">           
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <input type="number" placeholder="flat number">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-5 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" placeholder="postcode locality">
                    </div>
                    <div class="col-lg-2 col-md-7 col-sm-11 col-xs-11">
                        <input type="text" placeholder="postcode num">
                    </div>
                </div>
                <div class="row justify-content-center mt-2 mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <a href="?page=resetPass">Click here to change password</a>
                    </div>
                </div> 
                <div class="row justify-content-center mt-2 mt-2">
                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                        <a href="?page=resetEmail">Click here to change email</a>
                    </div>
                </div> 
                <div class="row justify-content-center mt-2 mt-2 mb-4">
                    <button class="btn btn-outline-primary" type="submit">CONFIRM</button>
                </div>
            </form>
        </div>
    </div>
    <?php
      include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/footer.php');
    ?>

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>