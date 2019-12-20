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
    <link rel="stylesheet" href="Public/css/my-shop.css">
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
        <li class="breadcrumb-item">My shop</li>
        <li class="breadcrumb-item active" aria-current="page">My items</li>
      </ol>
    </nav>
    <div class="row card-deck mx-1">
      <div class="card col-md-3">
        <img class="card-img-top" src="Public/img/lenowo_legion.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Lenovo Legion</h5>
          <p class="card-text">
              <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>From</td>
                      <td>12-10-2019</td>
                    </tr>
                    <tr>
                      <td>To</td>
                      <td>15-10-2019</td>
                    </tr>
                    <tr>
                      <td>Total cost</td>
                      <td>150.00$</td>
                    </tr>
                  </tbody>
                </table>
          </p>
          <ul class="list-group list-group-flush">
              <div class="alert alert-primary" role="alert">
                <a href="#" class="alert-link">Prolong renting</a>
              </div>
          </ul>
        </div>
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