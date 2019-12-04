<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Own CSS -->
    <link rel="stylesheet" href="../Public/css/confirmation.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div id = "menu-container"></div>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="devices.html">Laptops</a></li>
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
                        <img class="d-block w-100" src="../Public/img/lenowo_legion.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="../Public/img/lenowo_legion.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="../Public/img/lenowo_legion.png"  alt="Third slide">
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
                        Cost per day: <a href="#" class="alert-link">50.00$</a>
                    </div>
                </ul>
            </div>
            <div class="col-md-5 offset-md-1 align-self-center">
                <div class="row justify-content-center text-light">
                    <h5>Info about your order</h5>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="country">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="locality">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="street">           
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="number" placeholder="flat number">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" placeholder="postcode">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="number" placeholder="Quantity">
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <a class="btn btn-outline-success" href="singIn.html">Confirm order</a>
                </div>
            </div>
        </div>            
    </div>

    <footer class="page-footer text-white mt-5">
        <div class="container-fluid py-3">
            <div class="row">             
                <div class="col-md-3 text-left small align-self-start">Wypożyczalnia sprzętu multimedialnego <br> ©2019 Projektowanie Aplikacji Internetowych</div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <script src="../Public/js/menu.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>