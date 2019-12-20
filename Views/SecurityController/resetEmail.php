<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
      include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/head.php');
    ?>
    <link rel="stylesheet" href="Public/css/resetEmail.css">
    <title>WSM</title>
  </head>
<body>
    <?php
        include('menu.php');
    ?>
    <div class="container mt-4">
        <div class="logo">
            <div class="row justify-content-center">
                <h3 class="display-4">Cinect</h3>
            </div>
            <div class="row justify-content-center">
                <p class="lead">Hire multimedia out from Cincat!</p>
            </div>
        </div>

        <div class="items">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <h6>Reset email</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <input type="password" placeholder="email">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <input type="password" placeholder="confirm email">
                </div>
            </div>
        </div>
        <div class="row justify-content-center mx-2 my-3">
            <button class="btn btn-outline-primary" type="submit">CONTINUE</button>
        </div>
    </div>

    <!-- Optional JavaScript -->
     
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>