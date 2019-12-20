<?php
    if(!isset($_SESSION['id'])){
      $url = "http://$_SERVER[HTTP_HOST]/";
      header("Location: {$url}projekt/index.php?page=singIn");
      exit();
    }
?>
<!doctype html>
<html lang="en">
<head>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/head.php');
?>
<link rel="stylesheet" href="Public/css/confirmation.css">
<title>WSM</title>
</head>
<body>
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/menu.php');
    ?>
    <div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=devices">Laptops</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lenovo Legion</li>
        </ol>
    </nav>
    <div class="row">
        <div class="card col-md-5 offset-md-1 mx-3" >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="Public/img/lenowo_legion.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="Public/img/lenowo_legion.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="Public/img/lenowo_legion.png"  alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-dark">
                        <tbody>
                            <tr>
                            <td>Procesor</td>
                            <td>@Intel Core i7-7700HQ</td>
                            </tr>
                            <tr>
                            <td>Karta graficzna</td>
                            <td>Nvidia GeForce GTX 1050 Ti (4096 MB) + jednostka zintegrowana</td>
                            </tr>
                            <tr>
                            <td>Pamięć</td>
                            <td>DDR4-2133, maksymalnie 32 GB</td>
                            </tr>
                        </tbody>
                        </table>
            </div>
            <ul class="list-group list-group-flush">
                <div class="alert alert-primary" role="alert">
                    <p>Cost per day: 50.00$</p>
                </div>
            </ul>
        </div>
        <div class="col-md-5 offset-md-1 align-self-center">
            <form action="">
                <div class="row justify-content-center my-3 text-light">
                    <h5>Info about your order</h5>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="country">
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="locality">
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="street">           
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="number" placeholder="flat number">
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="postcode">
                    </div>
                </div>
                <div class="row justify-content-center my-3 mt-2">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="number" placeholder="Quantity">
                    </div>
                </div>
                <div class="row justify-content-center my-3 mt-3">
                    <a class="btn btn-outline-success" href="singIn.html">Confirm order</a>
                </div>
            </form>
        </div>
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