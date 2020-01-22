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
  <div class="container md-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=myShop">Main</a></li>
          <li class="breadcrumb-item active" aria-current="page">Projectors</li>
        </ol>
    </nav>

    <?php include($_SERVER['DOCUMENT_ROOT'].'/projekt/Views/Common/projectors.php') ?>
    
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