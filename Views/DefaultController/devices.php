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
    <link rel="stylesheet" href="Public/css/devices.css">
    <title>WSM</title>
  </head>
<body>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/menu.php');
  ?>
  <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=myShop">Devices</a></li>
          <li class="breadcrumb-item active" aria-current="page">Laptops</li>
        </ol>
    </nav>
    <div class="row no-gutters bg-light position-relative my-4">
      <div class="col-md-4 mb-md-0 p-md-1">
        <img src="Public/img/lenowo_legion.png" class="" alt="...">
      </div>
      <div class="col-md-8 position-static p-4 pl-md-0">
        <h5 class="mt-0">Columns with stretched link</h5>
        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
        <a href="#" class="stretched-link">Go somewhere</a>
      </div>
    </div>

    <div class="row no-gutters bg-light position-relative my-4">
      <div class="col-md-4 mb-md-0 p-md-1">
        <img src="Public/img/lenowo_legion.png" class="" alt="...">
      </div>
      <div class="col-md-8 position-static p-4 pl-md-0">
        <h5 class="mt-0">Columns with stretched link</h5>
        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
        <a href="#" class="stretched-link">Go somewhere</a>
      </div>
    </div>

    <div class="row no-gutters bg-light position-relative my-4">
      <div class="col-md-4 mb-md-0 p-md-1">
        <img src="Public/img/lenowo_legion.png" class="" alt="...">
      </div>
      <div class="col-md-8 position-static p-4 pl-md-0">
        <h5 class="mt-0">Columns with stretched link</h5>
        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
        <a href="#" class="stretched-link">Go somewhere</a>
      </div>
    </div>
    <!-- <div class="row card-deck mx-1">
      <div class="card col-md-3">
        <img class="card-img-top" src="Public/img/lenowo_legion.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Quantity 3</small>
          <a class="text-muted" href="">ORDER</a>
        </div>
      </div>
      <div class="card col-md-3">
        <img class="card-img-top" src="Public/img/lenowo_legion.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Quantity 3</small>
          <a class="text-muted" href="">ORDER</a>
        </div>
      </div>
      <div class="card col-md-3">
        <img class="card-img-top" src="Public/img/lenowo_legion.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Quantity 3</small>
          <a class="text-muted" href="">ORDER</a>
        </div>
      </div>
      <div class="card col-md-3">
        <img class="card-img-top" src="Public/img/lenowo_legion.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
          <div class="card-footer">
            <small class="text-muted">Quantity 3</small>
            <a class="text-muted" href="">ORDER</a>
          </div>
        </div>
    </div> -->
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