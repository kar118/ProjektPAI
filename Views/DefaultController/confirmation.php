<?php
    if(!isset($_SESSION['id'])){
      $url = "http://$_SERVER[HTTP_HOST]/";
      header("Location: {$url}projekt/index.php?page=singIn");
      exit();
    }else{
        $db = new Database('localhost','project','root','');
        $conn = $db->getConn();
        $details = $conn->prepare('SELECT details.description, product.cost, category.name FROM product,category,details WHERE product.category_id = category.category_id AND product.details_id = details.details_id AND product.product_id =:device');
        $details->bindParam(':device',$_GET['device'],PDO::PARAM_INT);
        $details->execute();
        $result = $details->fetch(PDO::FETCH_ASSOC);
        $row = json_decode($result['description'],true);
        $rows = '';

        foreach ($row as $key=>$value) {
            $rows = $rows.'<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
        }
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
                <li class="breadcrumb-item active" aria-current="page"><?=$row['MARK'].' '.$row['MODEL']?></li>
            </ol>
        </nav>
    <div class="row mt-1 pb-5 pt-1">
        <div id="carouselExampleIndicators" class="carousel slide col-md-8 offset-md-2 mt-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= 'Public/img/'.$result['name'].'s/'.$row['MARK'].$row['MODEL'].'/1.jpg' ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?= 'Public/img/'.$result['name'].'s/'.$row['MARK'].$row['MODEL'].'/2.jpg' ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?= 'Public/img/'.$result['name'].'s/'.$row['MARK'].$row['MODEL'].'/3.jpg' ?>"  alt="Third slide">
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
        </div>    
        <div class="row mt-1 pb-5 pt-1">  
            <div class="col-md-12 mt-3">
                <table class="table text-light">
                <tbody>
                    <div class="alert alert-info lead" role="alert">
                        <?= $row['MARK'].' '.$row['MODEL'] ?>
                    </div>
                    <?= $rows?>
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
                <form action="?page=my-order&device=<?=$_GET['device']?>&amount=<?=$_GET['amount']?>" method='post' name='orderForm'>
                    <div class="row justify-content-center my-3 text-light">
                        <h5 class="lead display-4">Info about your order</h5>
                    </div>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Country<p><input id="country" name="country" type="text" value="<?= $_SESSION['country'] ?>">
                        </div>
                    </div>
                    <?php if(isset($err_country)): ?>
                        <div class="info"><?= $err_country ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                         <p class="lead text-light">Locality<p><input name="locality" type="text" value="<?= $_SESSION['locality'] ?>">
                        </div>
                    </div>
                    <?php if(isset($err_locality)): ?>
                        <div class="info"><?= $err_locality ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Street<p><input id="street" name="street" type="text" value="<?= $_SESSION['street'] ?>">           
                        </div>
                    </div>
                    <?php if(isset($err_street)): ?>
                        <div class="info"><?= $err_street ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Street number<p><input id="street" name="street_number" type="number" value="<?= $_SESSION['streetNum'] ?>">           
                        </div>
                    </div>
                    <?php if(isset($err_street)): ?>
                        <div class="info"><?= $err_street ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Flat number<p><input name="flat_number" type="number" value="<?= $_SESSION['flatNum'] ?>">
                        </div>
                    </div>
                    <?php if(isset($err_flat_number)): ?>
                        <div class="info"><?= $err_flat_number ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Post number<p><input name="postcode_number" type="text" value="<?= $_SESSION['postNum'] ?>">
                        </div>
                    </div>
                    <?php if(isset($err_postcode)): ?>
                        <div class="info"><?= $err_postcode ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Post locality<p><input id="postLocality" name="postcode_locality" type="text" value="<?= $_SESSION['postLocality'] ?>">
                        </div>
                    </div>
                    <?php if(isset($err_postcode)): ?>
                        <div class="info"><?= $err_postcode ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-0">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <p class="lead text-light">Amount<p><input id="amount" name="amount" type="number" value="1">
                        </div>
                    </div>
                    <?php if(isset($err_)): ?>
                        <div class="info"><?= $err ?></div>
                    <?php endif; ?>
                    <div class="row justify-content-center my-3">
                        <input id="confirm-order" type="submit" class="btn btn-outline-success" value="Confirm order">
                    </div>
                </form>
            </div>
        </div>
    </div>        
    <?php include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/footer.php'); ?>

    <!-- Optional JavaScript -->
    <script src="Public/js/formValidation.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>