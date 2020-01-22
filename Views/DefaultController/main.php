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
    <link rel="stylesheet" href="Public/css/main.css">
  </head>
  <body>
    <?php
      include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/menu.php');
    ?>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 text-light">Start now!</h1>
        <p class="lead text-light">Hire the best laptops, projector and many other devices!</p>
      </div>
      <div class="container my-5">
        <div class="row card-deck mx-1">
          <div class="card col-md-3 col-sm-6 col-xs-12">
            <img class="card-img-top" src="Public/img/laptop.svg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Laptops</h5>
              <p class="card-text">Click the link below to see all laptops!</p>
            </div>
            <div class="card-footer">
            <button type="button" class="btn btn-info float-right"><a href="?page=devices_laptops">Show all</a></button>
            </div>
          </div>
          <div class="card col-md-3 col-sm-6 col-xs-12">
            <img class="card-img-top" src="Public/img/projector.svg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Projectors</h5>
              <p class="card-text">Click the link below to see all projectors!</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-info float-right"><a href="?page=devices_projectors">Show all</a></button>
            </div>
          </div>
          <div class="card col-md-3 col-sm-6 col-xs-12">
            <img class="card-img-top" src="Public/img/speaker.svg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Speakers</h5>
              <p class="card-text justify-content-end">Click the link below to see all speakers!</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-info float-right"><a href="?page=devices_speakers">Show all</a></button>
            </div>
          </div>
          <div class="card col-md-3 col-sm-6 col-xs-12">
            <img class="card-img-top" src="Public/img/camera.svg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Cameras</h5>
              <p class="card-text">Click the link below to see all cameras!</p>
            </div>
              <div class="card-footer">
                <button type="button" class="btn btn-info float-right"><a href="?page=devices_cameras">Show all</a></button>
              </div>
            </div>
          </div>          
        </div>
  </div>
        <?php
          include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/footer.php');
        ?>
      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="Public/js/about.js"></script>  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>