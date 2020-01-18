<?php
    if(!isset($_SESSION['id'])){
      $url = "http://$_SERVER[HTTP_HOST]/";
      header("Location: {$url}projekt/index.php?page=singIn");
      exit();
    }else{
        $db = new Database('localhost','project','root','');
        $conn = $db->getConn();
        $details = $conn->prepare('SELECT details.description, product.cost FROM product,category,details WHERE product.category_id = category.category_id AND product.details_id = details.details_id AND product.product_id =:device');
        $details->bindParam(':device',$_GET['device'],PDO::PARAM_INT);
        $details->execute();
        $result = $details->fetch(PDO::FETCH_ASSOC);

        $row = json_decode($result['description'],true);
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
                <li class="breadcrumb-item active" aria-current="page"><?=$row['MARKA'].' '.$row['MODEL']?></li>
            </ol>
        </nav>
        <div class="row mt-1 pb-5 pt-1">
            <div id="carouselExampleIndicators" class="carousel slide col-md-6 mt-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= 'Public/img/Laptops/'.$row['MARKA'].$row['MODEL'].'/1.jpg' ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?= 'Public/img/Laptops/'.$row['MARKA'].$row['MODEL'].'/1.jpg' ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?= 'Public/img/Laptops/'.$row['MARKA'].$row['MODEL'].'/1.jpg' ?>"  alt="Third slide">
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
            <div class="col-md-6 mt-3">
                <table class="table text-light">
                <tbody>
                    <div class="alert alert-info lead" role="alert">
                        <?= $row['MARKA'].' '.$row['MODEL'] ?>
                    </div>
                
                    <tr>
                        <td>Color</td>
                        <td><?= $row['KOLOR'] ?></td>
                    </tr>
                    <tr>
                        <td>Processor</td>
                        <td><?= $row['CPU'] ?></td>
                    </tr>
                    <tr>
                        <td>RAM (installed)</td>
                        <td><?= $row['RAM'] ?></td>
                    </tr>
                    <tr>
                        <td>SSD</td>
                        <td><?= $row['SSD'] ?></td>
                    </tr>
                    <tr>
                        <td>Graphic card</td>
                        <td><?= $row['GRAPHIC_CARD'] ?></td>
                    </tr>
                    <tr>
                        <td>Screen's diagonal</td>
                        <td><?= $row['PRZEKATNA_EKRANU'] ?>'</td>
                    </tr>
                    <tr>
                        <td>Resolution</td>
                        <td><?= $row['ROZDZIELCZOSC'] ?></td>
                    </tr>
                    <tr>
                        <td>Matrix</td>
                        <td><?= $row['MATRYCA'] ?></td>
                    </tr>
                    <div class="alert alert-success lead" role="alert">
                        Cost per day <?= $result['cost']; ?>$
                    </div>
                </tbody>
                </table>
            </div>
        </div>    
    </div>
    <div class="container-fluid mt-4">    
        <div class="row justify-content-center bg-form pb-5">
            <div class="col-md-8 my-4 align-self-center">
                <form action="?page=my-order&device=<?=$_GET['device']?>" method='post' name='orderForm'>
                    <div class="row justify-content-center my-3 text-light">
                        <h5 class="lead display-4">Info about your order</h5>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Country<p><input name="country" type="text" value="<?= $_SESSION['country'] ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                         <p class="lead text-light">Locality<p><input name="locality" type="text" value="<?= $_SESSION['locality'] ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Street<p><input name="street" type="text" value="<?= $_SESSION['street'] ?>">           
                        </div>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Street number<p><input name="streetNum" type="number" value="<?= $_SESSION['streetNum'] ?>">           
                        </div>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Flat number<p><input name="flatNum" type="number" value="<?= $_SESSION['flatNum'] ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Post number<p><input name="postNum" type="text" value="<?= $_SESSION['postNum'] ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Post locality<p><input name="postLocality" type="text" value="<?= $_SESSION['postLocality'] ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Amount<p><input name="amount" type="number" value="1">
                        </div>
                    </div>
                    <div class="row justify-content-center my-3">
                        <input id="confirm-order" type="submit" class="btn btn-outline-success" value="Confirm order">
                    </div>
                </form>
            </div>
        </div>
    </div>        
    <?php include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/footer.php'); ?>

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>